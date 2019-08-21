<?php 

// Шоткод формы добавления ставки
function form_add_bet( $atts ){
	if( is_user_logged_in() ){
	$form = '
	<form id="add_bet_wp">
	<input type="text" name="title_bet" placeholder="'. __('Заголовок', 'bets-wp') .'" />
	<textarea name="description_bet" placeholder="'. __('Описание', 'bets-wp') .'"></textarea>
	<input type="text" name="role" value="'. get_current_user_id() .'" hidden />';

	$terms_type_bets = get_terms(array(
		'taxonomy' => 'type_bets',
		"hide_empty" => false
		)
		);
	if( $terms_type_bets && ! is_wp_error($terms_type_bets) ){
		$form .= '
		<h3>'. __('Тип ставки', 'bets-wp') .'</h3>
		<select name="type_list">';
		foreach ($terms_type_bets as $term_type_bets) {
			
			$form .= '<option value="'. $term_type_bets->slug .'">'. $term_type_bets->name .'</option>';

		}
		$form .= '</select>';
	}

	$form .= '
	<input type="submit" value="'. __('Отправить', 'bets-wp') .'" />
	</form>
	<div id="response_bets_wp"></div>';

	return $form;

	} else {
		return __('Вы должны авторизоваться, чтобы создать ставку!', 'bets-wp');
	}
}