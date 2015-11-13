<?php
$config['availability:conflict_if_in_unavailable'] = array(
	'default' 	=> 1,
	'label'		=> HCM::__('Alert If Shift In Unavailable Time'),
	'type'		=> 'checkbox',
	);

$config['availability:conflict_if_not_preferred'] = array(
	'default' 	=> 0,
	'label'		=> HCM::__('Alert If Shift Not Within Preferred Time'),
	'type'		=> 'checkbox',
	);
