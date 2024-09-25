<?php
/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 */

if(isset($_POST['_token']))
{
    session_start();
    if(isset($_POST['_token']) && $_POST['_token'] == $_SESSION['token']) {
        $name = $_POST['name'];
        $companyname = $_POST['companyname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $mailbody = $_POST['mailbody'];
        $to = 'mattijs@functioneelwit.nl';
        $subject = 'Contact Form Submission';
        $body = "Name: $name\nBedrijf: $companyname\nEmail: $email\nTelefoonnummer: $phone\n\n$mailbody";
        wp_mail($to, $subject, $body);
        $_SESSION['contact_message_send'] = 1;
    }
    header("Location: /contact");
    exit;
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