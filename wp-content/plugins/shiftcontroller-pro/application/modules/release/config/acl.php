<?php
$acl['shift::release'] = create_function( '$u, $o', '
/* not passed yet */
	$t = HC_Lib::time();
	$today = $t
		->setNow()
		->formatDate_Db()
		;

	if( $today > $o->date ){
		return;
	}

	$app_conf = HC_App::app_conf();
	$can = $app_conf->get("release:allowed");
	if( ! $can ){
		return;
	}

	if( ! $o->user_id ){
		return;
	}

	/* can only release own shifts */
	if( $o->user_id != $u->id ){
		return;
	}

	return TRUE;
');
