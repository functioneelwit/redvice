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
        $to = 'info@redvice.eu';
        $subject = 'Een bericht van ' . $name . ' via het contactformulier op redvice.eu';
        $body = "Naam: $name\nBedrijf: $companyname\nE-mailadres: $email\nTelefoonnummer: $phone\n\n$mailbody";
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