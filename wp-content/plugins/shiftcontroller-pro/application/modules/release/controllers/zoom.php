<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Zoom_Release_HC_controller extends _Front_HC_controller
{
	public function __construct()
	{
		parent::__construct();

		$this->form_edit = HC_Lib::form()
			->set_input( 'action', 'radio' )
			;
	}

	function quickstats( $objects, $wrap = NULL )
	{
		$cmm = HC_App::model('conflict_manager');
		$acl = HC_App::acl();

		$count = 0;
		foreach( $objects as $obj ){
			if( ! $this->_check_securuty($obj) ){
				continue;
			}
			if( $obj->release_request ){
				$count++;
			}
		}

	/* render view */
		if( $count ){
			$this->layout->set_partial(
				'content', 
				$this->render( 
					'release/quickstats',
					array(
						'count'	=> $count,
						'wrap'	=> $wrap,
						)
					)
				);

			$this->layout();
		}
	}

	protected function _check_securuty( $object ){
		$return = FALSE;

		if( $object->status != $object->_const('STATUS_ACTIVE') ){
			return $return;
		}
		if( $object->type != $object->_const('TYPE_SHIFT') ){
			return $return;
		}
		if( ! $object->user_id ){
			return $return;
		}

		$acl = HC_App::acl();
		if( ! $acl->set_object($object)->can('release') ){
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
				'release/quickview',
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
			'release/menubar',
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

		$acl = HC_App::acl();
		if( $acl->set_object($object)->can('edit') ){
			$this->layout->set_partial(
				'content', 
				$this->render( 
					'release/index_edit',
					array(
						'form'		=> $this->form_edit,
						'object'	=> $object,
						)
					)
				);
		}
		else {
			$this->layout->set_partial(
				'content', 
				$this->render( 
					'release/index_view',
					array(
						'object'	=> $object,
						)
					)
				);
		}

		$this->layout();
	}
}

/* End of file customers.php */
/* Location: ./application/controllers/admin/categories.php */