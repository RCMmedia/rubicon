<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Zoom_Availability_HC_Controller extends _Front_HC_Controller
{
	protected $form_edit = NULL;
	protected $views_path = 'availability/zoom';

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
			echo 'PARAMS MISSING IN availability/zoom/index<br>';
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
		if( ! $acl->set_object($model)->can('view') ){
			return;
		}

		$form_values = $model->to_array();

		$date_input = clone $this->form_edit->input('date');
		$date_value = $date_input->unserialize( $model->details, 'no-dates' );
		$date_value['datestart'] = $model->date_start;
		$date_value['dateend'] = $model->date_end;

		$form_values['date'] = $date_value;

		$this->form_edit->set_values( $form_values );

	/* HEADER */
/*
		$this->layout->set_partial(
			'header_ajax',
			$this->render(
				$this->views_path . '/_header',
				array(
					'object'	=> $model,
					)
				)
			);
*/
		$this->layout->set_partial(
			'content',
			$this->render(
				$this->views_path . '/index',
				array(
					'form' 		=> $this->form_edit,
					'object' 	=> $model,
					)
				)
			);
		$this->layout();
	}
}

/* End of file customers.php */
/* Location: ./application/controllers/admin/categories.php */