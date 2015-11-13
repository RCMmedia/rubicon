<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Edit_Pickup_HC_controller extends _Front_HC_controller
{
	public function __construct()
	{
		parent::__construct();
	}

	function insert()
	{
		$args = func_get_args();
		$id = array_shift($args);

		$model = HC_App::model('shift');
		$model
			->where('id', $id)
			->get()
			;
		$this->_check_model( $model );
		$acl = HC_App::acl();
		if( ! $acl->set_object($model)->can('pickup') ){
			return;
		}

		$current_user = $this->auth->user();
		$related = array(
			'user'	=> $current_user
			);
		$model->user = $current_user;

		$app_conf = HC_App::app_conf();
		$approval_required = $app_conf->get('pickup:approval_required');
		if( $approval_required ){
			$model->status = $model->_const('STATUS_DRAFT');
		}

		$action_result = $model->save($related);

		if( $action_result ){
			if( $approval_required ){
				$msg = HCM::__('Shift pickup request received');
			}
			else {
				$msg = HCM::__('Shift picked up');
			}

		/* save and redirect here */
			$this->session->set_flashdata(
				'message',
				$msg
				);
		}
		else {
		/* save and redirect here */
			$this->session->set_flashdata(
				'error',
				HCM::__('Error')
				);
		}

		$redirect_to = 'shifts/zoom/index/' . $id;
//			$redirect_to = '-referrer-';

	/* what to refresh on referring page */
		$parent_refresh = $model->present_calendar_refresh();
		$parent_refresh = array_keys($parent_refresh);
		$this->redirect( $redirect_to, $parent_refresh );
	}
}

/* End of file customers.php */
/* Location: ./application/controllers/admin/categories.php */