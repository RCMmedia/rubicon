<?php
class Availability_HC_Presenter extends HC_Presenter
{
	function start( $model, $vlevel = HC_PRESENTER::VIEW_HTML )
	{
		return $this->_time( $model->start, $vlevel );
	}

	function end( $model, $vlevel = HC_PRESENTER::VIEW_HTML )
	{
		return $this->_time( $model->end, $vlevel );
	}

	private function _time( $value, $vlevel = HC_PRESENTER::VIEW_HTML )
	{
		$return = array();
		switch( $vlevel ){
			case HC_PRESENTER::VIEW_HTML:
				$return[] = HC_Html::icon(HC_App::icon_for('time'));
				break;
			case HC_PRESENTER::VIEW_TEXT:
				$return[] = HCM::__('Time');
				$return[] = ': ';
				break;
		}

		$t = HC_Lib::time();
		$t->setTimestamp( $value );
		$return[] = $t->formatTime();

		$return = join( '', $return );
		return $return;
	}

	public function title( $model, $vlevel = HC_PRESENTER::VIEW_HTML )
	{
		$return = $model->present_time();

		switch( $vlevel ){
			case HC_PRESENTER::VIEW_HTML_ICON:
				$return = HC_Html_Factory::widget('titled', 'span')
					->add_child( $model->present_type(HC_PRESENTER::VIEW_HTML_ICON) )
					->add_attr('title', $return )
					->add_attr('class', $model->present_style_class())
					;
				break;

			case HC_PRESENTER::VIEW_HTML:
				$return = HC_Html_Factory::widget('titled', 'span')
					->add_child( $model->present_type(HC_PRESENTER::VIEW_HTML_ICON) )
					->add_child( $return )
					->add_attr('class', $model->present_style_class())
					;
				break;
		}

		return $return;
	}

	public function style_class( $model )
	{
		$return = '';
		switch( $model->type ){
			case $model->_const('TYPE_UNAVAILABLE'):
				$return = 'text-danger';
				break;
			case $model->_const('TYPE_PREFERRED'):
				$return = 'text-success';
				break;
		}
		return $return;
	}
	
	public function type( $model, $vlevel = HC_PRESENTER::VIEW_HTML )
	{
		$return = '';
		switch( $model->type ){
			case $model->_const('TYPE_UNAVAILABLE'):
/* translators: availability type */
				$title = HCM::__('Unavailable');
				$label = HC_Html::icon('thumbs-down');
				break;
			case $model->_const('TYPE_PREFERRED'):
/* translators: availability type */
				$title = HCM::__('Preferred');
				$label = HC_Html::icon('thumbs-up');
				break;
		}

		switch( $vlevel ){
			case HC_PRESENTER::VIEW_HTML:
				$return = HC_Html_Factory::widget('titled', 'span')
					->add_child($label)
					->add_child($title)
					->add_attr('class', $model->present_style_class())
					;
				break;

			case HC_PRESENTER::VIEW_HTML_ICON:
				$return = HC_Html_Factory::widget('titled', 'span')
					->add_child($label)
					->add_attr('class', $model->present_style_class())
					;
				break;

			default:
				$return = $title;
				break;
		}
		return $return;
	}

	public function time( $model, $vlevel = HC_PRESENTER::VIEW_HTML )
	{
		$t = HC_Lib::time();

		$return = array();
		switch( $vlevel ){
			case HC_PRESENTER::VIEW_TEXT:
				$return[] = HCM::__('Time');
				$return[] = ': ';
				break;
		}

		$period_view = $t->formatPeriodOfDay($model->start, $model->end);
		$period_view = str_replace(' ', '', $period_view);
		$return[] = $period_view;

		$return = join( '', $return );
		return $return;
	}

	public function date( $model, $vlevel = HC_PRESENTER::VIEW_HTML )
	{
		$input = HC_Html_Factory::input('recurring_date');
		$value = $input->unserialize( $model->details, 'no-dates' );

		$value['datestart'] = $model->date_start;
		$value['dateend'] = $model->date_end;

		$input->set_value( $value );
		$dates_datails = $input->dates_details();

		switch( $vlevel ){
			case HC_PRESENTER::VIEW_HTML:
				$return = HC_Html_Factory::widget('list')
					->add_attr('class', 'list-unstyled')
					// ->add_attr('class', 'list-separated')
					;
					
				for( $di = 0; $di < count($dates_datails); $di++ ){
					$return->add_item( 'dd_' . $di, $dates_datails[$di] );
					if( $di > 0 ){
						$return->add_item_attr( 'dd_' . $di, 'class', 'text-muted' );
						$return->add_item_attr( 'dd_' . $di, 'class', 'text-smaller' );
					}
				}
				break;
			default:
				$return = join(', ', $dates_datails);
				break;
		}

		return $return;
	}

	function calendar_refresh( $model )
	{
		$final_parent_refresh = array();

		$dates = $model->get_dates();
		foreach( $dates as $date ){
			$refresh_keys = array();
			$refresh_keys[] = 'dat-' . $date;
			$refresh_keys[] = $model->user_id ? 'use-' . $model->user_id : 'use-0';
			$this_parent_refresh = HC_Lib::get_combinations($refresh_keys);
			reset( $this_parent_refresh );
			foreach( $this_parent_refresh as $pr ){
				$final_parent_refresh[ join('-', $pr) ] = 1;
			}
		}

		$return = $final_parent_refresh;
		return $return;
	}
}