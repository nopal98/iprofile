<?php $settings = get_settings(); ?>
<?php
$paypal_url = ($settings->paypal_mode == 'sandbox') ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';
$paypal_id = html_escape($settings->paypal_email);
?>

<div class="content-wrapper">
    <div class="content">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-12">

                    <div class="pay-boxss">

                        <?php if (isset($success_msg) && $success_msg == 'Success') : ?>
                            <div class="text-center mt-20" style="min-height: 800px">
                                <div class="padding-200" style="padding: 200px">
                                    <h1 class="text-success"><i class="fa fa-check-circle fa-2x text-success"></i> <br>Done</h1>
                                    <h5 class="text-successs">You have paid successfully !</h5><br>
                                    <a href="<?php echo base_url('admin/profile') ?>" class="btn btn-primary">Continue <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>

                        <?php elseif (isset($error_msg) && $error_msg == 'Error') : ?>
                            <div class="text-center mt-20" style="min-height: 800px">
                                <div class="padding-200" style="padding: 200px">
                                    <h3 class="text-danger"><i class="fa fa-times fa-2x text-danger"></i> Error</h3>
                                    <h5 class="error">Your payment has been failed!</h5><br>
                                    <a href="<?php echo base_url() ?>" class="btn btn-secondary">Back</a>
                                </div>
                            </div>

                        <?php else : ?>

                            <?php if ($payment->billing_type == 'monthly') : ?>
                                <?php
                                $price = round($package->monthly_price);
                                $frequency = 'Per month';
                                $billing_type = 'monthly';
                                ?>
                            <?php else : ?>
                                <?php
                                $price = round($package->price);
                                $frequency = 'Per year';
                                $billing_type = 'yearly';
                                ?>
                            <?php endif ?>


                            <div class="tabbable-panel mt-20">
                                <div class="tabbable-line">
                                    <ul class="nav nav-tabs ">
                                        <?php if (settings()->paypal_payment == 1) : ?>
                                            <!-- <li class="active">
                                                <a href="#tab_default_1" data-toggle="tab">
                                                    Paypal </a>
                                            </li> -->
                                        <?php endif ?>

                                        <?php if (settings()->stripe_payment == 1) : ?>
                                            <!-- <li class="<?php if (settings()->stripe_payment == 1 && settings()->paypal_payment == 0) {
                                                                echo "active";
                                                            } ?>">
                                                <a href="#tab_default_2" data-toggle="tab">
                                                    Stripe </a>
                                            </li> -->
                                        <?php endif ?>

                                    </ul> <br> <br>
                                    <div class="tab-content">

                                        <!-- paypal payment area -->
                                        <div class="tab-pane active text-center" id="tab_default_1">
                                            <!-- paypal payment -->
                                            <?php if ($settings->paypal_payment == 1) : ?>
                                                <div class="payment_area container" id="paypal" style="display: <?php if ($settings->paypal_payment == 1) {
                                                                                                                    echo "block";
                                                                                                                } else {
                                                                                                                    echo "none";
                                                                                                                } ?>">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                Plase Send Payment to OVO or Dana to this number <br>
                                                                <b> 085156039256 </b> - A.n Fawwaz Al - Aziz
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="box col-md-12 text-center">

                                                            <div class="box-body text-center padding-50">

                                                                <h4 class="">Confirmation</h4>
                                                                <p class="mb-0 text-center">Package: <?php echo html_escape($package->name); ?> (<strong><?php echo $settings->currency_symbol; ?><?php echo html_escape($price) ?> <?php echo html_escape($frequency) ?></strong>)</p><br>


                                                                <!-- PRICE ITEM -->
                                                                <form action="<?php echo html_escape($paypal_url); ?>" method="post" name="frmPayPal1">
                                                                    <div class="pipanel price panel-red">
                                                                        <input type="hidden" name="business" value="<?php echo html_escape($paypal_id); ?>" readonly>
                                                                        <input type="hidden" name="cmd" value="_xclick">
                                                                        <input type="hidden" name="item_name" value="<?php echo html_escape($package->name); ?>">
                                                                        <input type="hidden" name="item_number" value="1">
                                                                        <input type="hidden" name="amount" value="<?php echo html_escape($price) ?>" readonly>
                                                                        <input type="hidden" name="no_shipping" value="1">
                                                                        <input type="hidden" name="currency_code" value="<?php echo html_escape($settings->currency_code); ?>">
                                                                        <input type="hidden" name="cancel_return" value="<?php echo base_url('admin/subscription/payment_cancel/' . $billing_type . '/' . html_escape($package->id) . '/' . html_escape($payment_id)) ?>">
                                                                        <input type="hidden" name="return" value="<?php echo base_url('admin/subscription/payment_success/' . $billing_type . '/' . html_escape($package->id) . '/' . html_escape($payment_id)) ?>">

                                                                        <div class="mt-30">
                                                                            <a class="btn btn-primary" href="http://wa.me/send/?phone=6285156039256&text=%5BPayment%5D%0APackage+<?= html_escape($package->name); ?>+%0APrice+%3A+Rp.+<?= html_escape($price) ?>+.%0A%0AI%27ve+made+a+payment+to+OVO%2FDana+account+in+this+number.+%0A&app_absent=0">Confirm Now <?php echo $settings->currency_symbol; ?><?php echo html_escape($price) ?></a>
                                                                        </div>

                                                                    </div>
                                                                </form>
                                                                <!-- /PRICE ITEM -->

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                        </div>

                                        <!-- stripe payment area -->
                                        <div class="tab-pane text-center <?php if (settings()->stripe_payment == 1 && settings()->paypal_payment == 0) {
                                                                                echo "active";
                                                                            } ?>" id="tab_default_2">
                                            <!-- stripe payment -->
                                            <?php if ($settings->stripe_payment == 1) : ?>
                                                <div class="payment_area container" id="stripe">
                                                    <div class="row justify-content-center">
                                                        <div class="box col-md-12 text-center padding-50">

                                                            <h4 class="text-center">Stripe Payment - Upgrade Plan</h4>
                                                            <p class="mb-0 text-center">Package Plan: <?php echo html_escape($package->name); ?> (<strong><?php echo $settings->currency_symbol; ?><?php echo html_escape($price) ?> <?php echo html_escape($frequency) ?></strong>)</p><br>

                                                            <div class="credit-card-box">
                                                                <h4 class="box-title text-left">Payment Details <span class="pull-right mt--5"><img class="img-responsive" src="http://i76.imgup.net/accepted_c22e0.png"></span></h4>
                                                                <hr>
                                                                <div class="spacer py-1"></div>

                                                                <div class="box-body">

                                                                    <form role="form" action="<?php echo base_url('admin/subscription/stripe_payment') ?>" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="<?php echo $settings->publish_key; ?>" id="payment-form">

                                                                        <div class='row'>
                                                                            <div class='col-xs-12 col-md-6 form-group required text-left'>
                                                                            </div>
                                                                            <div class='col-xs-12 col-md-6 form-group required text-left'>
                                                                            </div>
                                                                        </div>

                                                                        <div class='row'>
                                                                            <div class='col-xs-12 col-md-6 form-group required text-left'>
                                                                                <label class='control-label'>Full Name</label>
                                                                                <input class='textfield textfield--grey' type='text' value="" size='6'>
                                                                            </div>
                                                                            <div class='col-xs-12 col-md-6 form-group required text-left'>
                                                                                <label class='control-label'>Paymen Option</label>
                                                                                <select name="pembayaran">
                                                                                    <option value="ovo">OVO</option>
                                                                                    <option value="dana">Dana</option>
                                                                                    <option value="bri">BRI</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>


                                                                        <div class='form-row row'>
                                                                            <div class='col-xs-12 col-md-4 form-group cvc required text-left'>
                                                                                <label class='control-label'>CVC</label> <input autocomplete='off' class='textfield textfield--grey card-cvc' placeholder='ex. 311' size='4' type='text' value="">
                                                                            </div>
                                                                            <div class='col-xs-12 col-md-4 form-group expiration required text-left'>
                                                                                <label class='control-label'>Expiration month</label> <input class='textfield textfield--grey card-expiry-month' placeholder='MM' size='2' type='text' value="">
                                                                            </div>
                                                                            <div class='col-xs-12 col-md-4 form-group expiration required text-left'>
                                                                                <label class='control-label'>Expiration year</label> <input class='textfield textfield--grey card-expiry-year' placeholder='YYYY' size='4' type='text' value="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="text-center text-success">
                                                                            <div class="payment_loader" style="display: none;"><i class="fa fa-spinner fa-spin"></i> Loading....</div><br>
                                                                        </div>

                                                                        <!-- csrf token -->
                                                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                                                                        <input type="hidden" name="billing_type" value="<?php echo $billing_type; ?>" readonly>
                                                                        <input type="hidden" name="package_id" value="<?php echo $package->id; ?>" readonly>
                                                                        <input type="hidden" name="payment_id" value="<?php echo $payment_id; ?>" readonly>
                                                                        <div class="row">
                                                                            <div class="spacer py-2"></div>
                                                                            <div class="col-md-12">
                                                                                <button class="btn btn-primary payment_btn" type="submit">Pay Now <?php echo $settings->currency_symbol; ?><?php echo html_escape($price) ?></button>
                                                                            </div>
                                                                        </div>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <?php endif ?>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>