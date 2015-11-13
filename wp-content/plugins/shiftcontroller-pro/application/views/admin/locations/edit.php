<?php
$this->layout->set_partial(
	'header', 
	HC_Html::page_header(
		HC_Html_Factory::element('h2')
			->add_child( $model->present_title() )
		)
	);

$link = HC_Lib::link('admin/locations/update/' . $id);
$display_form = HC_Html_Factory::widget('form')
	->add_attr('action', $link->url() )
	->add_attr('class', 'form-horizontal')
	->add_attr('class', 'form-condensed')
	;

$display_form->add_item(
	HC_Html_Factory::widget('label_row')
		->set_label( 'ID' )
		->set_content( $model->id )
		->set_content_static()
		->set_error( $form->input('name')->error() )
	);

$display_form->add_item(
	HC_Html_Factory::widget('label_row')
		->set_label( HCM::__('Name') )
		->set_content( 
			$form->input('name')
				->add_attr('size', 32)
			)
		->set_error( $form->input('name')->error() )
	);

$display_form->add_item(
	HC_Html_Factory::widget('label_row')
		->set_label( HCM::__('Description') )
		->set_content( 
			$form->input('description')
				->add_attr('cols', 40)
				->add_attr('rows', 3)
			)
		->set_error( $form->input('description')->error() )
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