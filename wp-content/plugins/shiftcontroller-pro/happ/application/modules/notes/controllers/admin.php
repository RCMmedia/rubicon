<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notes_admin_controller extends Backend_controller
{
	private $params = array();

	function __construct()
	{
		$this->conf = array(
			'path'	=> 'notes/admin',
			);
		parent::__construct( USER_MODEL::LEVEL_STAFF );
	}

	private function can_edit( $note )
	{
		$can = FALSE;
		if( $this->auth && $this->auth->user() )
		{
			if( $this->auth->user()->level == USER_MODEL::LEVEL_ADMIN )
			{
				$can = TRUE;
			}
			else
			{
				if( $note->author->get()->id == $this->auth->user()->id )
				{
					$can = TRUE;
				}
			}
		}
		return $can;
	}

	function delete( $id )
	{
		$note = new Note_Model;
		$note->get_by_id( $id );

		$can = $this->can_edit( $note );

		if( $can )
		{
			if( 
				$note->delete()
				)
			{
				$msg = lang('common_delete')  . ': ' . lang('common_ok');
				$this->session->set_flashdata( 'message', $msg );
			}
			else
			{
				$this->session->set_flashdata( 'error', $note->error->string );
			}

			$this->load->library('user_agent');
			$redirect_to = $this->agent->referrer();
			$this->redirect( $redirect_to );
			return;
		}
		else
		{
			$this->session->set_flashdata('message', 'You are not allowed to access this page');
			ci_redirect('');
			exit;
		}
	}

	function index( $class, $id )
	{
		$other_class = $class . '_model'; 
		$other_model = new $other_class;
		$other_model->get_by_id( $id );

		$other_model->note->include_related( 'author', 'id' );

		$notes = $other_model->note->get()->all;
		$notes = $this->access_manager->filter_see( $notes );

		$this->data['entries'] = $notes;
		$this->data['parent_class'] = $class;
		$this->data['parent_id'] = $id;

		$this->set_include( 'index' );
		$this->load->view( $this->template, $this->data);
	}

	function add()
	{
		$notes = $this->input->post( 'notes' );

		$note = new Note_Model;
		$note->content = $notes;

		$relations = array(
			'author'	=> $this->auth->user(),
			);
		$args = func_get_args();
		for( $ii = 0; $ii < count($args); $ii = $ii + 2 )
		{
			if( isset($args[$ii + 1]) )
			{
				$k = $args[$ii];
				$v = $args[$ii + 1];

				if( $v )
				{
					$other_class = $k . '_model'; 
					$other_model = new $other_class;
					$other_model->get_by_id( $v );
					$relations[$k] = $other_model;
				}
			}
		}

		if( isset($other_model) )
		{
			$access_levels = $this->access_manager->access_levels( 'note_' . $other_model->my_class() );
			if( count($access_levels) == 1 )
			{
				$access_levels = array_keys( $access_levels );
				$access_level = $access_levels[0];
			}
			else
			{
				$access_level = $this->input->post( 'access_level' );
			}
		}
		else
		{
			$access_level = 0;
		}
		if( ! $access_level )
			$access_level = 0;
		$note->access_level = $access_level;

		if( 
			$note->save( $relations )
			)
		{
			$msg = lang('common_add_note')  . ': ' . lang('common_ok');
			$this->session->set_flashdata( 'message', $msg );
		}
		else
		{
			$this->session->set_flashdata( 'error', $note->error->string );
		}

		$this->load->library('user_agent');
		$redirect_to = $this->agent->referrer();
		$this->redirect( $redirect_to );
		return;
	}
}

/* End of file customers.php */
/* Location: ./application/controllers/admin/categories.php */