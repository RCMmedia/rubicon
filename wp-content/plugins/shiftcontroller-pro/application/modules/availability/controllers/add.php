<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Add_Availability_HC_Controller extends _Front_HC_Controller
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
		$args = hc_parse_args( func_get_args(), TRUE );
		if( ! (isset($args['user'])) ){
			echo 'PARAMS MISSING IN availability/index<br>';
			return;
		}
		$user_id = is_object($args['user']) ? $args['user']->id : $args['user'];
		$t = HC_Lib::time();
		$t->setNow();
		$date_start = $t->formatDate_Db();
		$t->setEndMonth();
		// $t->modify('+1 month');
		$date_end = $t->formatDate_Db();

		$form_values = array(
			'user'			=> $user_id,
			'date'	=> array(
				'recurring'		=> 'single',
				'datesingle'	=> $date_start,
				'datestart'		=> $date_start,
				'dateend'		=> $date_end,
				'repeat'		=> 'daily'
				),
			);
		$this->form_add->set_values( $form_values );

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

/* End of file customers.php */
/* Location: ./application/controllers/admin/categories.php */