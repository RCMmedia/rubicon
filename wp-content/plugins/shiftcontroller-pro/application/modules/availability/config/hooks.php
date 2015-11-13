<?php
$hook['post_controller_constructor'][] = create_function( '', '
	$conflict_manager = HC_App::model("conflict_manager");

	$app_conf = HC_App::app_conf();
	if( $app_conf->get("availability:conflict_if_in_unavailable") ){
		$conflict_manager->add_type( 
			"availability_unavailable",
			HC_App::model("conflict_availability_unavailable")
			);
	}

	if( $app_conf->get("availability:conflict_if_not_preferred") ){
		$conflict_manager->add_type( 
			"availability_preferred",
			HC_App::model("conflict_availability_preferred")
			);
	}
');