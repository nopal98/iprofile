
<div class="col-md-10 col-md-offset-1">
    <div id="content13" class="panel-container text-center" data-aos="fade-up">
        
        <div id="home">
            <!-- Text Section -->

            <div class="row profile-card cpd" style="background: #fff !important;">
                
                <div class="col-md-4 tc-xs">
                    <div class="profile-img trn img-circles">
                        <img class="img-circles" width="200px" src="<?php echo base_url($user->thumb) ?>" alt="" data-aos="fade-right" data-aos-delay="400">

                        <?php if ($this->session->userdata('logged_in') == TRUE):?>
                            <br><br><a target="_blank" href="<?php echo base_url('admin/profile') ?>" class="mt-4 text-dark"><i class="fa fa-cog"></i> Manage profile</a>
                        <?php endif ?>
                    </div>
                </div>
                <div class="col-md-8 text-left tc-xs" data-aos="fade-left" data-aos-delay="200">
                    <div class="user-text">

                        <h4 class="text-dark"><?php echo html_escape($user->name) ?></h4>
                        <h6 class="text-primary"><?php echo html_escape($user->designation) ?></h6>

                        <p class="habout text-dark fs-16" class="top_15"><?php echo strip_tags($user->about_me) ?></p><br>

                        <div class="user-social-acount ">
                            <a class="mail_to" href="mailto:<?php echo html_escape($user->email) ?>"><i class="fa fa-envelope" aria-hidden="true"></i> Email</a>
                            <?php if (!empty($user->phone)): ?>
                                <a class="wp_to" href="https://wa.me/<?php echo html_escape($user->phone) ?>"><i class="fa fa-whatsapp" aria-hidden="true"></i> Chat</a>
                            <?php endif ?>
                        </div>

                        <div class="user-social-acount top_30 text-left tc-xs">
                            <?php if (!empty($user->facebook)): ?>
                              <a target="_blank" href="<?php echo html_escape($user->facebook) ?>" class="btn btn-circle btn-social-icon btn-facebook" data-aos="zoom-in" data-aos-delay="400"><i class="fa fa-facebook"></i></a>
                            <?php endif ?>

                            <?php if (!empty($user->twitter)): ?>
                              <a target="_blank" href="<?php echo html_escape($user->twitter) ?>" class="btn btn-circle btn-social-icon btn-twitter" data-aos="zoom-in" data-aos-delay="500"><i class="fa fa-twitter"></i></a>
                            <?php endif ?>

                            <?php if (!empty($user->instagram)): ?>
                              <a target="_blank" href="<?php echo html_escape($user->instagram) ?>" class="btn btn-circle btn-social-icon btn-instagram" data-aos="zoom-in" data-aos-delay="600"><i class="fa fa-instagram"></i></a>
                            <?php endif ?>

                            <?php if (!empty($user->linkedin)): ?>
                              <a target="_blank" href="<?php echo html_escape($user->linkedin) ?>" class="btn btn-circle btn-social-icon btn-linkedin" data-aos="zoom-in" data-aos-delay="700"><i class="fa fa-linkedin"></i></a>
                            <?php endif ?>
                        </div>

                        

                    </div>
                </div>
            </div>
       
        </div>
            
    </div>
</div>

