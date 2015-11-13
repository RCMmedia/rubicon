<?php
/* shift notifications */
$config['shift.pickup_pending'][] = create_function( '$object', '
	$messages = HC_App::model("messages");
	$messages->send( "shift.owner.pickup_pending", $object->user, array("shift" => $object) );

/* admins */
	$admins = HC_App::model("user")->get_admins( $object );
	foreach( $admins as $adm ){
		$messages->send( "shift.admin.pickup_pending", $adm, array("shift" => $object) );
	}
	return;
');