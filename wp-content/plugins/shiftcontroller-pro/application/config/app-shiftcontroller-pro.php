<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['hc_product'] = 'sfc';

/* base stuff */
$config['nts_app_title'] = 'ShiftController Pro';
$config['nts_app_url'] = 'http://www.shiftcontroller.com';

$config['nts_track_setup'] = '16:2';

$config['modules'] = array(
//	'license',
	'conf',
	'wordpress',
	'wall',
	'notes'	=> array(
		'relations'	=> array(
			'timeoff_id',
			'shift_id'
			),
		),
	'shift_groups',
	'shift_trades',
//	'loginlog',
	'logaudit',
	);
