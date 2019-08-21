<?php 

// Функция создания Ставки

function function_create_bets_wp() {

  $title_bet = htmlspecialchars($_POST['title_bet']);

  $description_bet = htmlspecialchars($_POST['description_bet']);

  $role = $_POST['role'];

  $type_list = $_POST['type_list'];

  $errors_field = array(

    'message' => 'error',

    'text' => '',

    'name' => ''

  );


  if (empty($title_bet)) {

    $errors_field['text'] .= '<p>'. __('Заголовок обязателен', 'bets-wp') .'</p>';

    $errors_field['name'] .= 'title_bet|';

  }

  if (empty($description_bet)) {

    $errors_field['text'] .= '<p>'. __('Описание обязательно', 'bets-wp') .'</p>';

    $errors_field['name'] .= 'description_bet';

  }

  if ($errors_field['text'] != '') {

    echo json_encode($errors_field);

    wp_die();

  } else {

   

  		$bet_data = array(

			'post_title'    => $title_bet,

			'post_content'  => $description_bet,

			'post_type' 	=> 'bet',

			'post_status'   => 'publish',

			'post_author'   => $role,

			'tax_input'		=> array( 'type_bets' => array( $type_list ) )

		);



		$bet_id = wp_insert_post( wp_slash($bet_data) );



		if( is_wp_error($bet_id) ){

			echo json_encode($bet_id->get_error_message());

			wp_die();

		} else {

			echo json_encode('<p>'. __('Ваша ставка успешно создана - ', 'bets-wp') . '<a href="'. get_permalink($bet_id) .'">'. __('ссылка', 'bets-wp') .'</a>.');

			wp_die();

		}



      }

}





// запись в мета поле _bet_vote

function function_set_bet_vote() {

  $bet_vote = (int) htmlspecialchars($_POST['bet_vote']);

  $bet_id = htmlspecialchars($_POST['bet_id']);

  $errors_field = array(

    'message' => 'error',

    'text' => '',

    'name' => ''

  );

  $test_bet_vote = (100 <= $bet_vote) && ($bet_vote <= 1000);

  if (!$test_bet_vote) {

    $errors_field['text'] .= '<p>'. __('Значение некорректно, должно быть числовое значение в диапазоне от 100 до 1000', 'bets-wp') .'</p>';

    $errors_field['name'] .= 'bet_vote';

  }

  if ($errors_field['text'] != '') {

    echo json_encode($errors_field);

    wp_die();

  } else {

     		

  	update_post_meta( $bet_id, '_bet_vote', $bet_vote );



  	echo json_encode(__('Значение успешно записано', 'bets-wp'));

    wp_die();



      }

}