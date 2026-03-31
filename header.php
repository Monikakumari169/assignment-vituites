<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php bloginfo('name'); ?></title>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>


<header>
    <nav class="site-navbar" id="siteNavbar">
        <div class="navbar-inner">

        <?php

        $banner_logo = get_field('logo', 'option');
        $phone_number = get_field('phone_number', 'option');
        
        ?>

            <!-- Brand / Logo -->
            <a href="<?php echo home_url('/'); ?>" class="navbar-brand" aria-label="Home">
                <div class="brand-icon">
                    <?php if(!empty($banner_logo)){ ?>
                         <img src="<?php echo $banner_logo; ?>" alt="Site-logo" class="brand-logo">
                    <?php } ?>
                </div>
            </a>

            <!-- Desktop Nav Links -->
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'navbar-nav-links',
                    'fallback_cb'    => false,
                ));
            ?>

            <!-- Phone CTA Button (Desktop) -->
            <a href="tel:123456789" class="phone-btn" aria-label="Call us">
                <i class="bi bi-telephone-fill"></i>
                <?php echo $phone_number; ?>
            </a>

            <!-- Hamburger Toggle (Mobile) -->
            <button class="navbar-toggler-custom" id="menuToggle" aria-label="Toggle navigation" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>

        </div>

        <!-- Mobile Dropdown Menu -->
        <div class="mobile-menu" id="mobileMenu" role="navigation" aria-label="Mobile Navigation">
            <a href="#about">About</a>
            <a href="#projects">Projects</a>
            <a href="#lorem">Lorem</a>
            <a href="#ipsum">Ipsum</a>
            <a href="#lorem-ipsum">Lorem Ipsum</a>
            <a href="#contact">Contact</a>
            <a href="tel:123456789" class="mobile-phone-btn">
                <i class="bi bi-telephone-fill"></i>
                123 456789
            </a>
        </div>
    </nav>
</header>
<!-- /HEADER -->
