
    <div id="home-page"></div>

    <!-- Hero-Area -->
    <section class="hero-area" style="background-image: url('<?php echo base_url() ?>assets/front/images/footer-shape.png'); background-position: left top;">
        <div class="container">
            <div class="row equal-height">
                <div class="col-xs-12 col-sm-12 col-md-5">
                    <h1 class="hero-title" data-aos="fade-left" data-aos-delay="400">Using <span class="hero-site"><?php echo settings()->site_name ?></span> grow your audience and get more clients.</h1>

                    <h4 class="hero-title-sub mt-20" data-aos="fade-left" data-aos-delay="500" >Create a page to present who you are and what you do share in just one link.</h4>

                    <a data-aos="fade-left" data-aos-delay="750" href="<?php echo base_url('create-profile') ?>" class="bttn-2 mt-10">Get your page now </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7" data-aos="fade-right" data-aos-delay="300">
                    <div class="hidden visible-xs visible-sm space-60"></div>
                    <figure>
                        <img src="<?php echo base_url() ?>assets/front/images/hero-image.jpg" alt="illustration">
                    </figure>
                </div>
            </div>
        </div>
    </section><!-- /Hero-Area -->

    <section class="section-padding">
        <div class="container">
            <div class="row equal-height">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center" data-aos="fade-up">
                    <h2 class="head-title" data-aos="fade-up">8 Profile & Vcards Templates</h2>
                     <h4 class="hero-title-sub mt-10" data-aos="fade-up" data-aos-delay="300" >Templates are fully customizable so you can add your preferable fonts, colors and gradient backgrounds from your panel</h4>
                    <div class="space-40"></div>
                </div>
                <div class="row">
                    
                    <?php $b1=1; for ($v=11; $v <= 12; $v++) { ?>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="home-layout" style="background-image: url(<?php echo base_url() ?>assets/admin/layouts/style<?php echo $v; ?>.jpg);" data-aos="fade-up" data-aos-delay="<?php echo $b1 * 150; ?>">
                                <span class="new-ribbon">New</span>
                            </div>
                        </div>
                    <?php $b1++; } ?>

                    <?php $b=3; for ($i=5; $i >= 1; $i--) { ?>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="home-layout" style="background-image: url(<?php echo base_url() ?>assets/admin/layouts/style<?php echo $i; ?>.png);" data-aos="fade-up" data-aos-delay="<?php echo $b * 200; ?>">

                                <?php if ($i == 5): ?>
                                    <span class="new-ribbon">New</span>
                                <?php endif ?>
                            </div>
                        </div>
                    <?php $b++; } ?>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Services Section -->
    <?php if (!empty($services)): ?> 
        <section class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="page-title">
                            <h3 class="title" data-aos="fade-up"> The better way to manage and share your online profile</h3>
                            <div class="space-60"></div>
                        </div>
                    </div>
                </div>
                
                <?php $i=1; foreach ($services as $service): ?>
                    <div class="row equal-height <?php echo($i % 2 == 0) ? 'revers' : '' ?>">
                        <div class="col-xs-12 col-sm-5" data-aos="fade-left">
                            <figure class="text-left">
                                <img src="<?php echo base_url($service->image) ?>" alt="">
                            </figure>
                            <div class="space-10 hidden visible-xs"></div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-sm-offset-1" data-aos="fade-right">
                            <div class="single-service-two">
                                <h3 class="title text-<?php echo($i % 2 == 0) ? 'left' : 'left' ?>"><?php echo html_escape($service->name); ?></h3>
                                <p class="text-<?php echo($i % 2 == 0) ? 'left' : 'left' ?>"><?php echo $service->details; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="space-50"></div>
                <?php $i++; endforeach; ?>

            </div>
        </section><!-- /Section -->
    <?php endif ?>


    <!-- Services Section -->
    <?php if ($settings->enable_blog == 1 && !empty($posts)): ?>
        <section class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3" data-aos="fade-up">
                        <div class="page-title">
                            <h2 class="title"> Learn More & Empower yourself </h2>
                            <div class="space-20"></div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <!-- start posts -->
                        <div class="posts posts-style-1">
                            <div class="__inner">
                                <div class="row">
                                    <!-- start item -->
                                    <?php $p=1; foreach ($posts as $post): ?>
                                        <div class="col-12 col-sm-6 col-lg-4 d-sm-flex" data-aos="fade-up" data-aos-delay="<?php echo $p * 200; ?>">
                                            <div class="__item __item--preview">
                                                <div class="__header">
                                                    <a href="<?php echo base_url('post/'.$post->slug) ?>">
                                                        <figure class="__image">
                                                            <img width="303" height="223" src="<?php echo base_url($post->image) ?>" alt="demo" />
                                                        </figure>
                                                    </a>
                                                </div>

                                                <div class="__body">
                                                    <div class="__content">
                                                        <a class="post_category" href="<?php echo base_url('category/'.$post->category_slug) ?>">
                                                            <?php echo html_escape($post->category) ?>
                                                        </a>

                                                        <h4 class="__title"><a href="<?php echo base_url('post/'.$post->slug) ?>"><?php echo html_escape($post->title) ?></a></h4>

                                                        <p>
                                                            <?php echo character_limiter($post->details, 100)?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php $p++; endforeach ?>
                                    <!-- end item -->

                                </div>
                            </div>
                        </div>
                        <!-- end posts -->

                        <!-- start pagination -->
                        <div class="row">
                            <div class="mt-md-12 text-center">
                                <?php echo $this->pagination->create_links(); ?>
                            </div>
                        </div>
                        <!-- end pagination -->
                    </div>
                </div>

            </div>
        </section><!-- /Section -->
    <?php endif ?>


    