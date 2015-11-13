<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['hc_product'] = 'sfc';

/* base stuff */
$config['nts_app_title'] = 'ShiftController Pro';
$config['nts_app_url'] = 'http://www.shiftcontroller.com';

$config['nts_track_setup'] = '16:2';

$config['modules'] = array(
	'auth',
//	'license',
	'conf',
	'wordpress',
	'wall',
	'conflicts',
	'shift_groups',
	// 'trades',
	'notes'	=> array(
		'relations'	=> array(
			'shift_id'
			),
		),
//	'loginlog',
	'logaudit',
	'release',
	'pickup',
	'availability',

	'messages',
//	'notifications_db',
	'notifications_email',
	'user_preferences',
	);
