<?php
class Note_HC_Presenter extends HC_Presenter
{
	function content( $model, $vlevel = HC_PRESENTER::VIEW_HTML )
	{
		$return = $model->content;
		return $return;
	}

	function label( $model, $vlevel = HC_PRESENTER::VIEW_HTML )
	{
		$return = HCM::_x('Comment', 'noun');
		return $return;
	}

	function created( $model, $vlevel = HC_PRESENTER::VIEW_HTML )
	{
		$value = $model->created;
		$t = HC_Lib::time();
		$t->setTimestamp( $value );

		$return = array();

		switch( $vlevel ){
			case HC_PRESENTER::VIEW_HTML:
				$return[] = HC_Html::icon(HC_App::icon_for('date'));
				break;
		}
		$return[] = $t->formatDateFull();

		switch( $vlevel ){
			case HC_PRESENTER::VIEW_HTML:
				$return[] = HC_Html::icon(HC_App::icon_for('time'));
				break;
		}
		$return[] = $t->formatTime();

		switch( $vlevel ){
			case HC_PRESENTER::VIEW_TEXT:
			case HC_PRESENTER::VIEW_RAW:
				$return = join( ' ', $return );
				break;
			default:
				$return = join( '', $return );
				break;
		}
		return $return;
	}
}