<?php 

include_once('_database.php');

define('PHP', dirname( __FILE__ ) . '/php/');
define('CSS', '/css/');
define('IMG', '/img/');
define('LIB', '/lib/');
define('CSS_COMMON', CSS . 'common.css');
define('IMG_THUMB' , IMG . 'thumbnail/');

$rules = [ 
    'home'      => "/home"
];

$uri = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
$uri = '/' . trim(str_replace( $uri, '', $_SERVER['REQUEST_URI'] ), '/');
$uri = urldecode($uri);

foreach ($rules as $rule) {
    if (preg_match('~^' . $rule . '$~i', $uri)) {
        include(PHP . $rule . '.php');
        exit();
    }
}
include( PHP . 'home.php' );

?>