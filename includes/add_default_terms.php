<?php

// Функция добавления терминов по умолчанию
function add_terms_for_taxonomy_bets () {

	$terms_type_bets = array(

		array(

			__('Ординар', 'bets-wp'),

			'ordinar'

			),

		array(

			__('Экспресс', 'bets-wp'),

			'ekspress'

			)

		);







	$terms_status_bets = array(

		array(

			__('Выигрыш', 'bets-wp'),

			'vyiigryish'

			),

		array(

			__('Проигрыш', 'bets-wp'),

			'proigryish'

			),

		array(

			__('Возврат', 'bets-wp'),

			'vozvrat'

			),

		array(

			__('Активная', 'bets-wp'),

			'aktivnaya'

			),

		);





	foreach ($terms_type_bets as $term_type_bets) {

		wp_insert_term(

		$term_type_bets[0],

		'type_bets',

		array(

			'slug' => $term_type_bets[1]

			)

		);

	}



	foreach ($terms_status_bets as $term_status_bets) {

		wp_insert_term(

		$term_status_bets[0],

		'status_bets',

		array(

			'slug' => $term_status_bets[1]

			)

		);

	}





}