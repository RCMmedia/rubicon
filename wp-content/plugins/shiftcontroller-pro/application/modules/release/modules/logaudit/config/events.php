<?php
$config['shift.after_save'][] = create_function( '$object', '
	$logaudit = HC_App::model("logaudit");
	$logaudit->log( $object, array("release_request") );
');
