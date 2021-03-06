<?php
if( ! $count ){
	return;
}

$temp_shift = HC_App::model('shift');
$linkto = HC_Lib::link('list-toff/index', 
	array(
		'filter'	=> 'pending-timeoffs',
		// 'status'	=> $temp_shift->_const('STATUS_DRAFT'),
		)
	);

$title = HC_Html_Factory::widget('list')
	->add_attr('class', 'list-inline')
	->add_attr('class', 'list-separated')
	->add_item('title',
		HC_Html_Factory::widget('titled', 'a')
			->add_attr('href', $linkto)
			->add_child( HCM::__('Pending Timeoff Requests') )
		)
	->add_item('count', 
		HC_Html_Factory::element('span')
			->add_attr('class', 'badge')
			// ->add_attr('class', 'label-default')
			->add_child( $count )
		)
	;

$out = HC_Html_Factory::element('div')
	->add_attr('class', 'alert')
	->add_attr('class', 'alert-archive')
	->add_child( $title )
	;

$color = '#eee';
$color1 = HC_Lib::adjust_color_brightness( $color, 0 );
$color2 = HC_Lib::adjust_color_brightness( $color, 20 );

$out->add_attr('style',
	"background: repeating-linear-gradient(
		-45deg,
		$color1,
		$color1 6px,
		$color2 6px,
		$color2 12px
		);
	"
	);

echo $out->render();