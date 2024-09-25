<?php
    /**
     * The main template file
     * This is the most generic template file in a WordPress theme
     * and one of the two required files for a theme (the other being style.css).
     * It is used to display a page when nothing more specific matches a query.
     * E.g., it puts together the home page when no home.php file exists
     *
     * Methods for TimberHelper can be found in the /lib sub-directory
     *
     * @package  WordPress
     * @subpackage  Timber
     * @since   Timber 0.1
     */

    $context          = Timber::context();
    $context['clients'] = Timber::get_posts([
        'post_type' => 'client',
        'posts_per_page' => 6,
    ]);
    $context['courses'] = Timber::get_posts([
        'post_type' => 'course',
        'posts_per_page' => 6,
    ]);

    $context['options'] = get_fields('options');

    $templates = ['page.twig'];
    
    
    
    if ( is_front_page() ) {
        $context['home'] = true;
        array_unshift($templates, 'home.twig');
    }
    elseif (is_page('contact')) {

        $token = md5(uniqid(rand(), true));
        $_SESSION['token'] = $token;
        $context['token'] = $token;
        if(isset($_SESSION['contact_message_send']) && $_SESSION['contact_message_send'] == 1) {
            $context['contact_message_send'] = 1;
        }
        unset($_SESSION['contact_message_send']);
        array_unshift($templates, 'contact.twig');
        
        echo '<pre>';
        var_dump($_SESSION);
        echo '</pre>';
    }

    Timber::render($templates, $context);
