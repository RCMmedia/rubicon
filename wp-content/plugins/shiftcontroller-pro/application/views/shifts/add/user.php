<?php
$extensions = HC_App::extensions();
$link = HC_Lib::link('shifts/add/insert-user');

$display_form = HC_Html_Factory::widget('form')
	->add_attr('action', $link->url($params->to_array()) )
	->add_attr('class', 'form-condensed')
	->add_attr('class', 'form-small-labels')
	;

$display_form_open = HC_Html_Factory::widget('form')
	->add_attr('action', $link->url($params->to_array()) )
	->add_attr('class', 'form-condensed')
	->add_attr('class', 'form-small-labels')
	;

$out = HC_Html_Factory::widget('list')
	->add_attr('class', array('list-unstyled', 'list-separated'))
	;
$out->add_item(
	HC_Html_Factory::element('h3')
		->add_child( HCM::__('Staff') )
	);
$out->add_divider();

if( $params->get('type') != SHIFT_HC_MODEL::TYPE_TIMEOFF ){
	$add_params = $params->to_array();
	$add_params['user+'] = 0;

	$item = HC_Html_Factory::element('div')
		->add_attr('class', 'display-block')
		->add_attr('class', 'alert')
		// ->add_attr('class', 'alert-info-o')
		->add_attr('class', 'alert-default-o')
		// ->add_attr('class', 'alert-condensed')
		;

	$item_view = HC_Html_Factory::widget('list')
		->add_attr('class', 'list-inline')
		->add_attr('class', 'list-separated')
		;

	$item_view->add_item( HCM::__('Select Later') );

	$open_options = array();
	for( $ii = 1; $ii <= 10; $ii++ ){
		$open_options[$ii] = $ii;
	}
	$item_view->add_item(
		$form_open
			->input('open')
			->set_options( $open_options )
		);

	$buttons = HC_Html_Factory::widget('list')
		->add_attr('class', array('list-inline', 'list-separated') )
		;
	$buttons->add_item(
		HC_Html_Factory::element('input')
			->add_attr('type', 'submit')
			->add_attr('class', array('btn', 'btn-default'))
			->add_attr('title', HCM::__('Create Open Shifts') )
			->add_attr('value', HCM::__('Create Open Shifts') )
		);

	$item_view->add_item( $buttons );

	$display_form_open->add_item( $item_view );
	$item->add_child( $display_form_open );

	$out->add_item( $item );
}


$out2 = HC_Html_Factory::widget('tiles')
	->set_per_row(2)
	;

if( ! $free_staff ){
	$out->add_item(
		HC_Html_Factory::element('span')
			->add_attr('class', 'display-block')
			->add_attr('class', 'alert')
			->add_attr('class', 'alert-danger-o')
			->add_attr('title', HCM::__('No staff available for this shift') )
			->add_child( 
				HC_Html::icon('exclamation-circle') . HCM::__('No staff available for this shift')
				)
		);
}
else {
	reset( $free_staff );
	foreach( $free_staff as $st ){
		$add_params = $params->to_array();
		$add_params['user+'] = $st->id;

		$main = HC_Html_Factory::element('a')
			->add_attr('href', $link->url($add_params))
			->add_attr('title', HCM::__('Assign Staff') )
			->add_attr('class', 'hc-action')
			// ->add_attr('class', array('btn', 'btn-default'))
			->add_child( $st->present_title() )
			;

		$main = HC_Html_Factory::widget('list')
			->add_attr('class', 'list-inline')
			->add_attr('style', 'vertical-align: top;')
			;
		$main->add_item( 
			'checkbox',
			$form->input('user')
				->add_option( $st->id, $st->present_title() )
				->render_one( $st->id )
			);

		$item = HC_Html_Factory::element('div')
			->add_attr('class', 'display-block')
			->add_attr('class', 'alert')
			->add_attr('class', 'alert-default-o')
			// ->add_attr('class', 'alert-condensed')
			;

		$item->add_child( $main );

	/* EXTENSIONS SUCH AS CONFLICTS */
		for( $mi = 0; $mi < count($models); $mi++ ){
			$models[$mi]->user_id = $st->id;
		}

		$more_content = $extensions->run('shifts/assign/quickview', $models);
		if( $more_content ){
			$more_wrap = HC_Html_Factory::widget('list')
				->add_attr('class', 'list-unstyled')
				->add_attr('class', 'list-separated')
				->add_attr('class', 'text-small')
				->add_attr('style', 'margin-top: 0.5em;')
				;
			$added = 0;
			foreach($more_content as $mck => $mc ){
				$more_wrap->add_item($mc);
				$added++;
			}
			if( $added ){
				$item->add_child( $more_wrap );
			}
		}

		$out2->add_item( $item );
	}
}

$display_form->add_item( $out2 );

$buttons = HC_Html_Factory::widget('list')
	->add_attr('class', array('list-inline', 'list-separated') )
	;

if( $free_staff ){
	$buttons->add_item(
		HC_Html_Factory::element('input')
			->add_attr('type', 'submit')
			->add_attr('class', array('btn', 'btn-default'))
			->add_attr('title', HCM::__('Assign Selected Staff') )
			->add_attr('value', HCM::__('Assign Selected Staff') )
		);
}
else {
	$buttons->add_item(
		HC_Html_Factory::widget('titled', 'a')
			->add_attr('class', array('btn', 'btn-default'))
			->add_attr( 'href', HC_Lib::link('shifts/add/index')->url( $params->to_array() ) )
			->add_child( HC_Html::icon('arrow-left') )
			->add_child( HCM::__('Back') )
		);

}

$display_form->add_item(
	HC_Html_Factory::widget('label_row')
		->set_content( $buttons )
	);

// $out->add_item( $out2 );
$out->add_item( $display_form );
echo $out->render();