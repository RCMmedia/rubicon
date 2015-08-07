<?php
class Note_Model extends MY_model
{
	var $table = 'notes';
	var $default_order_by = array('created' => 'DESC');

	var $has_one = array(
		'author' => array(
			'class'			=> 'user_model',
			'other_field'	=> 'note',
			)
		);

	var $validation = array(
		'content'	=> array(
			'label'	=> 'lang:note_content',
			'rules'	=> array('trim', 'required'),
			),
		'author'	=> array(
			'label'	=> 'lang:user',
			'rules'	=> array('required'),
			),
		);

	var $my_fields = array(
		array(
			'name'		=> 'content',
			'label'		=> 'lang:note_content',
			'type'		=> 'textarea',
			'rows'		=> 3,
			),
		);
}