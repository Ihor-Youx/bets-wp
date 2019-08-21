<?php

// функция создания типа записи Ставки
function register_bets_post_type() {
    $labels = array(
        'name' => __('Ставки', 'bets-wp'),
        'singular_name' => __('Ставка', 'bets-wp'),
        'add_new' => __('Добавить ставку', 'bets-wp'),
        'add_new_item' => __('Добавить новую ставку', 'bets-wp'),
        'edit_item' => __('Редактировать', 'bets-wp'),
        'new_item' => __('Новая ставка', 'bets-wp'),
        'all_items' => __('Все ставки', 'bets-wp'),
        'view_item' => __('Просмотр ставки на сайте', 'bets-wp'),
        'search_items' => __('Искать ставку', 'bets-wp'),
        'not_found' =>  __('Ставка не найдена', 'bets-wp'),
        'not_found_in_trash' => __('В корзине ничего нет', 'bets-wp'),
        'menu_name' => __('Ставки', 'bets-wp')
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'menu_position' => 20,
        'supports' => array( 'title', 'editor', 'comments', 'thumbnail'),
        'capability_type' => array('bet', 'bets'),
        'map_meta_cap' => true
    );
    register_post_type('bet', $args);
}


// функция создания таксономии Тип ставки для типа записи Ставки
function register_type_bets_taxonomy() {
 
  $labels = array(
    'name' => __('Типы ставки', 'bets-wp'),
    'singular_name' => __('Тип ставки', 'bets-wp'),
    'search_items' =>  __('Искать', 'bets-wp'),
    'all_items' => __('Все типы ставки', 'bets-wp'),
    'edit_item' => __('Редактировать', 'bets-wp'), 
    'update_item' => __('Обновить', 'bets-wp'),
    'add_new_item' => __('Добавить', 'bets-wp'),
    'new_item_name' => __('Новое имя', 'bets-wp'),
    'menu_name' => __('Типы ставки', 'bets-wp')
  );    
 
  register_taxonomy('type_bets',array('bet'), array(
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'capabilities' => array(
        'manage_terms' => 'manage_type_bets',
        'edit_terms' => 'edit_type_bets',
        'delete_terms' => 'delete_type_bets',
        'assign_terms' => 'assign_type_bets',
        )
  ));
}


// функция создания таксономии Статус ставки для типа записи Ставки
function register_status_bets_taxonomy() {
 
  $labels = array(
    'name' => __('Статусы ставки', 'bets-wp'),
    'singular_name' => __('Статус ставки', 'bets-wp'),
    'search_items' =>  __('Искать', 'bets-wp'),
    'all_items' => __('Все статусы ставок', 'bets-wp'),
    'edit_item' => __('Редактировать', 'bets-wp'), 
    'update_item' => __('Обновить', 'bets-wp'),
    'add_new_item' => __('Добавить', 'bets-wp'),
    'new_item_name' => __('Новое имя', 'bets-wp'),
    'menu_name' => __('Статусы ставки', 'bets-wp')
  );    
 
  register_taxonomy('status_bets',array('bet'), array(
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'capabilities' => array(
        'manage_terms' => 'manage_status_bets',
        'edit_terms' => 'edit_status_bets',
        'delete_terms' => 'delete_status_bets',
        'assign_terms' => 'assign_status_bets',
        )
  ));
}