<?php
class Conflict_Availability_Preferred_HC_Presenter extends HC_Presenter
{
	function type( $model )
	{
/* translators: availability type */
		$return = HCM::__('Not Within Preferred Availability');
		return $return;
	}

	function details( $model, $vlevel = HC_PRESENTER::VIEW_HTML )
	{
		return;
	}
}