<?php 

function load_style_script_bets_wp(){

    wp_enqueue_style( 'bets_wp-css', plugins_url('bets-wp/') . 'css/style.css' );


    /*-------------------------------------------------*/

    wp_enqueue_script( 'bets_wp-cookie', 'https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js', array('jquery'), '2.5.5', true);

	wp_enqueue_script( 'bets_wp-form', plugins_url('bets-wp/') . 'js/scripts.js', array('jquery'), '2.5.5', true);


    wp_localize_script('jquery', 'bets_wp_ajax',

        array( 

            'url' => admin_url('admin-ajax.php'),

        )

    );



    

}