<?php
$my_own = FALSE;
if( ! $wrap ){
	$my_own = TRUE;
	$wrap = HC_Html_Factory::widget('list')
		->add_attr('class', 'list-inline')
		->add_attr('class', 'list-separated')
		;
}

if( $count ){
	$title = sprintf( HCM::_n('%d Shift Release Pending', '%d Shift Release Pending', $count), $count );

	$item = HC_Html_Factory::widget('titled', 'span')
		->add_attr('class', 'display-block')
		->add_attr('class', 'label')
		// ->add_attr('class', 'alert-condensed2')
		// ->add_attr('class', 'text-smaller2')
		->add_attr('class', 'label-warning')

		->add_child( $title )
		;
	$wrap->add_item( $item );
}

if( $my_own ){
	if( $wrap->items() ){
		echo $wrap->render();
	}
}

?>