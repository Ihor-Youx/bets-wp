<?php
// Удаляние кастомных ролей
function delete_roles_bets() {
	remove_role( 'capper' );
	remove_role( 'moderator_bets' );
}

// Добавление кастомных ролей
function add_roles_bets() {

	$subscriber_role = get_role( 'subscriber' );

	add_role( 'capper', __('Каппер', 'bets-wp'), $subscriber_role->capabilities);

	add_role( 'moderator_bets', __('Модератор ставок', 'bets-wp'), $subscriber_role->capabilities);

	$capper = get_role( 'capper' );
		$capper->add_cap( 'read' );
		$capper->add_cap( 'edit_bets' );
	    $capper->add_cap( 'edit_published_bets' );
	    $capper->add_cap( 'publish_bets' );
	    $capper->add_cap( 'delete_published_bets' );
	    $capper->add_cap( 'assign_type_bets' );
	    $capper->add_cap( 'assign_status_bets' );

	$moderator_bets = get_role( 'moderator_bets' );
		$moderator_bets->add_cap( 'read' );
		$moderator_bets->add_cap( 'read_bet' );
		$moderator_bets->add_cap( 'edit_bet' );
		$moderator_bets->add_cap( 'edit_others_bets' );
		$moderator_bets->add_cap( 'delete_others_bets' );
		$moderator_bets->add_cap( 'delete_bet' );
		$moderator_bets->add_cap( 'edit_bets' );
	    $moderator_bets->add_cap( 'edit_published_bets' );
	    $moderator_bets->add_cap( 'publish_bets' );
	    $moderator_bets->add_cap( 'delete_published_bets' );
	    $moderator_bets->add_cap( 'manage_type_bets' );
	    $moderator_bets->add_cap( 'edit_type_bets' );
	    $moderator_bets->add_cap( 'delete_type_bets' );
	    $moderator_bets->add_cap( 'assign_type_bets' );
	    $moderator_bets->add_cap( 'manage_status_bets' );
	    $moderator_bets->add_cap( 'edit_status_bets' );
	    $moderator_bets->add_cap( 'delete_status_bets' );
	    $moderator_bets->add_cap( 'assign_status_bets' );

	$administrator = get_role( 'administrator' );
		$administrator->add_cap( 'read' );
		$administrator->add_cap( 'read_bets' );
		$administrator->add_cap( 'read_bet' );
		$administrator->add_cap( 'edit_bet' );
		$administrator->add_cap( 'delete_bet' );
		$administrator->add_cap( 'edit_others_bets' );
		$administrator->add_cap( 'delete_others_bets' );
		$administrator->add_cap( 'edit_bets' );
	    $administrator->add_cap( 'edit_published_bets' );
	    $administrator->add_cap( 'publish_bets' );
	    $administrator->add_cap( 'delete_published_bets' );
	    $administrator->add_cap( 'manage_type_bets' );
	    $administrator->add_cap( 'edit_type_bets' );
	    $administrator->add_cap( 'delete_type_bets' );
	    $administrator->add_cap( 'assign_type_bets' );
	    $administrator->add_cap( 'manage_status_bets' );
	    $administrator->add_cap( 'edit_status_bets' );
	    $administrator->add_cap( 'delete_status_bets' );
	    $administrator->add_cap( 'assign_status_bets' );

}