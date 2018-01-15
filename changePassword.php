<?php

require( dirname(__FILE__) . '/wp-load.php' );
$user_id = 1;
$password = 'newPass#';
wp_set_password( $password, $user_id );
?>