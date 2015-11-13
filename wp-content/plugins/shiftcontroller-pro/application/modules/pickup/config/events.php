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

	/* trigger notification to staff on pending pickup */
	if( 
		array_key_exists("user_id", $changes)
		&&
		$object->user_id
		&&
		array_key_exists("status", $changes)
		&&
		( $object->status == $object->_const("STATUS_DRAFT") )
		){
		$object->trigger_event("pickup_pending");
		return;
	}
');