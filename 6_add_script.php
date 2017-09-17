<?php
//вставка скриптов во фронтэнде
function true_include_myscript() {
    wp_enqueue_script( 'myscript', get_stylesheet_directory_uri() . '/script.js', '', '3.0', false );
}
add_action( 'wp_enqueue_scripts', 'true_include_myscript' );

//==================================================================================================

//вставка скриптов во фронтэнде, но только с зависимостью от jQuery:
function true_include_myscript_dep_jquery() {
    wp_enqueue_script( 'myscript', get_stylesheet_directory_uri() . '/script.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts', 'true_include_myscript_dep_jquery' );

//==================================================================================================

//подключение уже зарегистрированнного ранее jQuery:

function true_include_jquery() {
    wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'true_include_jquery' );

//==================================================================================================

//Пример подключения в админке
function true_include_in_admin() {
    wp_enqueue_script( 'jquery' );
}

add_action( 'admin_enqueue_scripts', 'true_include_in_admin' );