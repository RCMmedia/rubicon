<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shift_trades_staff_controller extends Backend_controller
{
	function __construct()
	{
		parent::__construct( USER_MODEL::LEVEL_STAFF );
	}

	function trade( $shift_id )
	{
		$shift = new Shift_Model;
		$shift->get_by_id( $shift_id );

		$approval_required = $this->app_conf->get( 'trade_approval' );
		$relations = array();
		if( $approval_required )
		{
			$shift->has_trade = 1;
		}
		else
		{
			$um = new User_Model;
			$relations = array(
				'user'	=> $um
				);
		}

		$msg = array(
			lang('shift'),
			lang('shift_list_trade'),
			lang('common_request'),
			);

		if( $shift->save($relations) )
		{
			$msg[] = lang('common_ok');
			$msg = join( ': ', $msg );
			$this->session->set_flashdata( 'message', $msg );
		}
		else
		{
			$msg[] = lang('common_failed');
			$msg[] = join( ', ', $trade->error->all );
			$msg = join( ': ', $msg );
			$this->session->set_flashdata( 'error', $msg );
		}

		$redirect_to = method_exists($this, 'after_save') ? $this->after_save() : array($this->conf['path']);
		$this->redirect( $redirect_to );
	}

	function recall( $shift_id )
	{
		$shift = new Shift_Model;
		$shift->get_by_id( $shift_id );

		$msg = array(
			lang('trade_recall')
			);

		$shift->has_trade = 0;
		if( $shift->save() )
		{
			$msg[] = lang('common_ok');
			$msg = join( ': ', $msg );
			$this->session->set_flashdata( 'message', $msg );
		}
		else
		{
			$msg[] = lang('common_failed');
			$msg[] = join( ', ', $shift->error->all );
			$msg = join( ': ', $msg );
			$this->session->set_flashdata( 'error', $msg );
		}

		$redirect_to = method_exists($this, 'after_save') ? $this->after_save() : array($this->conf['path']);
		$this->redirect( $redirect_to );
	}

	protected function _permission( $id )
	{
		$return = FALSE;
		if( $this->{$this->model}->get()->shift->get()->user->get()->id == $this->auth->user()->get()->id )
			$return = TRUE;
		return $return;
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