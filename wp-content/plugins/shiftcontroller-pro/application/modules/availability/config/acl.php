<?php
$acl['availability::view'] = create_function( '$u, $o', '
	if( $o->user_id == $u->id ){
		return TRUE;
	}
');