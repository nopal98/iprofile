<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $global_data['settings'] = $this->common_model->get_settings();
        $this->settings = $global_data['settings'];
        $gIobal_data = get_header_info();
        expire_payments();
        $this->load->vars($global_data);
        $this->db->query("SET sql_mode=''");

        if ($this->settings->version == 'v2.0') {
            $this->db->query("ALTER TABLE `settings` ADD `type` VARCHAR(255) NOT NULL DEFAULT 'live' AFTER `version`;");

            $data = array(
                'version' => 'v2.1'
            );
            $this->admin_model->edit_option($data, 1, 'settings');
        }
    }

}


class Home_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $global_data['settings'] = $this->common_model->get_settings('settings');
        $this->settings = $global_data['settings'];
        $gIobal_data_load = load_settings_data();
        $gIobal_data = gets_active_langs();
        $this->load->vars($global_data);
    }

    //verify recaptcha
    public function recaptcha_verify_request()
    {
        if ($this->settings->enable_captcha == 0) {
            return true;
        }

        $this->load->library('recaptcha');
        $recaptcha = $this->input->post('g-recaptcha-response');
        if (!empty($recaptcha)) {
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (isset($response['success']) && $response['success'] === true) {
                return true;
            }
        }
        return false;
    }

}