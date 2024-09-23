<?php

function my_register_post_type_course()
{

    if (function_exists('register_post_type'))
    {

        register_post_type(

            'course',

            [

                'labels' => [

                    'name'                   => 'Trainingen',
                    'singular_name'          => 'Training',
                    'all_items'              => 'Alle trainingen',
                    'add_new'                => 'Nieuwe training toevoegen',

                ],

                'menu_icon' => 'dashicons-welcome-learn-more',
                'public' => true,
                'supports' => ['title', 'thumbnail'],
                'capability_type' => 'post',

                'rewrite' => [

                    'slug' => 'course',
                    'with_front' => false,
                    'feeds' => false

                ],

                /* Mattijs Wit: Important to disable archives here. There's no need for it now anyway. Otherwise slug conflicts with the page 'huis'. Also see: https://wordpress.stackexchange.com/questions/135146/resolve-a-custom-post-type-name-vs-page-permalink-conflict-same-slug */
                'has_archive' => false,

                'hierarchical' => false,
                'show_in_nav_menus' => false,
                'exclude_from_search' => false
            ]

        );

    }

}

add_action('init', 'my_register_post_type_course');

?>
