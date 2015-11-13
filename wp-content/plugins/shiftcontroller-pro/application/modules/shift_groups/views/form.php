<?php
$link = HC_Lib::link('shift_groups/bulk');
$display_form = HC_Html_Factory::widget('form')
	->add_attr('action', $link->url() )
	;
$display_form->add_item( $form->input('action') );

$btn_bar = HC_Html_Factory::widget('list')
	->add_attr('class', 'list-inline')
	->add_attr('class', 'list-separated')
	;

$my_id = 'hc_actions_' . HC_Lib::generate_rand();

if( $act_on_all ){
	$ids_input = $form->input('ids')
		->set_value( join('|', $ids) )
		;

	$display_form->add_item( $ids_input );
	$btn_bar->add_item(
		HC_Html_Factory::widget('titled', 'a')
			->add_attr('href', '#')
			->add_attr('class', array('btn', 'btn-default'))
			->add_attr('class', array('btn-sm'))
			->add_attr('class', 'hc-toggle')
			->add_attr('data-target', '#' . $my_id)
			->add_child( HC_Html::icon('cog') . HCM::__('With All') )
		);
}
else {
	$btn_bar->add_item(
		HC_Html_Factory::widget('titled', 'a')
			->add_attr('href', '#')
			->add_attr('class', array('btn', 'btn-default'))
			->add_attr('class', array('btn-sm'))
			->add_attr('class', 'hc-all-checker')
			->add_attr('data-collect', 'id')
			->add_child( HC_Html::icon('check') . HCM::__('Select All') )
		);
	$btn_bar->add_item(
		HC_Html_Factory::widget('titled', 'a')
			->add_attr('href', '#')
			->add_attr('class', array('btn', 'btn-default'))
			->add_attr('class', array('btn-sm'))
			->add_attr('class', 'hc-toggle')
			->add_attr('data-target', '#' . $my_id)
			->add_child( HC_Html::icon('cog') . HCM::__('With Selected') )
		);
}

/* ACTION OPTIONS */
$shift = HC_App::model('shift');

$actions = HC_Html_Factory::widget('list')
	->add_attr('class', 'list-unstyled')
	->add_attr('class', 'list-separated')
	->add_attr('id', $my_id)
	->add_attr('style', 'display: none;')
	;

/* NEW EDIT */
$edit_actions = HC_Html_Factory::widget('list')
	->add_attr('class', 'list-unstyled')
	->add_attr('class', 'list-separated')
	;

/* NEW EDIT - STATUS */
$edit_actions->add_item(
	HC_Html_Factory::widget('collapse')
		->set_panel('default')
		->add_attr('class', 'input-holder')
		->set_title( HCM::__('Status') )
		->set_content(
			$form->input('status')
				->set_holder(
					HC_Html_Factory::widget('list')
						// ->add_attr('class', array('list-inline'))
						->add_attr('class', array('list-unstyled'))
						->add_attr('class', array('list-separated'))
					)
				->add_option( SHIFT_HC_MODEL::STATUS_DRAFT, $shift->set('status', SHIFT_HC_MODEL::STATUS_DRAFT)->present_status() )
				->add_option( SHIFT_HC_MODEL::STATUS_ACTIVE, $shift->set('status', SHIFT_HC_MODEL::STATUS_ACTIVE)->present_status() )
				->set_default( SHIFT_HC_MODEL::STATUS_DRAFT )
				->add_attr('disabled', 'disabled')
			)
	);

/* NEW EDIT - START TIME */
$edit_actions->add_item(
	HC_Html_Factory::widget('collapse')
		->set_panel('default')
		->add_attr('class', 'input-holder')
		->set_title( HCM::__('Start Time') )
		->set_content(
			$form->input('start')
				->add_attr('disabled', 'disabled')
			)
	);

/* NEW EDIT - END TIME */
$edit_actions->add_item(
	HC_Html_Factory::widget('collapse')
		->set_panel('default')
		->add_attr('class', 'input-holder')
		->set_title( HCM::__('End Time') )
		->set_content(
			$form->input('end')
				->add_attr('disabled', 'disabled')
			)
	);

/* SOME JS TO DISABLE HIDDEN INPUTS */
$fid = $display_form->id();
$addon = array();
$addon[] = '<script language="JavaScript">';
$addon[] = <<<EOT
// jQuery('#$fid').find('.hc-collapse').find('input,textarea,select').prop('disabled', true );

jQuery('#$fid .hc-collapse-next').on('hidden.hc.collapse', function (e)
{
	var this_target = jQuery(this).closest('.hc-collapse-panel').children('.hc-collapse');
	/* disable inputs */
	this_target.find('input,textarea,select').prop('disabled', true );
});

jQuery('#$fid .hc-collapse-next').on('shown.hc.collapse', function (e)
{
	var this_target = jQuery(this).closest('.hc-input-holder').children('.hc-collapse');
	/* enable inputs */
	this_target.find('input,textarea,select').prop('disabled', false);
});

EOT;
$addon[] = '</script>';
$edit_actions->add_item( $addon );

/* ADD NOTE IF POSSIBLE */
$extensions = HC_App::extensions();
$more_content = $extensions->run('shifts/zoom/confirm');

if( $more_content ){
	reset($more_content);
	foreach($more_content as $mc ){
		$edit_actions->add_item(
			HC_Html_Factory::widget('label_row')
				->set_content( $mc )
			);
	}
}

/* SAVE BULK BUTTON */
$edit_actions->add_item(
	HC_Html_Factory::element('input')
		->add_attr('type', 'submit')
		->add_attr('class', array('btn', 'btn-default'))
		->add_attr('title', HCM::__('Save') )
		->add_attr('value', HCM::__('Save') )
	);

$actions->add_item(
	HC_Html_Factory::widget('collapse')
		->set_panel('default')
		->set_title(
			HCM::__('Change')
			)
		->set_content( $edit_actions )
	);

/* DELETE */
$actions->add_item(
	HC_Html_Factory::widget('collapse')
		->set_panel('danger')
		->set_title(
			HCM::__('Delete')
			)
		->set_content( 
			HC_Html_Factory::element('input')
				->add_attr('type', 'submit')
				->add_attr('name', 'delete')
				->add_attr('class', array('btn', 'btn-danger'))
				->add_attr('class', array('hc-confirm'))
				// ->add_attr('class', array('hc-action-setter'))
				->add_attr('title', HCM::__('Delete') )
				->add_attr('value', HCM::__('Delete') )
			)
	);

if( $count > 0 ){
	$display_form->add_item( $btn_bar );
	$display_form->add_item( $actions );
}

if( isset($content) ){
	$display_form->add_item( $content );
}

echo $display_form->render();
?>