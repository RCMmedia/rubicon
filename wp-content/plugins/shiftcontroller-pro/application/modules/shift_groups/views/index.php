<?php
$out = HC_Html_Factory::widget('tiles')
	->set_per_row( 3 )
	// ->add_attr('class', 'list-unstyled')
	// ->add_attr('class', 'list-separated')
	;
foreach( $entries as $e ){
	$class = ($e->id == $object->id) ? 'alert-archive' : 'alert-default-o';
	$out->add_item(
		HC_Html_Factory::element('div')
			->add_attr('class', array('alert', $class) )
			->add_child(
				HC_Html_Factory::element('div')
					->add_attr('class', 'pull-right')
					->add_child(
						$form->input('id')
							->add_option( $e->id )
							->render_one( $e->id )
						)
				)
			->add_child(
				HC_Html_Factory::widget('list')
					->add_attr('class', 'list-unstyled')
					->add_item( 
						HC_Html_Factory::element('a')
							->add_attr('href', HC_Lib::link('shifts/zoom/' . $e->id) )
							->add_child( $e->present_title() )
						)
					->add_item( $e->present_title_misc() )
				)
			);
}

$out = HC_Html_Factory::widget('module')
	->set_url('list/index')
	// ->pass_param('content', $list)
	->set_self_target( FALSE )
	;

if( $this->hc_modules->exists('shift_groups') ){
	$display = HC_Html_Factory::widget('module')
		->set_url('shift_groups/form')
		->pass_param('content', $out)
		->set_self_target( FALSE )
		;
}
else {
	$display = $out->render();
}
echo $display;
?>