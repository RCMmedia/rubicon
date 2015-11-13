<?php
class Note_HC_Model extends MY_model
{
	const LEVEL_EVERYONE = 0;
	const LEVEL_ALL_USERS = 1;
	const LEVEL_OWNER = 2;
	const LEVEL_ADMIN = 3;

	var $table = 'notes';
	var $default_order_by = array('created' => 'DESC');

	var $has_one = array(
		'author' => array(
			'class'			=> 'user',
			'other_field'	=> 'note',
			)
		);

	var $validation = array(
		'content'	=> array('trim', 'required'),
		'author'	=> array('required'),
		);
}