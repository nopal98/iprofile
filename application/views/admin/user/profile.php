<div class="content-wrapper">

  <section class="content">

    <div class="row">
      <div class="col-xl-3 col-lg-3">

        <!-- Profile Image -->
        <div class="box">
          <div class="box-body box-profile">
            <img class="profile-user-img rounded-circle img-fluid mx-auto d-block" src="<?php echo base_url($user->thumb); ?>" alt="User profile picture">

            <h5 class="text-center"><?php echo html_escape($user->name) ?> <?php if ($user->hit != 0) {
                                                                              echo "- Profile views (" . $user->hit . ')';
                                                                            } ?></h5>

            <h5 class="text-center">Joined: <?php echo get_time_ago($user->created_at); ?></h5>

            <?php if (check_my_payment_status() == TRUE) : ?>
              <h5 class="text-center text-danger"><b><?php echo date_dif(date('Y-m-d'), $payment->expire_on) ?> Days left</b></h5>
              <h5 class="text-center pay_status"><b>Payment Status: &nbsp; <i class="fa fa-check"></i> <?php echo ucfirst($payment->status); ?></b></h5>
            <?php else : ?>
              <a href="https://wa.me/6285156039256" class="btn btn-primary">Payment Confirmation</a>
              <h5 class="text-center pay_pending"><b>Payment Status: &nbsp; <i class="fa fa-exclamation-circle"></i> <?php echo ucfirst($payment->status); ?></b></h5>
            <?php endif ?><br>

            <div class="user-social-acount text-center">
              <?php if (!empty($user->facebook)) : ?>
                <a href="<?php echo html_escape($user->facebook) ?>" class="btn btn-circle btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
              <?php endif ?>

              <?php if (!empty($user->twitter)) : ?>
                <a href="<?php echo html_escape($user->twitter) ?>" class="btn btn-circle btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
              <?php endif ?>

              <?php if (!empty($user->instagram)) : ?>
                <a href="<?php echo html_escape($user->instagram) ?>" class="btn btn-circle btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
              <?php endif ?>

              <?php if (!empty($user->linkedin)) : ?>
                <a href="<?php echo html_escape($user->linkedin) ?>" class="btn btn-circle btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>
              <?php endif ?>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <?php if (check_package_features('qr-code', user()->id) == TRUE) : ?>
          <div class="box">
            <div class="box-header with-border text-center">
              <h4 class="mb-0">QR Code</h4>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12 text-center">
                  <img width="200px" class="img-thumbnail" src="<?php echo base_url(user()->qr_code) ?>">
                </div>

                <div class="col-md-12 mt-4 text-center">
                  <a href="<?php echo base_url('admin/profile/download_qrcode') ?>" class="btn btn-info"><i class="fa fa-cloud-download"></i> Download</a>
                </div>

              </div>
            </div>
          </div>
        <?php endif ?>


      </div>
      <!-- /.col -->

      <div class="col-xl-9 col-lg-9">
        <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/profile/update') ?>" role="form" class="form-horizontal">

          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a class="active" href="#content1" data-toggle="tab"><i class="fa fa-pencil-square"></i> Update Info</a></li>
              <?php $settings = get_settings(); ?>

              <?php if (check_my_payment_status() == TRUE || $settings->enable_paypal == 0) : ?>
                <li><a href="#content6" data-toggle="tab"><i class="fa fa-adjust"></i> Colors & fonts</a></li>
                <li><a href="#content5" data-toggle="tab"><i class="fa fa-phone"></i> Contact Settings</a></li>
              <?php endif ?>

              <li><a href="#content3" data-toggle="tab"><i class="fa fa-globe"></i> Market Place links</a></li>
              <li><a href="#content4" data-toggle="tab"><i class="fa fa-cog"></i> Social Settings</a></li>
            </ul>

            <div class="tab-content">

              <!-- tab 1 -->
              <div class="active tab-pane" id="content1">

                <div class="row">
                  <div class="col-sm-7">

                    <div class="form-group mt-20">
                      <label class="col-sm-12 control-label" for="example-input-normal">Full Name</label>
                      <div class="col-sm-12">
                        <input type="text" name="name" value="<?php echo $user->name; ?>" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="example-input-normal">Designation</label>
                      <div class="col-sm-12">
                        <input type="text" name="designation" class="form-control" value="<?php echo $user->designation; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="example-input-normal">Email</label>
                      <div class="col-sm-12">
                        <input type="email" name="email" class="form-control" value="<?php echo $user->email; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="example-input-normal">Phone</label>
                      <div class="col-sm-12">
                        <input type="text" name="phone" class="form-control" value="<?php echo $user->phone; ?>">
                      </div>
                    </div>

                    <?php if (settings()->enable_country == 1) : ?>
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="example-input-normal">Country</label>
                        <div class="col-sm-12">
                          <select class="form-control single_select" name="country">
                            <option value="0">Select</option>
                            <?php foreach ($countries as $country) : ?>
                              <option value="<?php echo html_escape($country->id); ?>" <?php echo ($user->country == $country->id) ? 'selected' : ''; ?>>
                                <?php echo html_escape($country->name); ?>
                              </option>
                            <?php endforeach ?>
                          </select>
                        </div>
                      </div>
                    <?php else : ?>
                      <input type="hidden" name="country" value="<?php echo $user->country; ?>">
                    <?php endif; ?>


                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="example-input-normal">About me</label>
                      <div class="col-sm-12">
                        <textarea class="form-control" id="ckEditor" name="about_me" rows="10"><?php echo $user->about_me; ?></textarea>
                      </div>
                    </div>

                    <div class="form-group m-t-20">
                      <label class="col-sm-2 control-label" for="example-input-normal"></label>
                      <div class="col-sm-12">
                        <img width="100px" src="<?php echo base_url($user->thumb); ?>"><br><br>
                        <div style="position:relative;" class="m-t-5">
                          <a class='btn btn-default' href='javascript:;'>
                            <i class="fa fa-cloud-upload"></i> Change Avatar
                            <input type="file" style='position:absolute;z-index:2;top:0;left:0;height:38px;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="photo" size="40" onchange='$("#upload-logo").html($(this).val());'>
                          </a>
                          &nbsp;
                          <span class='label label-info' id="upload-logo"></span>
                        </div>
                      </div>
                    </div>

                  </div>


                  <?php if (check_my_payment_status() == TRUE || $settings->enable_paypal == 0) : ?>
                    <div class="col-sm-5">

                      <h4 class="mb-20 mt-10">Preferences</h4>

                      <div class="form-group mb-10 mr-30 mt-10 pb-10 bb1">
                        <label class="mt-5">Profile</label>
                        <span class="pull-right"><input type="checkbox" name="enable_vcard" value="1" <?php if ($user->enable_vcard == 1) {
                                                                                                        echo 'checked';
                                                                                                      } ?> data-toggle="toggle" data-onstyle="info" data-width="100"></span>
                      </div>

                      <?php foreach ($features as $feature) : ?>
                        <?php $val = 'enable_' . $feature->slug; ?>

                        <?php if ($feature->slug != 'qr-code' && $feature->slug != 'vcard') : ?>
                          <div class="form-group mb-10 mr-30 mt-10 pb-10 bb1">
                            <label class="mt-5"><?php echo $feature->name ?></label>
                            <span class="pull-right"><input type="checkbox" name="<?php echo $val; ?>" value="1" <?php if ($user->$val == 1) {
                                                                                                                    echo 'checked';
                                                                                                                  } ?> data-toggle="toggle" data-onstyle="info" data-width="100"></span>
                          </div>
                        <?php endif ?>

                      <?php endforeach ?>

                    </div>
                  <?php endif ?>
                </div>

              </div>

              <?php if (check_my_payment_status() == TRUE || settings()->enable_paypal == 0) : ?>

                <!-- tab 3 -->
                <div class="tab-pane" id="content3" aria-hidden="false">
                  <div class="form-group m-t-20">
                    <label class="col-sm-2 control-label" for="example-input-normal">Envato</label>
                    <div class="col-sm-12">
                      <input type="text" name="envato" value="<?php echo $user->envato; ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group m-t-20">
                    <label class="col-sm-2 control-label" for="example-input-normal">Upwork</label>
                    <div class="col-sm-12">
                      <input type="text" name="upwork" value="<?php echo $user->upwork; ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group m-t-20">
                    <label class="col-sm-2 control-label" for="example-input-normal">Fiverr</label>
                    <div class="col-sm-12">
                      <input type="text" name="fiverr" value="<?php echo $user->fiverr; ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group m-t-20">
                    <label class="col-sm-2 control-label" for="example-input-normal">Freelancer</label>
                    <div class="col-sm-12">
                      <input type="text" name="freelancer" value="<?php echo $user->freelancer; ?>" class="form-control">
                    </div>
                  </div>
                </div>

                <!-- tab 3 -->
                <div class="tab-pane" id="content5" aria-hidden="false">
                  <div class="form-group m-t-20">
                    <label class="col-sm-2 control-label" for="example-input-normal">Contact Address</label>
                    <div class="col-sm-12">
                      <textarea class="form-control" name="address" rows="8"><?php echo $user->address; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group m-t-20">
                    <label class="col-sm-2 control-label" for="example-input-normal">Skype</label>
                    <div class="col-sm-12">
                      <input type="text" name="skype" value="<?php echo $user->skype; ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group m-t-20">
                    <label class="col-sm-2 control-label" for="example-input-normal">Whatsapp</label>
                    <div class="col-sm-12">
                      <input type="text" name="whatsapp" value="<?php echo $user->whatsapp; ?>" class="form-control">
                    </div>
                  </div>
                </div>

                <!-- tab 5 -->
                <div class="tab-pane m-b-20" id="content6" aria-hidden="false">

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group m-t-20 p-10">
                        <label>Site Font</label>
                        <select class="form-control select2" name="site_font">
                          <option value="">Select Font</option>
                          <?php foreach ($fonts as $fon) : ?>
                            <option value="<?php echo $fon->id; ?>" <?php echo (user()->site_font == $fon->id) ? 'selected' : ''; ?>><?php echo ucfirst($fon->name); ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>

                      <div class="form-group m-t-20 p-10">
                        <label>Select Color</label>
                        <span class="color" style="background: #<?php echo $user->site_color; ?>"></span><br>

                        <input type="text" name="site_color" class="colorpicker-default form-control colorpicker-element" value="<?php echo $user->site_color; ?>">
                      </div>

                    </div>

                    <div class="col-md-6">
                      <div class="form-group m-t-10 mt-10">
                        <label>Gradient Background Left Color for vcard background</label>
                        <input type="text" name="gd_color1" class="colorpicker-default form-control colorpicker-element" value="<?php echo html_escape($user->gd_color1); ?>">
                      </div>

                      <div class="form-group m-t-10 ">
                        <label>Gradient Background Right Color for vcard background</label>
                        <input type="text" name="gd_color2" class="colorpicker-default form-control colorpicker-element" value="<?php echo html_escape($user->gd_color2); ?>">
                      </div>
                      <span class="color" style="width: 100%; background: linear-gradient(90deg, <?php echo html_escape($user->gd_color1); ?> 0%, <?php echo html_escape($user->gd_color2); ?> 100%);"></span>
                    </div>
                  </div>

                </div><br><br>
              <?php endif ?>

              <!-- tab 4 -->
              <div class="tab-pane" id="content4" aria-hidden="false">
                <div class="form-group m-t-20">
                  <label class="col-sm-2 control-label" for="example-input-normal">Facebook</label>
                  <div class="col-sm-12">
                    <input type="text" name="facebook" value="<?php echo $user->facebook; ?>" class="form-control">
                  </div>
                </div>
                <div class="form-group m-t-20">
                  <label class="col-sm-2 control-label" for="example-input-normal">Twitter</label>
                  <div class="col-sm-12">
                    <input type="text" name="twitter" value="<?php echo $user->twitter; ?>" class="form-control">
                  </div>
                </div>
                <div class="form-group m-t-20">
                  <label class="col-sm-2 control-label" for="example-input-normal">Linked in</label>
                  <div class="col-sm-12">
                    <input type="text" name="linkedin" value="<?php echo $user->linkedin; ?>" class="form-control">
                  </div>
                </div>
                <div class="form-group m-t-20">
                  <label class="col-sm-2 control-label" for="example-input-normal">Instagram</label>
                  <div class="col-sm-12">
                    <input type="text" name="instagram" value="<?php echo $user->instagram; ?>" class="form-control">
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-2 control-label" for="example-input-normal">Google Analytics</label>
                  <div class="col-sm-12">
                    <textarea class="form-control" name="google_analytics" rows="8"><?php echo base64_decode($user->google_analytics); ?></textarea>
                  </div>
                </div>
              </div>

              <!-- csrf token -->
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

              <div class="box-bottom">
                <div class="pull-right">
                  <button type="submit" class="btn btn-info waves-effect w-md waves-light m-b-5"><i class="fa fa-check"></i> Save Changes</button>
                </div>
              </div>


            </div>

          </div>

        </form>
      </div>

  </section>

</div>