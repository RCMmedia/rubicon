<?php
if( ! count($entries) ){
	return;
}

$t = HC_Lib::time();

$list = HC_Html_Factory::widget('list')
	->add_attr('class', array('list-unstyled'))
	;

foreach( $entries as $e ){
	$list->add_item(
		HC_Html_Factory::element('em')
			->add_attr('title', strip_tags($e->content))
			->add_child( HC_Html::icon(HC_App::icon_for('comment')) )
			->add_child( $e->content )
		);
}

echo $list->render();
?>