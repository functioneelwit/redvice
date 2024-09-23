<?php

function my_register_post_type_client()
{

    if (function_exists('register_post_type'))
    {

        register_post_type(

            'client',

            [

                'labels' => [

                    'name'                   => 'Klanten',
                    'singular_name'          => 'Klant',
                    'all_items'              => 'Alle klanten',
                    'add_new'                => 'Nieuwe klant toevoegen',

                ],

                'menu_icon' => 'dashicons-businessman',
                'public' => true,
                'supports' => ['title', 'thumbnail'],
                'capability_type' => 'post',

                'rewrite' => [

                    'slug' => 'client',
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

add_action('init', 'my_register_post_type_client');

?>
