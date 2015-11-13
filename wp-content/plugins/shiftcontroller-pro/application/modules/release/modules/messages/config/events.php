<?php
/* shift notifications */
$config['shift.release_pending'][] = create_function( '$object', '
	$messages = HC_App::model("messages");
	$messages->send( "shift.owner.release_pending", $object->user, array("shift" => $object) );

/* admins */
	$admins = HC_App::model("user")->get_admins( $object );
	foreach( $admins as $adm ){
		$messages->send( "shift.admin.release_pending", $adm, array("shift" => $object) );
	}
	return;
');

$config['shift.release_rejected'][] = create_function( '$object', '
	$messages = HC_App::model("messages");
	$messages->send( "shift.owner.release_rejected", $object->user, array("shift" => $object) );

	return;
');
