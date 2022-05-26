<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subscription extends Home_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!is_user()) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $data = array();
        $data['page_title'] = 'Subscription';
        $data['user'] = $this->common_model->get_my_package();
        $data['packages'] = $this->admin_model->get_package_features();
        $data['features'] = $this->admin_model->select('features');
        $data['main_content'] = $this->load->view('admin/user/subscription', $data, TRUE);
        $this->load->view('admin/index', $data);
    }


    public function purchase($payment_id)
    {   
        $data = array();
        $data['page_title'] = 'Purchase';
        $data['payment'] = $this->common_model->get_payment($payment_id);
        $data['payment_id'] = $payment_id;
        $data['package'] = $this->common_model->get_by_id($data['payment']->package_id, 'package'); 
        $data['main_content'] = $this->load->view('admin/user/purchase', $data, TRUE);
        $this->load->view('admin/index', $data);
    }


    public function upgrade($slug='', $billing_type='', $status=0)
    {
        if ($status == 0) {
            $data = array();
            $data['slug'] = $slug;      
            $data['billing_type'] = $billing_type;

            $data['main_content'] = $this->load->view('admin/user/payment_confirm',$data,TRUE);
            $this->load->view('admin/index',$data);
        } else {
            
            $data = array();
            $data['page_title'] = 'Upgrade';      
            $data['page'] = 'Payment'; 
            $payment = $this->common_model->get_user_payment(user()->id);
            $uid = random_string('numeric',5);
            $data['payment_id'] =  $uid;
            $data['billing_type'] = $billing_type;
            $data['package'] = $this->common_model->get_package_by_slug($slug);
            $package = $data['package'];

            if($billing_type =='monthly'):
                $amount = $package->monthly_price;
                $expire_on = date('Y-m-d', strtotime('+1 month'));
            else:
                $amount = $package->price;
                $expire_on = date('Y-m-d', strtotime('+12 month'));
            endif;

            if (number_format($amount, 0) == 0):
                $status = 'verified';
            else:
                $status = 'pending';
            endif;

            //create payment
            $pay_data=array(
                'user_id' => user()->id,
                'puid' => $uid,
                'package' => $package->slug,
                'package_id' => $package->id,
                'amount' => $amount,
                'billing_type' => $billing_type,
                'status' => $status,
                'created_at' => my_date_now(),
                'expire_on' => $expire_on
            );
            $pay_data = $this->security->xss_clean($pay_data);

            if (check_my_payment_status() == TRUE) {
                $this->common_model->insert($pay_data, 'payment');
            } else {
                $this->common_model->edit_option($pay_data, $payment->id, 'payment');
            }
            
            
            
            if (number_format($amount, 0) == 0){
                redirect(base_url('admin/profile'));
            }else{
                if ($this->settings->enable_paypal == 1) {
                    redirect(base_url('admin/subscription/purchase/'.$uid));
                } else {
                    redirect(base_url('admin/profile'));
                }
            }
        }
        
    }



    //stripe payment
    public function stripe_payment()
    {

        $id = $this->input->post('package_id');
        $puid = $this->input->post('payment_id');
        $package = $this->common_model->get_by_id($id, 'package');
        $billing_type = $this->input->post('billing_type');
        
        if($billing_type =='monthly'):
            $amount = round($package->monthly_price); 
            $expire_on = date('Y-m-d', strtotime('+1 month'));
        else:
            $amount = round($package->price); 
            $expire_on = date('Y-m-d', strtotime('+12 month'));
        endif;
        
        require_once('application/libraries/stripe-php/init.php');
        \Stripe\Stripe::setApiKey(get_settings()->secret_key);
        
        try {
            $charge = \Stripe\Charge::create ([
                "amount" => $amount*100,
                "currency" => get_settings()->currency_code,
                "source" => $this->input->post('stripeToken'),
                "description" => "Payment from ".get_settings()->site_name 
            ]);
            $chargeJson = $charge->jsonSerialize();
            
            $amount                  = $chargeJson['amount']/100;
            $balance_transaction     = $chargeJson['balance_transaction'];
            $currency                = $chargeJson['currency'];
            $status                  = $chargeJson['status'];
            $payment = 'success';
        }catch(Exception $e) { 
            $error = $e->getMessage(); 
            $this->session->set_flashdata('error', $error);
            $payment = 'failed';
        }

        if($status == 'succeeded'){$status = 'verified';}else{$status = 'pending';};

        if($payment == 'success'):  
            redirect(base_url('admin/subscription/payment_success/'.$billing_type.'/'.$id.'/'.$puid));
        else:
            redirect(base_url('admin/subscription/payment_cancel/'.$billing_type.'/'.$id.'/'.$puid));
        endif;
    }


    //payment success
    public function payment_success($billing_type, $package_id, $payment_id)
    {   
        $package = $this->common_model->get_by_id($package_id, 'package');
        $payment = $this->common_model->get_payment($payment_id);
        $uid = random_string('numeric',5);
        
        if($billing_type =='monthly'):
            $amount = $package->monthly_price;
            $expire_on = date('Y-m-d', strtotime('+1 month'));
        else:
            $amount = $package->price;
            $expire_on = date('Y-m-d', strtotime('+12 month'));
        endif;

        $data = array();
        $pay_data = array(
            'user_id' => user()->id,
            'package' => $package->id,
            'puid' => $payment_id,
            'status' => 'verified',
            'billing_type' => $billing_type,
            'amount' => $amount,
            'expire_on' => $expire_on,
            'created_at' => my_date_now()
        );
        $pay_data = $this->security->xss_clean($pay_data);
    
        if (user()->user_type == 'trial') {
            
            $this->common_model->insert($pay_data, 'payment');
            //update user type
            $user_data=array(
                'user_type' => 'registered',
                'trial_expire' => '0000-00-00'
            );
            $this->common_model->edit_option($user_data, user()->id, 'users');

        } else {
            $this->common_model->edit_option($pay_data, $payment->id, 'payment');
        }
      
        $data['page_title'] = 'Payment';
        $data['success_msg'] = 'Success';
        $data['main_content'] = $this->load->view('admin/user/purchase',$data,TRUE);
        $this->load->view('admin/index',$data);

    }


    //payment cancel
    public function payment_cancel($billing_type, $package_id, $payment_id)
    {   
        $data = array();
        $package = $this->common_model->get_package_by_id($package_id);
        $payment = $this->common_model->get_payment($payment_id);

        if($billing_type =='monthly'):
            $amount = $package->monthly_price;
            $expire_on = date('Y-m-d', strtotime('+1 month'));
        else:
            $amount = $package->price;
            $expire_on = date('Y-m-d', strtotime('+12 month'));
        endif;

        $pay_data = array(
            'user_id' => user()->id,
            'package' => $package->id,
            'puid' => $payment_id,
            'status' => 'pending',
            'billing_type' => $billing_type,
            'amount' => $amount,
            'expire_on' => $expire_on,
            'created_at' => my_date_now()
        );
        $pay_data = $this->security->xss_clean($pay_data);
        if (user()->user_type == 'trial') {
            
            $this->common_model->insert($pay_data, 'payment');
            
            //update user type
            $user_data=array(
                'user_type' => 'registered'
            );
            $this->common_model->edit_option($user_data, user()->id, 'users');

        } else {
            $this->common_model->edit_option($pay_data, $payment->id, 'payment');
        }
        $data['error_msg'] = 'Error';
        $data['page_title'] = 'Payment';
        $data['main_content'] = $this->load->view('admin/user/purchase',$data,TRUE);
        $this->load->view('admin/index',$data);
    }

}