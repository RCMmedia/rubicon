<?php
$out = HC_Html_Factory::widget('container')
	->add_item( HC_Html::icon('comment-o') )
	->add_item( sprintf(HCM::_n('%d Comment', '%d Comments', $count), $count) )
	;
echo $out;