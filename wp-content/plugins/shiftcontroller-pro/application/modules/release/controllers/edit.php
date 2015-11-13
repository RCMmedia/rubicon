<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Edit_Release_HC_controller extends _Front_HC_controller
{
	public function __construct()
	{
		parent::__construct();

		$this->form_edit = HC_Lib::form()
			->set_input( 'action', 'radio' )
			;
	}

	function update( $id )
	{
		$extensions = HC_App::extensions();
		$args = func_get_args();
		$id = array_shift($args);

		$model = HC_App::model('shift');
		$model
			->where('id', $id)
			->get()
			;
		$this->_check_model( $model );

		$acl = HC_App::acl();
		if( ! $acl->set_object($model)->can('edit') ){
			return;
		}

		$original_model = clone $model;

	/* supplied as parameters */
		$values = hc_parse_args( $args );

	/* if post supplied */
		$form = $this->form_edit;
		$post = $this->input->post();
		if( $post ){
			$form->grab( $post );
			$form_values = $form->values();
			$values = array_merge( $values, $form_values );
		}

		if( (! $values) OR (! array_key_exists("action", $values)) ){
			$redirect_to = 'shifts/zoom/index/id/' . $id;
			$this->redirect( $redirect_to );
			return;
		}

		/* approve */
		if( (! $model->release_request) OR $values['action'] ){
			$current_user = $this->auth->user();

			$model->release_request = 0;
			$model->user_id = 0;
			$action_result = $model->save();
			// $action_result = $model->delete($current_user, 'user');

			$msg = HCM::__('Shift released');
		}
		/* reject */
		else {
			$model->release_request = 0;
			$action_result = $model->save();

			$msg = HCM::__('Shift release rejected');
		}

		if( $action_result ){
		/* extensions */
			$extensions->run('shifts/update', $post, $model);

		/* save and redirect here */
			$this->session->set_flashdata(
				'message',
				$msg
				);

			$redirect_to = 'shifts/zoom/index/id/' . $id;

		/* what to refresh on referring page */
			$parent_refresh = $model->present_calendar_refresh();
			$parent_refresh = array_keys($parent_refresh);
			$this->redirect( $redirect_to, $parent_refresh );
		}
		else {
		/* final layout */
			$this->layout->set_partial(
				'content',
				Modules::run('shifts/zoom/index', $model, 'release')
				);
			$this->layout();
		}
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
		if( ! $acl->set_object($model)->can('release') ){
			return;
		}

		$current_user = $this->auth->user();

		$app_conf = HC_App::app_conf();
		$approval_required = $app_conf->get("release:approval_required");

		if( $approval_required ){
			$model->release_request = 1;
			$action_result = $model->save();
		}
		else {
			$action_result = $model->delete($current_user, 'user');
		}

		if( $action_result ){
		/* extensions */
			// $extensions->run('shifts/update', $post, $model);

			if( $approval_required ){
				$msg = HCM::__('Shift release request received');
			}
			else {
				$msg = HCM::__('Shift released');
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

		$redirect_to = 'shifts/zoom/index/id/' . $id . '/tab/release';

	/* what to refresh on referring page */
		$parent_refresh = $model->present_calendar_refresh();
		$parent_refresh = array_keys($parent_refresh);
		$this->redirect( $redirect_to, $parent_refresh );
	}
}

/* End of file customers.php */
/* Location: ./application/controllers/admin/categories.php */