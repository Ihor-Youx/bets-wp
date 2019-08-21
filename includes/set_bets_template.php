<?php 

// устанавливаем шаблон для записей Ставки

function load_bets_wp_template( $template ) {

    global $post;


    if ( 'bet' === $post->post_type ) {



        return plugin_dir_path(__FILE__) . 'templates/single-bet.php';

    }



    return $template;

}