<?php
function dashboard_redirect(){
    wp_redirect(admin_url('edit.php?post_type=page'));
}
add_action('load-index.php','dashboard_redirect');

function login_redirect( $redirect_to, $request, $user ){
    return admin_url('edit.php?post_type=page');
}
add_filter('login_redirect','login_redirect',10,3);