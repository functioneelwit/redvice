<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context         = Timber::context();
$timber_post     = Timber::get_post();
$context['post'] = $timber_post;

$acts = Timber::get_posts( [
    'post_type' => 'act',
    'edition' => '2024',
    'posts_per_page' => -1,
] );

$blacks = [1,2,5,6,9,10,13,14,17,18,21,22,25,26,29,30,33,34];

foreach ($acts as $key => $act) {
    if($act->ID === $timber_post->ID && in_array($key, $blacks)) {
        $context['color'] = 'black';
    }
}

$context['options'] = get_fields('options');


if ( post_password_required( $timber_post->ID ) ) {
	Timber::render( 'single-password.twig', $context );
} else {
	Timber::render( array( 'single-' . $timber_post->ID . '.twig', 'single-' . $timber_post->post_type . '.twig', 'single-' . $timber_post->slug . '.twig', 'single.twig' ), $context );
}
