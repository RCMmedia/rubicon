<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notes_HC_Controller extends _Front_HC_Controller
{
	private $params = array();
	private $access_levels = array();

	function __construct()
	{
		parent::__construct();

		$note = HC_App::model('note');
		$this_user = $this->auth->user();
		if( $this_user->level > $this_user->_const('LEVEL_MANAGER') ){
			$access_levels = array(
				$note->_const('LEVEL_EVERYONE')		=> HCM::__('Everyone'),
				$note->_const('LEVEL_ALL_USERS')	=> HCM::__('Logged In Users'),
				$note->_const('LEVEL_OWNER')		=> HCM::__('Owner'),
				$note->_const('LEVEL_ADMIN')		=> HCM::__('Admin'),
				);
		}
		else {
			$access_levels = array(
				$note->_const('LEVEL_OWNER')		=> HCM::__('Owner'),
				);
		}
		$this->access_levels = $access_levels;
	}

	function get( $object, $user = NULL )
	{
		$return = array();

		$acl = HC_App::acl();
		if( ! $acl->set_object($object)->set_user($user)->can('notes::view') ){
			continue;
		}

		$object->note
			->include_related( 'author', array('id', 'first_name', 'last_name', 'active'), TRUE, TRUE )
			;
		$entries = $object->note->get();
		$entries = $acl->filter( $entries, 'view' );
		
		foreach( $entries as $e ){
			$return[] = $e;
		}

		return $return;
	}

	function get_text( $object, $user = NULL )
	{
		$return = array();
		if( ! is_object($object) ){
			return $return;
		}

		$notes = $this->get( $object, $user );
		if( $notes ){
			$label = sprintf(HCM::_n('%d Comment', '%d Comments', count($notes)), count($notes));
			$return[] = $label;

			foreach( $notes as $e ){
				$this_note = array();
				$this_note[] = $e->author->present_title(HC_PRESENTER::VIEW_RAW) . ' [' . $e->present_created(HC_PRESENTER::VIEW_TEXT) . ']' . ':';
				$this_note[] = $e->present_content(HC_PRESENTER::VIEW_TEXT);
				$return[] = $this_note;
			}
		}

		return $return;
	}

	function object_zoom_menubar( $object )
	{
		$acl = HC_App::acl();
		if( ! $acl->set_object($object)->can('notes::view') ){
			return;
		}

		$object->note
			->include_related( 'author', array('id', 'first_name', 'last_name', 'active'), TRUE, TRUE )
			;
		$entries = $object->note->get();
		$entries = $acl->filter( $entries, 'view' );
		$count = count($entries);

		if( (! $count) && (! $acl->set_object($object)->can('notes::add')) ){
			return;
		}

		return $this->render( 
			'notes/object_zoom_menubar',
			array(
				'object'	=> $object,
				'count'		=> $count
				)
			);
	}

	function delete( $id )
	{
		$note = HC_App::model('note');
		$note->get_by_id( $id );

		$acl = HC_App::acl();
		$can = $acl->set_object($note)->can('edit');

		if( $can ){
			if( $note->delete() ){
				$msg = HCM::__('Comment deleted');
				$this->session->set_flashdata( 'message', $msg );
			}
			else {
				$this->session->set_flashdata( 'error', $note->error->string );
			}

			$this->redirect( '-referrer-' );
			return;
		}
		else {
			$this->session->set_flashdata('message', 'You are not allowed to access this page');
			$this->redirect('');
			exit;
		}
	}

	function quickview( $object, $wrap = NULL )
	{
		$object_class = $object->my_class();
		$object_id = $object->id;

		if( $object->note_count ){
			$object->note
				->include_related( 'author', array('id', 'first_name', 'last_name', 'active'), TRUE, TRUE )
				;

			$entries = $object->note->get();

			$acl = HC_App::acl();
			$entries = $acl->filter( $entries, 'view' );

		/* render view */
			$this->layout->set_partial(
				'content', 
				$this->render( 
					'notes/quickview',
					array(
						'entries'		=> $entries,
						)
					)
				);

			$this->layout();
		}
	}

	function index( $object, $object_id = NULL )
	{
		if( is_object($object) ){
			$object_class = $object->my_class();
			$object_id = $object->id;
		}
		else {
			$object_class = $object;
			$object = HC_App::model($object_class)
				->where('id', $object_id)
				->get()
				;
		}

		$object->note
			->include_related( 'author', array('id', 'first_name', 'last_name', 'active'), TRUE, TRUE )
			;
		$entries = $object->note->get();

		$acl = HC_App::acl();
		$entries = $acl->filter( $entries, 'view' );

	/* form */
		$form = HC_Lib::form();
		$form->set_inputs(
			array(
				'notes'			=> 'textarea',
				'access_level'	=> 'select',
				)
			);

		$note = HC_App::model('note');
		$default_access_level = $note->_const('LEVEL_OWNER');

		$default_values = array(
			'access_level'	=> $default_access_level
			);

	/* extensions */
		$extensions = HC_App::extensions();
		$change_values = $extensions->run(
			'notes/insert/defaults'
			);
		foreach( $change_values as $change_array ){
			foreach( $change_array as $k => $v ){
				$default_values[$k] = $v;
			}
		}

		$form->set_values( $default_values );

	/* render view */
		$this->layout->set_partial(
			'content', 
			$this->render( 
				'notes/index',
				array(
					'access_levels'	=> $this->access_levels,
					'entries'		=> $entries,
					'parent_object'	=> $object,
					'form'			=> $form
					)
				)
			);

		$this->layout();
	}

	function add_form_inputs( $parent_object = NULL )
	{
		$acl = HC_App::acl();
		if( $parent_object ){
			if( ! $acl->set_object($parent_object)->can('notes::add') ){
				return;
			}
		}

		$form = HC_Lib::form();
		$form->set_inputs(
			array(
				'notes'			=> 'textarea',
				'access_level'	=> 'select',
				)
			);

		$note = HC_App::model('note');
		$default_access_level = $note->_const('LEVEL_OWNER');
		$default_values = array(
			'access_level'	=> $default_access_level
			);

	/* extensions */
		$extensions = HC_App::extensions();
		$change_values = $extensions->run(
			'notes/insert/defaults'
			);
		foreach( $change_values as $change_array ){
			foreach( $change_array as $k => $v ){
				$default_values[$k] = $v;
			}
		}

		$form->set_values( $default_values );
		return $this->render(
			'notes/add_form_inputs',
			array(
				'access_levels'	=> $this->access_levels,
				'form'			=> $form,
				)
			);
	}

	function api_insert( $post, $parent = NULL )
	{
		$notes = $post['notes'];

		$note = HC_App::model('note');
		$note->content = $notes;

		$relations = array(
			'author'	=> $this->auth->user(),
			);
		if( $parent ){
			$relations[ $parent->my_class() ] = $parent;
		}

		if( isset($parent) ){
			$access_levels = $this->access_levels;
			if( count($access_levels) == 1 ){
				$access_levels = array_keys( $access_levels );
				$access_level = $access_levels[0];
			}
			else {
				$access_level = $post['access_level'];
			}
		}
		else {
			$access_level = 0;
		}
		if( ! $access_level )
			$access_level = 0;
		$note->access_level = $access_level;
		if( $note->save($relations) ){
			$return = TRUE;
		}
		else {
			$return = $note->error->string;
		}

	/* extensions */
		$extensions = HC_App::extensions();
		$extensions->run(
			'notes/insert',
			$post
			);

		return $return;
	}

	function add()
	{
		$parent = NULL;
		$args = func_get_args();
		for( $ii = 0; $ii < count($args); $ii = $ii + 2 ){
			if( isset($args[$ii + 1]) ){
				$k = $args[$ii];
				$v = $args[$ii + 1];

				if( $v ){
					$parent_class = $k; 
					$parent = HC_App::model($parent_class);
					$parent->get_by_id( $v );
				}
			}
		}

		$result = $this->api_insert( $this->input->post(), $parent );

		if( $result === TRUE ){
			$msg = HCM::__('Comment added');
			$this->session->set_flashdata( 'message', $msg );
		}
		else {
			if( strlen($result) ){
				$this->session->set_flashdata( 'error', $result );
			}
		}

		$this->redirect( '-referrer-' );
		return;
	}
}

/* End of file customers.php */
/* Location: ./application/controllers/admin/categories.php */