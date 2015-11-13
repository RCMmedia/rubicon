<?php
$config['pickup:allowed'] = array(
	'default' 	=> 1,
	'label'		=> HCM::__('Staff Can Pick Up Open Shifts'),
	'type'		=> 'checkbox',
	);

$config['pickup:approval_required'] = array(
	'default' 	=> 1,
	'label'		=> HCM::__('Admin Approval Required'),
	'type'		=> 'checkbox',
	);
