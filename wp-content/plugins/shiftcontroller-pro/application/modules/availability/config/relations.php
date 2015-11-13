<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['user']['has_many']['availability'] = array(
	'class'			=> 'availability',
	'other_field'	=> 'user',
	);
