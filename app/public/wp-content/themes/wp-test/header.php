<?php
/**
 * Header Template for MyTheme Child
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header id="site-header" role="banner">
    <div class="header-container">
        <div class="site-branding">
            <?php the_custom_logo(); ?>
            <?php if (is_front_page() && is_home()) : ?>
                <h1 class="site-title"><?php bloginfo('name'); ?></h1>
            <?php else : ?>
                <p class="site-title"><?php bloginfo('name'); ?></p>
            <?php endif; ?>
            <p class="site-description"><?php bloginfo('description'); ?></p>
        </div>

        <nav id="site-navigation" class="main-navigation" role="navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'menu-1',
                'menu_id'        => 'primary-menu',
            ));
            ?>
        </nav>
        <img width="80px" src="https://cdn4.iconfinder.com/data/icons/the-weather-is-nice-today/64/weather_2-256.png">

        <!-- <div id="weather-placeholder">
            
             
              <p>Loading weather data...</p>
        </div> -->
    </div>
</header>
`