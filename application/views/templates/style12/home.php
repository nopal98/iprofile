

<div class="col-md-6 col-md-offset-3">
    <div id="content" class="panel-container" data-aos="zoom-in">
        
        <div id="home">
            <!-- Text Section -->

            <div class="row">
                <div class="col-md-12 profile-card text-center">

                    <?php if ($this->session->userdata('logged_in') == TRUE):?>
                        <a target="_blank" href="<?php echo base_url('admin/profile') ?>" class="mt-4 text-white profile-log"><i class="fa fa-cog"></i> Manage profile <i class="fa fa-long-arrow-right"></i></a>
                    <?php endif ?>

                    <div class="profile-img">
                        <img class="img-circles" width="200px" src="<?php echo base_url($user->thumb) ?>" alt="" data-aos="zoom-in" data-aos-delay="200">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center tc-xs" data-aos="fade-up" data-aos-delay="200">
                    <div class="user-text">
                        <h4><?php echo html_escape($user->name) ?></h4>
                        <h6><?php echo html_escape($user->designation) ?></h6>

                        <div class="user-social-acount text-center top_15 tc-xs">
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

            <div class="row">
                <div class="col-md-12 text-center text-white p-30" data-aos="fade-up" data-aos-delay="300">
                    <div class="section-title top_15"><span></span><h2>About Me</h2></div>
                    <p class="habout"><?php echo $user->about_me ?></p><br>
                </div>

                <div class="col-md-12 text-center p-20">
                    <a class="mail_to" href="mailto:<?php echo html_escape($user->email) ?>"><i class="fa fa-envelope" aria-hidden="true"></i> Email</a>
                    <?php if (!empty($user->phone)): ?>
                        <a class="wp_to" href="https://wa.me/<?php echo html_escape($user->phone) ?>"><i class="fa fa-whatsapp" aria-hidden="true"></i> Chat</a>
                    <?php endif ?>
                </div>

            </div>
       
        </div>
            
    </div>
</div>

