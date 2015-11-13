<?php
$config['release:allowed'] = array(
	'default' 	=> 1,
	'label'		=> HCM::__('Staff Can Release Shifts'),
	'type'		=> 'checkbox',
	);

$config['release:approval_required'] = array(
	'default' 	=> 1,
	'label'		=> HCM::__('Admin Approval Required'),
	'type'		=> 'checkbox',
	);
