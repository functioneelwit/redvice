<?php
/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 */

if(strpos($_SERVER['REQUEST_URI'],'doneer-nu')){
    $donateUrl = get_field('donate_url', 'options');
    if($donateUrl) {
        header("Location: ".$donateUrl);
        exit();
    }
}

// Load Composer dependencies.
require_once __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/src/StarterSite.php';

include_once(get_stylesheet_directory() . '/src/wp-custom-post-type-client.php');
include_once(get_stylesheet_directory() . '/src/wp-custom-post-type-course.php');

Timber\Timber::init();

// Sets the directories (inside your theme) to find .twig files.
Timber::$dirname = [ 'templates', 'views' ];


new StarterSite();