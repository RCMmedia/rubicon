<?php
$menubar = HC_Html_Factory::widget('list')
	->add_attr('class', array('list-inline', 'list-separated'))
	;

$can_add = FALSE;
$acl = HC_App::acl();
$test_availability = HC_App::model('availability');
$test_availability->user_id = $user->id;
if( $acl->set_object($test_availability)->can('add') ){
	$can_add = TRUE;
}

if( $can_add ){
	$menubar->add_item(
		'add',
		HC_Html_Factory::widget('titled', 'a')
			->add_attr('href', HC_Lib::link($_calling_parent . '/add'))
			->add_attr('class', array('btn', 'btn-default'))
			->add_child(
				HC_Html::icon('plus')
					->add_attr('class', 'text-success')
				)
			->add_child( HCM::__('Add New Availability') )
		);
}

$out = HC_Html_Factory::widget('list')
	->add_attr('class', 'list-unstyled')
	->add_attr('class', 'list-separated')
	->add_attr('class', 'list-padded')
	->add_attr('class', 'list-bordered')
	;

if( $menubar->items() ){
	$out->add_item( $menubar );
}

foreach( $entries as $e ){
	$availability_view = HC_Html_Factory::widget('availability_view')
		->set_model( $e )
		->set_start_link( $_calling_parent )
		->set_wide( TRUE )
		;

	if( ! $acl->set_object($e)->can('edit') ){
		$availability_view
			->set_nolink(TRUE)
			;
	}

	$out->add_item( $availability_view );
}

if( ! $entries ){
	$out->add_item( HCM::__('Nothing') );
}

echo $out->render();
?>