<?php
$object = clone $object;
$display_form = HC_Html_Factory::widget('form')
	->add_attr('action', HC_Lib::link('release/edit/update/' . $object->id) )
	// ->add_attr('class', 'form-horizontal')
	->add_attr('class', 'form-condensed')
	;

/* BUTTONS */
$buttons = HC_Html_Factory::widget('list')
	->add_attr('class', array('list-inline', 'list-separated') )
	;

if( $object->release_request ){
	$save_btn_title = HCM::__('Save');
}
else {
	$save_btn_title = HCM::__('Release Shift');
}

$buttons->add_item(
	HC_Html_Factory::element('input')
		->add_attr('type', 'submit')
		->add_attr('class', array('btn', 'btn-default'))
		->add_attr('title', $save_btn_title )
		->add_attr('value', $save_btn_title )
	);

/* STATUS */
if( $object->release_request ){
	$display_form
		->add_item(
			HC_Html_Factory::widget('label_row')
				->set_content( 
					$form->input('action')
						->set_default( 1 )
						->set_inline( TRUE )
						->add_option( 1, 
							HC_Html_Factory::element('span')
								->add_attr('class', 'label')
								->add_attr('class', 'label-success')
								->add_child(HCM::__('Approve'))
							)
						->add_option( 0,
							HC_Html_Factory::element('span')
								->add_attr('class', 'label')
								->add_attr('class', 'label-danger')
								->add_child(HCM::__('Reject'))
							)
					)
				->set_error( $form->input('action')->error() )
			)
		;
}

/* ADD NOTE IF POSSIBLE */
$extensions = HC_App::extensions();
$more_content = $extensions->run('shifts/zoom/confirm');
if( $more_content ){
	foreach($more_content as $mc ){
		$display_form->add_item(
			HC_Html_Factory::widget('label_row')
				->set_content( $mc )
			);
	}
}

$display_form
	->add_item(
		HC_Html_Factory::widget('label_row')
			->set_content( $buttons )
	);

echo $display_form->render();
?>