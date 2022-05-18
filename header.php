<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <?php wp_head();?>
</head>

<body <?php body_class();?>>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <?php $header_address = get_field('header_info', 'option'); 
                    foreach($header_address as $header_add){
                    ?>
                    <small class="me-3 text-light">
                        <i class="<?php echo $header_add['header_icon'];?> me-2"></i>
                        <?php echo $header_add['header_text'];?>
                    </small>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <?php
                        $header_social = get_field('header_social','option');
                        foreach($header_social as $header_socials){
                    ?>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="<?php echo $header_socials['header_icon_url'];?>"><i class="<?php echo $header_socials['header_icon'];?> fw-normal"></i>
                    </a>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <?php $header_logo = get_field('header_logo_text','option'); ?>
            <?php $header_logo_icon = get_field('header_logo_icon','option'); ?>
            <a href="<?php echo site_url();?>" class="navbar-brand p-0">
                <h1 class="m-0"><i class="<?php print_r($header_logo_icon) ;?> me-2"></i><?php echo $header_logo;?></h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <?php 
                    wp_nav_menu( array( 
                        'theme_location' => 'main_menu',
                         ) );
                    ?>
                </div>
            </div>
        </nav>