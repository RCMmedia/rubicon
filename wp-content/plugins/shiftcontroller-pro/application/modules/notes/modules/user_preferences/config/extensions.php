<?php
$extensions['notes/insert']['user_preferences'] = array(
	'user_preferences/save',
	'',
	array('access_level')
	);

$extensions['notes/insert/defaults'][] = array(
	'user_preferences/get',
	'',
	array('access_level')
	);
?>