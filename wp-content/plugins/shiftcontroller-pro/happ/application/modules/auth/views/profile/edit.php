<?php
$app_conf = HC_App::app_conf();
$login_with = $app_conf->get('login_with');

$display_form = HC_Html_Factory::widget('form')
	->add_attr('action', HC_Lib::link('auth/profile/update') )
	->add_attr('class', 'form-horizontal')
	->add_attr('class', 'form-condensed')
	;

if( $login_with == 'username' ){
	$display_form->add_item(
		HC_Html_Factory::widget('label_row')
			->set_label( HCM::__('Username') )
			->set_content( $object->username )
			->set_content_static()
		);
}

$display_form->add_item(
	HC_Html_Factory::widget('label_row')
		->set_label( HCM::__('Email') )
		->set_content( 
			$form->input('email')
				->add_attr('size', 24)
			)
		->set_error( $form->input('email')->error() )
	);

$buttons = HC_Html_Factory::widget('list')
	->add_attr('class', array('list-inline', 'list-separated') )
	;
$buttons->add_item(
	HC_Html_Factory::element('input')
		->add_attr('type', 'submit')
		->add_attr('class', array('btn', 'btn-default'))
		->add_attr('title', HCM::__('Save') )
		->add_attr('value', HCM::__('Save') )
	);
$display_form->add_item(
	HC_Html_Factory::widget('label_row')
		->set_content( $buttons )
	);

echo $display_form->render();
?>