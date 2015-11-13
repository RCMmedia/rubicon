<?php
class Conflict_Availability_Unavailable_HC_Presenter extends HC_Presenter
{
	function type( $model )
	{
/* translators: availability type */
		$return = HCM::__('Unavailable');
		return $return;
	}

	function details( $model, $vlevel = HC_PRESENTER::VIEW_HTML )
	{
		$conflicting_one = HC_App::model('availability');
		$conflicting_one
			->where('id', $model->details )
			->get()
			;

		switch( $vlevel ){
			case HC_PRESENTER::VIEW_HTML:
				$return = HC_Html_Factory::widget('availability_view')
					->set_new_window( TRUE )
					->set_wide( TRUE )
					;
				$return->set_model( $conflicting_one );
				break;
			case HC_PRESENTER::VIEW_TEXT:
			case HC_PRESENTER::VIEW_RAW:
				$return = $conflicting_one->present_details($vlevel);
				break;
		}
		return $return;
	}
}