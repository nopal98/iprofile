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
<link rel="stylesheet" href="<?php echo base_url() ?>assets/default/css/style11.css"/>
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
<body style="background: linear-gradient(90deg, <?php echo html_escape($user->gd_color1); ?> 0%, <?php echo html_escape($user->gd_color2); ?> 100%);">

<!-- Wrapper --> 

        

<!-- Main Wrapper -->
<main class="container">


    <div class="main-content">
