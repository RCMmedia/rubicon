<?php
$link = HC_Lib::link('shifts/add/insert-time');
$test_shift = HC_App::model('shift');

$display_form = HC_Html_Factory::widget('form')
	->add_attr('action', $link->url($params->to_array()) )
	// ->add_attr('class', 'form-horizontal')
	->add_attr('class', 'form-condensed')
	->add_attr('class', 'form-small-labels')
	;

/* time labels with shift templates */
$templates_label = '';
if( count($shift_templates) && ($params->get('type') == $test_shift->_const('TYPE_SHIFT'))){
	$templates_label = HC_Html_Factory::widget('dropdown');
	$templates_label->set_wrap();
	$templates_label->set_no_caret(FALSE);

	$templates_label->set_title( 
		HC_Html_Factory::element('a')
			->add_child( HC_Html::icon('clock-o') )
			->add_attr( 'title', HCM::__('Shift Templates') )
			->add_attr('class', array('btn', 'btn-default'))
		);

	$t = HC_Lib::time();
	foreach( $shift_templates as $sht ){
		$end = ($sht->end > 24*60*60) ? ($sht->end - 24*60*60) : $sht->end;
		$templates_label->add_item( 
			HC_Html_Factory::element('a')
				->add_attr('class', 'hc-shift-templates')
				->add_attr('href', '#')
				->add_attr('data-start', $sht->start)
				->add_attr('data-end', $end)

				->add_attr('data-start-display', $t->formatTimeOfDay($sht->start))
				->add_attr('data-end-display', $t->formatTimeOfDay($sht->end))

				->add_child( $sht->name )
				->add_child( '<br/>' )
				->add_child( $t->formatPeriodOfDay($sht->start, $sht->end) )
			);
	}
}

if( $templates_label ){
	$time_input = HC_Html_Factory::widget('list')
		->add_attr('class', 'list-unstyled')
		->add_attr('class', 'list-inline')
		->add_item( 'item', $form->input('time') )
		->add_item_attr( 'item', 'style', 'vertical-align: top;' )
		->add_item( 'label', $templates_label )
		->add_item_attr( 'label', 'style', 'margin-left: 1em; vertical-align: top;' )
		;
}
else {
	$time_input = $form->input('time');
}

if( count($locations) ){
	$location_input = $form->input('location');
	$location_options = array();
	$location_options[0] = ' - ' . HCM::__('Please Select') . ' - ';
	foreach( $locations as $loc ){
		$location_options[ $loc->id ] = $loc->present_title( HC_PRESENTER::VIEW_RAW );
	}
	$location_input->set_options( $location_options );

	$display_form->add_item(
		HC_Html_Factory::widget('label_row')
			->set_label( HCM::__('Location') )
			->set_content( $location_input )
			->set_error( $form->input('location')->error() )
		);
}

$display_form->add_item(
	HC_Html_Factory::widget('label_row')
		->set_label( HCM::__('Time') )
		->set_content( $time_input )
		->set_error( $form->input('time')->error() )
	);

$display_form->add_item(
	HC_Html_Factory::widget('label_row')
		->set_label( HCM::__('Date') )
		->set_content( $form->input('date') )
		->set_error( $form->input('date')->error() )
	);


$buttons = HC_Html_Factory::widget('list')
	->add_attr('class', array('list-inline', 'list-separated') )
	;
$buttons->add_item(
	HC_Html_Factory::element('input')
		->add_attr('type', 'submit')
		->add_attr('class', array('btn', 'btn-default'))
		->add_attr('title', HCM::__('OK') )
		->add_attr('value', HCM::__('OK') )
	);
$display_form->add_item(
	HC_Html_Factory::widget('label_row')
		->set_content( $buttons )
	);

$out = HC_Html_Factory::widget('list')
	->add_attr('class', array('list-unstyled', 'list-separated'))
	;
/* 
$out->add_item(
	HC_Html_Factory::element('h3')
		->add_child( HCM::__('Date and Time') )
	);
$out->add_divider();
 */
$out->add_item( $display_form );

echo $out->render();
?>