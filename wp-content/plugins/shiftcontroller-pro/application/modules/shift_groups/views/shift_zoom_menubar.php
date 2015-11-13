<?php
$out = HC_Html_Factory::widget('container')
	->add_item( HC_Html::icon('table') )
	->add_item( HCM::__('Shift Series'). ' [' . $count . ']' )
	;
echo $out;