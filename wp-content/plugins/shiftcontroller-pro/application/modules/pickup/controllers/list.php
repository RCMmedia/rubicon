<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class List_Pickup_HC_controller extends _Front_HC_controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function filter( $what = 'label', $shifts = NULL )
	{
		switch( $what ){
			case 'label':
				return $this->filter_label();
				break;
			case 'pre':
				return $this->filter_pre($shifts);
				break;
			case 'post':
				return $this->filter_post($shifts);
				break;
		}
	}

	function filter_label()
	{
		return $this->render(
			'pickup/filter_label'
			);
	}

	function filter_pre( $shifts )
	{
		$shifts->where_related('user', 'id', NULL, TRUE);
		return $shifts;
	}

	function filter_post( $shifts )
	{
		$return = array();
		$acl = HC_App::acl();
		foreach( $shifts as $sh ){
			if( ! $acl->set_object($sh)->can('pickup') ){
				continue;
			}
			$return[] = $sh;
		}

		return $return;
	}

}

/* End of file customers.php */
/* Location: ./application/controllers/admin/categories.php */