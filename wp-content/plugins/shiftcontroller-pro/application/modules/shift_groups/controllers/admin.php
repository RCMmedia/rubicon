<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shift_groups_admin_controller extends Backend_controller
{
	private $params = array();

	function __construct()
	{
		$this->conf = array(
			'path'	=> 'shift_groups/admin',
			);
		parent::__construct( User_model::LEVEL_MANAGER );
	}

	public function save( $model, $form )
	{
		$post = array();
		$also_get = array(
			'date_from',
			'date_to',
			'repeat_type',
			'repeat',
			'custom_weekday',
			'in_out_in',
			'in_out_out'
			);
		reset( $also_get );
		foreach( $also_get as $ag )
		{
			$post[ $ag ] = $this->input->post( $ag );
		}
		$form->set_defaults( $post );

		$dates = array();
		if( $post['repeat'] == 'multiple' )
		{
			$this->hc_time->setDateDb( $post['date_from'] );
			$rex_date = $post['date_from'];

			while( $rex_date <= $post['date_to'] )
			{
				$dates[] = $rex_date;
				switch( $post['repeat_type'] )
				{
					case 'daily':
						$this->hc_time->modify( '+1 day' );
						break;
					case 'weekday':
						$this->hc_time->modify( '+1 day' );
						while( in_array($this->hc_time->getWeekday(), array(0,6)) )
							$this->hc_time->modify( '+1 day' );
						break;
					case 'weekly':
						$this->hc_time->modify( '+1 week' );
						break;
					case 'weekly-custom':
						$custom_weekday = $post['custom_weekday'];
						$this->hc_time->modify( '+1 day' );
						while( ! in_array($this->hc_time->getWeekday(), $custom_weekday) )
							$this->hc_time->modify( '+1 day' );
						break;
					case 'monthly-day':
						$this_week = $this->hc_time->getWeekOfMonth();
						$this->hc_time->modify( '+4 weeks' );
						while( $this->hc_time->getWeekOfMonth() != $this_week )
							$this->hc_time->modify( '+1 week' );
						break;
					case 'monthly-day-end':
						$this_week = $this->hc_time->getWeekOfMonthFromEnd();
						$this->hc_time->modify( '+4 weeks' );
						while( $this->hc_time->getWeekOfMonthFromEnd() != $this_week )
							$this->hc_time->modify( '+1 week' );
						break;
					case 'monthly-date':
						$this->hc_time->modify( '+1 month' );
						break;
					case 'in-out':
						$in_out_in = $post['in_out_in'];
						$in_out_out = $post['in_out_out'];
						if( ! isset($in_out_count) )
							$in_out_count = 1;
						if( $in_out_count < $in_out_in )
						{
							$this->hc_time->modify( '+1 day' );
							$in_out_count++;
						}
						else
						{
							$in_out_count = 1;
							$this->hc_time->modify( '+' . ($in_out_out+1) . ' day' );
						}
						break;
				}
				$rex_date = $this->hc_time->formatDate_Db();
			}
		}
		else
		{
			$dates = array($model->date);
		}

		$model->date = $dates;

		if( count($dates) > 1 )
		{
			/* set the shift group_id */
			$sm = new Shift_Model;
			$max_group_id = $sm->select_max('group_id')->get()->group_id;
			if( ! $max_group_id )
			{
				$max_group_id = 0;
			}
			$model->group_id = $max_group_id + 1;
		}

		$return = array( $model, $form );
		return $return;
	}

	public function delete( $shift_id )
	{
		$shift = new Shift_Model;
		$shift->get_by_id( $shift_id );
		$group_id = $shift->group_id;
		$shift_date = $shift->date;

		$which = $this->input->post( 'which' );

		$count = 0;
		if( (! $group_id) OR ($which == 'this_date') )
		{
			if( $shift->delete() )
			{
				$count++;
			}
		}
		else
		{
			$model = new Shift_Model;
			$model = $this->prepare_model( $model, $group_id, $shift_date, $which );
			foreach( $model->get() as $shift )
			{
				if( $shift->delete() )
				{
					$count++;
				}
				else
				{
				}
			}
		}

		$msg = array(
			$count . ' ' . lang('shifts'),
			lang('common_delete'),
			lang('common_ok') 
			);
		$msg = join( ': ', $msg );
		$this->session->set_flashdata( 'message', $msg );
		$redirect_to = array('admin/schedules');
		$this->redirect( $redirect_to );
	}

	private function prepare_model( $model, $group_id, $shift_date, $which )
	{
		$model->where( 'group_id', $group_id );
		switch( $which )
		{
			case 'this_date':
				$model->where( 'date', $shift_date );
				break;
			case 'upcoming':
				$model->where( 'date >=', $shift_date );
				break;
			case 'all':
				break;
		}
		return $model;
	}

	public function shift_add_form( $date )
	{
		$this->data['date'] = $date;

		$this->set_include( 'shift_add_form' );
		$this->load->view( $this->template, $this->data);
	}

	public function delete_form( $shift )
	{
		if( ! is_object($shift) )
		{
			$shift_id = $shift;
			$shift = new Shift_Model;
			$shift->get_by_id( $shift_id );
		}

		$group_id = $shift->group_id;
		$shift_date = $shift->date;
		$this->data['object'] = $shift;

		$model = new Shift_Model;
	/* min and max dates */
		$model
			->where( 'group_id', $group_id )
			->select_max('date')
			->get();
		$this->data['max_date'] = $model->date;

		$model
			->where( 'group_id', $group_id )
			->select_min('date')
			->get();
		$this->data['min_date'] = $model->date;

	/* count */
		$model = $this->prepare_model( $model, $group_id, $shift_date, 'all' );
		$this->data['count'] = $model->count();

	/* upcoming count */
		$model = $this->prepare_model( $model, $group_id, $shift_date, 'upcoming' );
		$this->data['upcoming_count'] = $model->count();

		$this->set_include( 'delete_form' );
		$this->load->view( $this->template, $this->data);
	}
}

/* End of file customers.php */
/* Location: ./application/controllers/admin/categories.php */