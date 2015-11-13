<?php
$display_form = HC_Html_Factory::widget('form')
	->add_attr('action', HC_Lib::link($_calling_parent . '/insert') )
	->add_attr('class', 'form-horizontal')
	->add_attr('class', 'form-condensed')
	// ->add_attr('class', 'form-small-labels')
	;

/* BUTTONS */
$buttons = HC_Html_Factory::widget('list')
	->add_attr('class', array('list-inline', 'list-separated') )
	;

$buttons->add_item(
	HC_Html_Factory::element('input')
		->add_attr('type', 'submit')
		->add_attr('class', array('btn'))
		->add_attr('class', array('btn-success'))
		->add_attr('title', HCM::__('Add New Availability') )
		->add_attr('value', HCM::__('Add New Availability') )
	);

$display_form->add_item( $form->input('user') );
$temp_model = HC_App::model('availability');

$display_form
	->add_item(
		HC_Html_Factory::widget('label_row')
			->set_label( HCM::__('Availability Type') )
			->set_content( 
				$form->input('type')
					->set_inline(TRUE)
					->add_option( 
						$temp_model->_const('TYPE_UNAVAILABLE'),
						$temp_model->set('type', $temp_model->_const('TYPE_UNAVAILABLE'))->present_type()
						)
					->add_option( 
						$temp_model->_const('TYPE_PREFERRED'),
						$temp_model->set('type', $temp_model->_const('TYPE_PREFERRED'))->present_type()
						)
				)
			->set_error( $form->input('type')->error() )
		)
	;

$display_form
	->add_item(
		HC_Html_Factory::widget('label_row')
			->set_label( HCM::__('Time') )
			->set_content( $form->input('time') )
			->set_error( $form->input('time')->error() )
		)
	;

$display_form
	->add_item(
		HC_Html_Factory::widget('label_row')
			->set_label( HCM::__('Date') )
			->set_content( $form->input('date') )
			->set_error( $form->input('date')->error() )
		)
	;

$display_form
	->add_item(
		HC_Html_Factory::widget('label_row')
			->set_content( $buttons )
			->add_attr('class', 'padded2')
			->add_attr('style', 'border-top: #eee 1px solid; margin-top: 1em;')
	);

echo $display_form->render();
?>