 
        <!-- Section About -->
        <section id="about" class="about" data-aos="fade-up">
            <div class="section-header">
                <h2>About Me</h2>
                <?php if (!empty($user->cv)): ?>
                    <a href="<?php echo base_url('download/'.html_escape($user->id)) ?>" class="resume-download" data-toggle="tooltip" data-placement="top" title="Download Resume"> <i class="fa fa-download" aria-hidden="true"> </i>  Download 
                    </a>

                    <a target="_blank" href="<?php echo base_url(html_escape($user->cv)) ?>" class="view-resume" data-toggle="tooltip" data-placement="top" title="View Resume"> <i class="fa fa-eye" aria-hidden="true"> </i>  View
                    </a>
                <?php endif ?>
            </div>

            <div class="intro">
                <p><?php echo strip_tags($user->about_me) ?></p>

                <ul class="info user">
                    <li><strong><?php echo html_escape($user->name) ?></strong> </li>
                    <?php if (!empty($user->designation)): ?>
                        <li><strong>Designation:</strong> <?php echo html_escape($user->designation) ?></li>
                    <?php endif ?>

                    <?php if (!empty($user->email)): ?>
                        <li><strong>Email:</strong> <?php echo html_escape($user->email) ?></li>
                    <?php endif ?>

                    <?php if (!empty($user->phone)): ?>
                        <li><strong>Phone:</strong> <?php echo html_escape($user->phone) ?></li>
                    <?php endif ?>
                </ul>

            </div>
        </section>


        <?php if ($user->enable_service == 1 && check_package_features('service', $user->id) == TRUE): ?>
        <section id="services" class="services" data-aos="fade-up">
            
            <div class="section-header">
                <h2>Services</h2>
            </div>

            <div class="row">
                <?php $s=1; foreach ($services as $service): ?>
                <div class="col-md-4">
                    <div class="service_item shadow-lg text-center" data-aos="zoom-in-up" data-aos-delay="<?php echo $s * 150; ?>">
                        <img width="100px" class="service-img" src="<?php echo base_url($service->thumb) ?>">
                        <h3><?php echo html_escape($service->name) ?></h3>
                        <p><?php echo character_limiter($service->details, 110) ?></p>
                    </div>
                </div>
                <?php $s++; endforeach ?>
            </div>
        </section>
        <?php endif ?>


        <?php if ($user->enable_followers == 1 && check_package_features('followers', $user->id) == TRUE): ?>

                <section class="services line graybg col-md-12 padding_50 padbot_50" data-aos="fade-up">
                    <div class="section-header">
                        <h2>Followers</h2>
                    </div>
                    <div class="row">
                        <?php if (empty($followers)): ?>
                            <p class="pl-20">Nobody follows you</p>
                        <?php else: ?>

                            <?php foreach ($followers as $follower): ?>
                                <div class="col-md-1 col-sm-1 col-xs-2">
                                    <div class="small-item">
                                        <a data-title="<?php echo html_escape($follower->name) ?>" target="_blank" href="<?php echo base_url('profile/'.$follower->slug) ?>">
                                            <img width="80px" class="img-circles" src="<?php echo base_url($follower->thumb) ?>">
                                        </a>
                                        <!-- <p><?php echo html_escape($follower->name) ?></p> -->
                                    </div>
                                </div>
                            <?php endforeach ?>

                        <?php endif ?>
                    </div>
                </section>
          

                
                <section class="services line graybg col-md-12 padding_50 padbot_50" data-aos="fade-up">
                    <div class="section-header">
                        <h2>Following</h2>
                    </div>
                    <div class="row">
                        
                        <?php if (empty($followings)): ?>
                            <p class="pl-20">You haven't following yet</p>
                        <?php else: ?>
                        
                            <?php foreach ($followings as $follow): ?>
                                <div class="col-md-1 col-sm-1 col-xs-2">
                                    <div class="small-item">
                                        <a data-title="<?php echo html_escape($follow->name) ?>" target="_blank" href="<?php echo base_url('profile/'.$follower->slug) ?>">
                                            <img width="80px" class="img-circles" src="<?php echo base_url($follow->thumb) ?>">
                                        </a>
                                        <!-- <p><?php echo html_escape($follower->name) ?></p> -->
                                    </div>
                                </div>
                            <?php endforeach ?>

                        <?php endif ?>

                    </div>
                </section>
          
            <?php endif ?>



        <?php if ($user->enable_testimonial == 1 && check_package_features('testimonial', $user->id) == TRUE): ?>
        <section id="testimonials" class="testimonials" data-aos="fade-up">
            
            <div class="section-header">
                <h2>Testimonials</h2>
            </div>

            <!-- Carousel -->
            <div class="testimonial-carousel">

                <?php foreach ($testimonials as $test): ?>
                <div class="item">
                    <div class="row">
                        <div class="text col-md-12 col-sm-12 col-xs-12 text-center">
                            <div class="thumb">
                                <img src="<?php echo base_url($test->thumb) ?>" alt="testimonial">
                            </div>

                            <span class="author"><?php echo html_escape($test->name) ?></span>
                            <p><?php echo html_escape($test->feedback) ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>

            </div>
            <!-- Carousel end -->
        </section>
        <?php endif ?>
       