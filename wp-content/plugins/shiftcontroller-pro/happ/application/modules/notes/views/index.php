<?php
$acl = HC_App::acl();

$t = HC_Lib::time();

$list = HC_Html_Factory::widget('list')
	->add_attr('class', array('list-unstyled'))
	->add_attr('class', array('list-separated'))
	;

foreach( $entries as $e ){
	$can = $acl->set_object($e)->can('edit');
	$t->setTimestamp( $e->created );

	$wrap = HC_Html_Factory::widget('panel')
		->add_attr('class', 'panel-default')
		// ->add_attr('class', 'panel-info')
		->add_attr('class', 'panel-condensed')
		;

	$header = HC_Html_Factory::widget('container');
	if( $can ){
		$header->add_item(
			HC_Html_Factory::element('a')
				->add_child( 
					HC_Html::icon('times')
						->add_attr('class', 'text-danger')
					)
				->add_attr('href', HC_Lib::link('notes/delete/' . $e->id) )
				->add_attr('title', HCM::__('Delete'))
				->add_attr('class', array('close', 'text-danger', 'hc-confirm'))
			);
	}
	$header->add_item(
		HC_Html_Factory::widget('list')
			->add_attr('class', array('list-inline'))
			->add_attr('class', array('list-separated'))
			->add_attr('class', array('text-small'))
			->add_item( $e->present_created(HC_PRESENTER::VIEW_TEXT) )
			->add_item( $e->author->present_title() )
		);
	$wrap->set_header( $header );

	$wrap->set_body( 
		HC_Html_Factory::element('em')
			->add_child( $e->content )
		);

	if( $can && (count($access_levels) > 1) ){
		$wrap->set_footer(
			HC_Html_Factory::widget('list')
				->add_attr('class', 'list-unstyled')
				->add_attr('class', 'list-separated')
				->add_attr('class', array('text-muted'))
				->add_attr('class', array('text-small'))
				->add_item( HCM::__('Comment Visible To') . ':' )
				->add_item(
					HC_Html_Factory::element('strong')
						->add_child( $access_levels[$e->access_level] )
					)
			);
		}
	$list->add_item( $wrap );
}
?>
<?php
$acl = HC_App::acl();
if( $acl->set_object($parent_object)->can('notes::add') ){
	$display_form = HC_Html_Factory::widget('form')
		->add_attr('action', HC_Lib::link('notes/add/' . $parent_object->my_class() . '/' . $parent_object->id))
		->add_attr('class', 'form-horizontal')
		->add_attr('class', 'form-condensed')
		;

	$buttons = HC_Html_Factory::widget('list')
		->add_attr('class', array('list-inline', 'list-separated') )
		;
	$buttons->add_item(
		HC_Html_Factory::element('input')
			->add_attr('type', 'submit')
			->add_attr('class', array('btn', 'btn-primary'))
			->add_attr('title', HCM::__('Add New Comment') )
			->add_attr('value', HCM::__('Add New Comment') )
		);

	$display_form->add_item(
		$this->load->view(
			'notes/add_form_inputs',
			array(
				'parent_object'	=> $parent_object,
				'form'			=> $form,
				'buttons'		=> $buttons,
				),
			TRUE
			)
		);

	$list->add_item( $display_form );
}

echo $list->render();
?>