<?php
$this_buttons = HC_Html_Factory::widget('list')
	->add_attr('class', array('list-unstyled') )
	;
$this_buttons->add_item(
	HC_Html_Factory::widget('titled', 'a')
		->add_attr('class', array('btn', 'btn-default'))
		->add_child( HCM::__('Click Here To Pick Up The Shift') )
		->add_attr('href', HC_Lib::link('pickup/edit/insert/' . $object->id))
	);

echo $this_buttons->render();
?>