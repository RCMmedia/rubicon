<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Zoom_Pickup_HC_controller extends _Front_HC_controller
{
	public function __construct()
	{
		parent::__construct();
	}

	protected function _check_securuty( $object ){
		$return = FALSE;

		if( $object->status != $object->_const('STATUS_ACTIVE') ){
			return $return;
		}
		if( $object->type != $object->_const('TYPE_SHIFT') ){
			return $return;
		}
		if( $object->user_id ){
			return $return;
		}

		$acl = HC_App::acl();
		if( ! $acl->set_object($object)->can('pickup') ){
			return $return;
		}

		$return = TRUE;
		return $return;
	}

	public function quickview( $object, $wrap = NULL )
	{
		if( ! $this->_check_securuty($object) ){
			return;
		}

	/* render view */
		$this->layout->set_partial(
			'content', 
			$this->render( 
				'pickup/quickview',
				array(
					'shift'	=> $object,
					)
				)
			);

		$this->layout();
	}

	function menubar( $object )
	{
		if( ! $this->_check_securuty($object) ){
			return;
		}

		return $this->render(
			'pickup/menubar',
			array(
				'object'	=> $object,
				)
			);
	}

	function index( $object )
	{
		if( ! $this->_check_securuty($object) ){
			return;
		}

		$this->layout->set_partial(
			'content', 
			$this->render(
				'pickup/index',
				array(
					'object'			=> $object,
					)
				)
			);

		$this->layout();
	}
}

/* End of file customers.php */
/* Location: ./application/controllers/admin/categories.php */