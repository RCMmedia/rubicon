<?php
$this_buttons = HC_Html_Factory::widget('list')
	->add_attr('class', array('list-unstyled') )
	->add_attr('class', array('list-separated') )
	;

if( $object->release_request ){
	$this_buttons->add_item(
		HCM::__('Your manager will review your request and approve or deny it. Until approval, you are still responsible for the shift.')
	);
}
else {
	$app_conf = HC_App::app_conf();
	// if( $app_conf->get('release:approval_required') ){
		// $this_buttons->add_item(
			// HCM::__('Your manager will review your request and approve or deny it. Until approval, you are still responsible for the shift.')
		// );
	// }

	$this_buttons->add_item(
		HC_Html_Factory::widget('titled', 'a')
			->add_attr('class', array('btn', 'btn-default'))
			->add_child( HCM::__('Click Here To Release The Shift') )
			->add_attr('href', HC_Lib::link('release/edit/insert/' . $object->id))
		);
}

echo $this_buttons->render();
?>