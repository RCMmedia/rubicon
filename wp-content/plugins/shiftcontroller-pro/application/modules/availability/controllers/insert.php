<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Insert_Availability_HC_Controller extends _Front_HC_Controller
{
	protected $form_add = NULL;

	function __construct()
	{
		parent::__construct();

		$this->form_add = HC_Lib::form()
			->set_input( 'user', 'hidden' )
			->set_input( 'type', 'radio' )
			->set_input( 'date', 'recurring_date', array('date_start' => 'date', 'date_end' => 'date', 'details' => 'date') )
			->set_input( 'time', 'timeframe', array('start' => 'start', 'end' => 'end') )
			;
	}

	public function index()
	{
	/* if post supplied */
		$post = $this->input->post();

		$values = array();
		if( $post ){
			$this->form_add->grab( $post );
			$form_values = $this->form_add->values();
			$values = array_merge( $values, $form_values );
		}

		$date_value = $this->form_add->input('date')->value(TRUE);
		if( $date_value['recurring'] == 'single' ){
			$values['date_start'] = $date_value['datesingle'];
			$values['date_end'] = $date_value['datesingle'];
			$values['details'] = '';
		}
		else {
			$values['date_start'] = $date_value['datestart'];
			$values['date_end'] = $date_value['dateend'];
			$values['details'] = $this->form_add->input('date')->value(FALSE, TRUE);
		}
		unset($values['date']);

		$model = HC_App::model('availability');

		$related = $model->from_array( $values );
		$action_result = $model->save( $related );

		if( $action_result ){
			$msg = HCM::__('Availability added');
			$this->session->set_flashdata( 
				'message',
				$msg
				);

			$redirect_to = $this->my_parent();
			$this->redirect( $redirect_to );
		}
		else {
			$this->form_add->set_errors( $model->errors() );

			$this->layout->set_partial(
				'content',
				$this->render(
					'availability/add',
					array(
						'form' 	=> $this->form_add,
						)
					)
				);
			$this->layout();
		}
	}
}

/* End of file customers.php */
/* Location: ./application/controllers/admin/categories.php */