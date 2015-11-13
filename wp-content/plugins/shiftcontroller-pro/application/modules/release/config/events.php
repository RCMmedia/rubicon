<?php
$config['shift.after_save'][] = create_function( '$object', '
	$changes = $object->get_changes();
	if( ! $changes ){
		return;
	}

	if( $object->type == $object->_const("TYPE_TIMEOFF") ){
		return;
	}

	if( array_key_exists("id", $changes) ){
		return;
	}

	/* notification to staff on pending release */
	if(
		array_key_exists("release_request", $changes)
		&&
		$object->release_request 
		&&
		$object->user_id
		&&
		( $object->status == $object->_const("STATUS_ACTIVE") )
		){
		$object->trigger_event("release_pending");
		return;
	}

	if(
		array_key_exists("release_request", $changes)
		&&
		(! $object->release_request)
		&&
		( ! array_key_exists("user_id", $changes) )
		&&
		( $object->status == $object->_const("STATUS_ACTIVE") )
		){
		$object->trigger_event("release_rejected");
		return;
	}
');