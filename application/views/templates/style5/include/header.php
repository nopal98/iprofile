<!doctype html>
<html lang="en">

<head>
<?php $settings = get_settings(); ?>
<title>
    <?php if (isset($page) && $page == 'Post'): ?>
        <?php echo html_escape($post->title) ?> - <?php echo html_escape($settings->site_name) ?>
    <?php else: ?>
        <?php echo html_escape($user->name) ?>  <?php if(empty($user->designation)){echo "Profile";}else{echo html_escape($user->designation);} ?>

    <?php endif ?>
</title>
<meta charset="UTF-8">
<meta name="description" content="<?php echo html_escape($user->about_me) ?>">
<meta name="keywords" content="profile, vcard, portfolio">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<!-- Favicon -->  
<link rel="icon" href="<?php echo base_url($settings->favicon) ?>">

<!-- CSS -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/default/css/bootstrap.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/default/css/reset.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/default/css/cubeportfolio.min.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/default/css/owl.theme.css"/> 
<link rel="stylesheet" href="<?php echo base_url() ?>assets/default/css/owl.carousel.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/default/css/style5.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/default/css/aos.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/default/css/colors/yellow.css" id="color"/>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/default/css/simple-line-icons.css" id="color"/>

<link href="<?php echo base_url() ?>assets/default/datetime/datetimepicker.css" rel="stylesheet">

<!-- Colors --> 
<link href="<?php echo base_url(); ?>assets/default/css/colors/colors.php?color=<?php echo $user->site_color; ?>" rel="stylesheet"/>
<link href="<?php echo base_url(); ?>assets/default/css/fonts/fonts.php?font=<?php echo $user->font; ?>" rel="stylesheet"/>

<!-- fonts -->
<link href="https://fonts.googleapis.com/css?family=<?php echo str_replace(' ', '+', $user->font); ?>:400,500,600,700" rel="stylesheet">

<!-- Font Icons --> 
<link rel="stylesheet" href="<?php echo base_url() ?>assets/default/icon-fonts/font-awesome-4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/default/icon-fonts/web-design/flaticon.css" />

<!-- google analytics -->
<?php if (!empty($user->google_analytics)): ?>
    <?php echo base64_decode($user->google_analytics) ?>
<?php endif ?>

</head>
<body>

<!-- Wrapper --> 

        

<!-- Main Wrapper -->
<main class="container-fluid">

    <!-- Header -->
    <header class="header pull-left">

        <!-- Mobile menu -->
        <div class="mobile-bar visible-sm visible-xs">
            <div class="hamburger-menu">
                <div class="bar"></div>   
            </div>
        </div>
        <!-- Mobile menu end -->

        <div class="avatar">
            <img class="img-circle" src="<?php echo base_url($user->thumb) ?>" alt="">
        </div>

        <div class="name text-center">
            <h1><?php echo html_escape($user->name) ?></h1>
            <span><?php echo html_escape($user->designation) ?></span>
        </div>

        <!-- Social Icons -->
        <div class="social-icons text-center">
            <ul>
                <?php if (!empty($user->facebook)): ?>
                  <li><a target="_blank" href="<?php echo html_escape($user->facebook) ?>"><i class="fa fa-facebook"></i></a></li>
                <?php endif ?>

                <?php if (!empty($user->twitter)): ?>
                  <li><a target="_blank" href="<?php echo html_escape($user->twitter) ?>" ><i class="fa fa-twitter"></i></a></li>
                <?php endif ?>

                <?php if (!empty($user->instagram)): ?>
                  <li><a target="_blank" href="<?php echo html_escape($user->instagram) ?>" ><i class="fa fa-instagram"></i></a></li>
                <?php endif ?>

                <?php if (!empty($user->linkedin)): ?>
                  <li><a target="_blank" href="<?php echo html_escape($user->linkedin) ?>" ><i class="fa fa-linkedin"></i></a></li>
                <?php endif ?>
            </ul>
        </div>
        <!-- Social Icons end -->

        <!-- Navigation bar -->
        <nav class="main-nav">
            <ul class="navigation">
                
               

                    <?php if ($this->session->userdata('logged_in') == TRUE):?>
                        <li class="tab"><a target="_blank" href="<?php echo base_url('admin/profile') ?>"><i class="icon-grid"></i> Dashboard</a></li>
                    <?php endif; ?>

                    <?php if (check_package_features('service', $user->id) == TRUE || check_package_features('skill', $user->id) == TRUE || check_package_features('followers', $user->id) == TRUE): ?>
                    <li><a class="<?php if(isset($page_title) && $page_title == 'Home'){echo 'active';}else{echo "";} ?>" href="<?php echo base_url(html_escape($user->slug)) ?>"><i class="icon-user"></i> About me</a></li>
                    <?php endif ?>

                    <?php if (check_package_features('experience', $user->id) == TRUE || check_package_features('testimonial', $user->id) == TRUE): ?>
                    <li><a class="<?php if(isset($page_title) && $page_title == 'Resume'){echo 'active';}else{echo "";} ?>" href="<?php echo base_url('resume/'.html_escape($user->slug)) ?>"><i class="icon-book-open"></i> Resume</a></li>
                    <?php endif ?>

                    <?php if ($user->enable_portfolio == 1 && check_package_features('portfolio', $user->id) == TRUE): ?>
                    <li><a class="<?php if(isset($page_title) && $page_title == 'Portfolio'){echo 'active';}else{echo "";} ?>" href="<?php echo base_url('portfolio/'.html_escape($user->slug)) ?>"><i class="icon-briefcase"></i> Portfolio</a></li>
                    <?php endif ?>

                    <?php if ($user->enable_blog == 1 && check_package_features('portfolio', $user->id) == TRUE): ?>
                    <li><a class="<?php if(isset($page_title) && $page_title == 'Blog Posts' || $page_title == 'Post details'){echo 'active';}else{echo "";} ?>" href="<?php echo base_url('blog/'.html_escape($user->slug)) ?>"><i class="icon-bubble"></i> Blog</a></li>
                    <?php endif ?>

                    <?php if ($user->enable_contact == 1 && check_package_features('contact', $user->id) == TRUE): ?>
                    <li><a class="<?php if(isset($page_title) && $page_title == 'Contact'){echo 'active';}else{echo "";} ?>" href="<?php echo base_url('contact/'.html_escape($user->slug)) ?>"><i class="icon-location-pin"></i> Contact</a></li>
                    <?php endif ?>

                    <?php if ($user->enable_appointment == 1 && check_package_features('appointment', $user->id) == TRUE): ?>
                    <li><a class="<?php if(isset($page_title) && $page_title == 'Appointment'){echo 'active';}else{echo "";} ?>" href="<?php echo base_url('appointment/'.html_escape($user->slug)) ?>"><i class="icon-calendar"></i> Appointment</a></li>
                    <?php endif ?>

                    <?php if ($this->session->userdata('logged_in') == FALSE):?>
                        <li class="tab"><a href="<?php echo base_url('login') ?>"><i class="icon-login"></i> Login </a>
                    <?php else: ?>
                        <li class="tab"><a href="<?php echo base_url('login') ?>"><i class="icon-logout"></i> Logout </a>
                    <?php endif ?>


            </ul>
        </nav>
        <!-- Navigation bar end -->

        <!-- Footer Copyright -->
        <!-- <div class="copyright">
            <span>© Copyright 2021 Codericks</span>
        </div> -->
        <!-- Footer Copyright end -->

    </header>
    <!-- Header end -->

    <div class="main-content container">
