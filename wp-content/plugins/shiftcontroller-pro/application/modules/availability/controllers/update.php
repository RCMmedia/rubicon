<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Update_Availability_HC_Controller extends _Front_HC_Controller
{
	protected $form_edit = NULL;

	function __construct()
	{
		parent::__construct();

		$this->form_edit = HC_Lib::form()
			->set_input( 'type', 'radio' )
			->set_input( 'date', 'recurring_date', array('date_start' => 'date', 'date_end' => 'date', 'details' => 'date') )
			->set_input( 'time', 'timeframe', array('start' => 'start', 'end' => 'end') )
			;
	}

	public function index()
	{
		$args = hc_parse_args( func_get_args(), TRUE );
		if( ! (isset($args['id'])) ){
			echo 'PARAMS MISSING IN availability/update/index<br>';
			return;
		}

		$id = $args['id'];

		if( is_object($id) ){
			$model = $id;
		}
		else {
			$model = HC_App::model('availability');
			$model
				->where('id', $id)
				->get()
				;
			$this->_check_model( $model );
		}

		$acl = HC_App::acl();
		if( ! $acl->set_object($model)->can('edit') ){
			return;
		}

		// $values = hc_parse_args( $args );
		$values = array();

		$form = $this->form_edit;
		$post = $this->input->post();

		if( $post ){
			$form->grab( $post );
			$form_values = $form->values();
			$values = array_merge( $values, $form_values );
		}

		$date_value = $form->input('date')->value(TRUE);
		if( $date_value['recurring'] == 'single' ){
			$values['date_start'] = $date_value['datesingle'];
			$values['date_end'] = $date_value['datesingle'];
			$values['details'] = '';
		}
		else {
			$values['date_start'] = $date_value['datestart'];
			$values['date_end'] = $date_value['dateend'];
			$values['details'] = $form->input('date')->value(FALSE, TRUE);
		}
		unset($values['date']);

		$related = $model->from_array( $values );
		// $action_result = $model->save( $related );
		$action_result = $model->save();

		if( $action_result ){
			$msg = HCM::__('Availability updated');
			$this->session->set_flashdata( 
				'message',
				$msg
				);

			$redirect_to = $this->my_parent();
			$redirect_to .= '/user/' . $model->user_id;

		/* what to refresh on referring page */
			$parent_refresh = $model->present_calendar_refresh();
			$parent_refresh = array_keys($parent_refresh);

			$this->redirect( $redirect_to, $parent_refresh );
		}
		else {
			$form->set_errors( $model->errors() );

			$this->layout->set_partial(
				'content',
				$this->render(
					'availability/zoom/index',
					array(
						'form' 		=> $form,
						'object' 	=> $model,
						)
					)
				);
			$this->layout();
		}
	}
}

/* End of file customers.php */
/* Location: ./application/controllers/admin/categories.php */