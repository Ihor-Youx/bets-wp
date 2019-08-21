<?php

// Шаблон типа записи Ставки
get_header();

		global $post;
		// проверяем куки
		$bets_id_array = json_decode(stripslashes($_COOKIE["_bet_vote"]), true);

		if(isset($bets_id_array)){

			//проверяем, отправлял ли пользователь значение с этого поста

			if(in_array($post->ID, $bets_id_array)) {

				$bets_vote_sended = true;

			} else {

				$bets_vote_sended = false;

			}





		} else { 

		    $bets_vote_sended = false;

		}



		if ( have_posts() ) {

			while ( have_posts() ) {

				the_post();

				$current_id = get_the_ID();

				?>

				<div class="wrapper single_bet_wp">

					<h1><?php the_title(); ?></h1>



					<h3><?php _e('Описание', 'bets-wp') ?></h3>

					<p><?php the_content(); ?></p>





					<?php

					// выводим тип ставки

					$type_terms = get_the_terms( $current_id, 'type_bets' );

					if( is_array( $type_terms ) ){

					 ?>

					<h3><?php _e('Тип ставки', 'bets-wp') ?></h3>



					<?php foreach($type_terms as $type_term) { ?>

					<p><?php echo $type_term->name; ?></p>

					<?php } ?>



					<?php } ?>





					<?php

					// выводим статус ставки

					$status_terms = get_the_terms( $current_id, 'status_bets' );

					if( is_array( $status_terms ) ){

					 ?>

					<h3><?php _e('Статус ставки', 'bets-wp') ?></h3>



					<?php foreach($status_terms as $status_term) { ?>

					<p><?php echo $status_term->name; ?></p>

					<?php } ?>



					<?php } ?>



					<?php if($bets_vote_sended) { ?>

					<p><?php _e('Последнее введенное значение для ставки', 'bets-wp'); ?></p>

					<p><?php echo get_post_meta( $current_id, '_bet_vote', true );  ?></p>

					<?php } ?>



					<form id="set_bet_vote">

						<input type="number" min="100" max="1000" name="bet_vote">

						<input type="text" name="bet_id" value="<?php echo $current_id; ?>" hidden>

						<input type="submit" value="<?php _e('Ставка пройдет!', 'bets-wp'); ?>" <?php if($bets_vote_sended) { echo 'disabled'; } ?> >

						<div id="response_bets_vote_wp"></div>

					</form>



				</div>

				<?php



			}



		} else {



		_e('Контента нет', 'bets-wp');



		}





get_footer(); ?>