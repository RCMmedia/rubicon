<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Delete_Availability_HC_Controller extends _Front_HC_Controller
{
	function index()
	{
		$args = hc_parse_args( func_get_args(), TRUE );
		if( ! (isset($args['id'])) ){
			echo 'PARAMS MISSING IN availability/delete<br>';
			return;
		}

		$id = $args['id'];
		$model = HC_App::model('availability');
		$model
			->where('id', $id)
			->get()
			;
		$this->_check_model( $model );

		$acl = HC_App::acl();
		if( ! $acl->set_object($model)->can('delete') ){
			return;
		}

	/* what to refresh on referring page */
		$parent_refresh = $model->present_calendar_refresh();
		$parent_refresh = array_keys($parent_refresh);

		if( $model->delete() ){
			$this->session->set_flashdata( 
				'message',
				HCM::__('Availability deleted')
			);
		}
		else {
			$this->session->set_flashdata(
				'error',
				HCM::__('Error')
			);
		}

		$redirect_to = $this->my_parent();
		$this->redirect( $redirect_to, $parent_refresh );
	}
}

/* End of file customers.php */
/* Location: ./application/controllers/admin/categories.php */