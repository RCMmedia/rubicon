<?php
$t = HC_Lib::time();

$list = HC_Html_Factory::widget('list')
	->add_attr('class', array('list-unstyled'))
	// ->add_attr('class', array('list-inline'))
	->add_attr('class', array('list-separated'))
	->add_attr('style', 'vertical-align: top;')
	;

$list->add_item(
	$form->input('notes')
		->add_attr('style', 'width: 90%;')
		// ->add_attr('cols', 40)
		// ->add_attr('rows', 3)
	);

if( count($access_levels) > 1 ){
	$list
		->add_item(
			'visible',
			HC_Html_Factory::widget('list')
				->add_attr('class', array('list-unstyled'))
				// ->add_attr('class', array('list-separated'))
				->add_item('label',
					HCM::__('Comment Visible To')
					)
				->add_item_attr('label', 'class', array('text-muted', 'text-smaller'))
				->add_item('input',
					$form->input('access_level')
						->set_options( $access_levels )
						->add_attr('class', 'text-smaller')
						->add_attr('style', 'width: 90%;')
					)
			)
		->add_item_attr('visible', 'style', 'vertical-align: top;')
		;
}

if( isset($buttons) ){
	$list = HC_Html_Factory::widget('list')
		->add_attr('class', 'list-unstyled')
		->add_attr('class', 'list-separated')
		->add_item( $list )
		->add_item( $buttons )
		;
}

$out = HC_Html_Factory::widget('collapse')
	->set_title(
		HC_Html_Factory::element('span')
			->add_attr('class', 'text-smaller')
			->add_child( HC_Html::icon('comment-o') . HCM::__('Add New Comment') )
		)
	->set_content( $list )
	->set_indented( FALSE )
	;

echo $out->render();
?>