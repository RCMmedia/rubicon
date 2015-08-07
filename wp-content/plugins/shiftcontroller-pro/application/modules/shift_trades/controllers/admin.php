<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shift_trades_admin_controller extends Backend_controller_crud
{
	function __construct()
	{
		$this->conf = array(
			'model'		=> 'Shift_model',
			'path'		=> 'shift_trades/admin',
			'entity'	=> 'shift',
			);
		parent::__construct( USER_MODEL::LEVEL_MANAGER );
	}

	function action()
	{
		$action = $this->input->post('nts-action');
		$ids = $this->input->post('id');

		if( $ids && $action )
		{
			$ok_count = 0;
			$failed_count = 0;
			$objects = array();

			$this->{$this->model}
				->where_in( 'id', $ids )
				->get()->all;
			$total_count = count( $ids );

			$msg = array();
			$msg[] = lang('trade');
			switch( $action )
			{
				case 'approve':
					$msg[] = lang( 'common_approve' );
					foreach( $this->{$this->model} as $o )
					{
						$o->has_trade = 0;
						$um = new User_Model;
						$relations = array(
							'user'	=> $um
							);
						if( $o->save($relations) )
							$ok_count++;
					}
					break;

				case 'reject':
					$msg[] = lang( 'common_reject' );
					foreach( $this->{$this->model} as $o )
					{
						$o->has_trade = 0;
						if( $o->save() )
							$ok_count++;
					}
					break;
			}

			$failed_count = $total_count - $ok_count;
			if( $ok_count )
				$msg[] = lang('common_ok') . ' [' . $ok_count . ']';
			if( $failed_count > 0 )
				$msg[] = lang('common_failed') . ' [' . $failed_count . ']';

			$msg = join( ': ', $msg );
			if( $failed_count > 0 )
				$this->session->set_flashdata( 'error', $msg );
			else
				$this->session->set_flashdata( 'message', $msg );
		}
		elseif( ! $ids )
		{
			$msg = lang('common_no_selected');
			$this->session->set_flashdata( 'error', $msg );
		}

		$redirect_to = method_exists($this, 'after_save') ? $this->after_save() : array($this->conf['path']);
		$this->redirect( $redirect_to );
		return;
	}

	public function trade_actions( $shift )
	{
		$return = array();
		if( $shift->has_trade )
		{
			$return[] = array(
				'title'	=> '<i class="fa fa-exchange"></i> ' . lang('trade_request'),
				);
			$return[] = array(
				'title'	=> '<i class="fa fa-check text-success"></i> ' . lang('common_approve'),
				'href'	=> ci_site_url( array('admin/shifts', 'save', $shift->id, 'has_trade', 0, 'user', -1) ),
				);
			$return[] = array(
				'title'	=> '<i class="fa fa-thumbs-o-down text-warning"></i> ' . lang('common_reject'),
				'href'	=> ci_site_url( array('admin/shifts', 'save', $shift->id, 'has_trade', 0) ),
				);
		}
		return $return;
	}

	function index( $status = 0 )
	{
	/* load */
		$this->{$this->model}
			->where( 'has_trade', 1 );

		$this->data['entries'] = $this->{$this->model}->get()->all;

	/* check how many locations do we have */
		$lm = new Location_Model;
		$location_count = $lm->count();
		$this->data['location_count'] = $location_count;

		$this->set_include( 'index' );
		$this->data['index_child'] = $this->get_view('index_child');
		$this->load->view( $this->template, $this->data);
	}

	protected function after_save()
	{
		$this->load->library('user_agent');
		if ($this->agent->is_referral())
			$return = $this->agent->referrer();
		else
			$return = array( $this->conf['path'] );
		return $return;
	}
}

/* End of file customers.php */
/* Location: ./application/controllers/admin/categories.php */