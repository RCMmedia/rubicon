<?php
$acl['shift::pickup'] = create_function( '$u, $o', '
/* not passed yet */
	$t = HC_Lib::time();
	$today = $t
		->setNow()
		->formatDate_Db()
		;

	if( $today > $o->date ){
		return FALSE;
	}

	$app_conf = HC_App::app_conf();
	$can_pickup = $app_conf->get("pickup:allowed");
	if( ! $can_pickup ){
		return;
	}

	if( $o->user_id ){
		return;
	}

	return TRUE;
');
