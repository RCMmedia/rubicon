<?php
$out = HC_Html_Factory::widget('container')
	->add_item( HC_Html::icon('calendar') )
	->add_item( HCM::__('Availability') )
	;
echo $out;