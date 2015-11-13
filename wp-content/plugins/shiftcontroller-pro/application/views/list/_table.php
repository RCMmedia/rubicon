<?php
$current_user_id = $this->auth->user()->id;

$list = HC_Html_Factory::widget('list')
	->add_attr('class', 'list-unstyled')
	->add_attr('class', 'list-separated2')
	;

$total_count = 0;

$this_state = $state;
$this_state['wide'] = 1;
$this_state['form'] = TRUE;

/* stats view */
if( $current_user_id ){
	$quickstats_view = HC_Html_Factory::widget('module')
		->set_url( $rootlink . '/quickstats' )
		->pass_arg( array($shifts, $this_state) )
		->set_show_empty( TRUE )
		->add_attr('class', 'hc-rfr')
		;
	foreach( $this_state as $k => $v ){
		if( $v OR ($v === 0) ){
			$quickstats_view->set_param( $k, $v );
		}
	}
	$list->add_item( $quickstats_view );
}

$content = HC_Html_Factory::widget('module')
	->set_url( $rootlink . '/listing' )
	->pass_arg( array($shifts, $this_state) )
	// ->set_param( 'date', $this_date )
	->add_attr('class', 'hc-rfr')
	;
foreach( $this_state as $k => $v ){
	if( $v OR ($v === 0) ){
		$content->set_param( $k, $v );
	}
}

$total_count = count($shifts);
$list->add_item( $content );

if( ! $total_count ){
	$list->add_item( HCM::__('Nothing') );
}

if( $form ){
	$display = HC_Html_Factory::widget('module')
		->set_url('shift_groups/form')
		->pass_arg( 'content' )
		->pass_arg( $list )
		->pass_param('count', $total_count)
		->set_self_target( FALSE )
		;
}
else {
	$display = $list->render();
}

echo $display;