<?php namespace TDW\Theme; ?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class( 'no-js' ); ?>>
    <header>
        <section class="columns">
            <h1 class="column"><?php echo get_bloginfo('name'); ?></h1>
            <section class="column">
                <?php do_action('tdw_generate_menu'); ?>
            </section>
        </section>
    </header>