<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Availability_HC_Controller extends _Front_HC_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function list_day()
	{
		$args = hc_parse_args( func_get_args(), TRUE );
		if( ! (isset($args['state'])) ){
			echo 'PARAMS MISSING IN availability/list_day<br>';
			return;
		}
		$state = $args['state'];
		if( ! (isset($state['staff']) && $state['staff']) ){
			return;
		}

		if( ! ( isset($state['range']) && ($state['range'] == 'day') )){
			return;
		}

		$user_ids = array();
		foreach( $state['staff'] as $uid ){
			$user_ids[] = $uid;
		}
		$user_ids = array_unique($user_ids);
		if( count($user_ids) > 1 ){
			return;
		}

		$model = HC_App::model('availability');
		// $model
			// ->include_related( 'user', array('id', 'email', 'first_name', 'last_name', 'active'), TRUE, TRUE )
			// ;
		$model
			->where_in_related( 'user', 'id', $user_ids )
			;
		$model->get();

		$entries = array();
		foreach( $model as $e ){
			if( $e->valid_for_date($state['date']) ){
				$entries[] = $e;
			}
		}

		$acl = HC_App::acl();
		$entries = $acl->filter( $entries, 'view' );

		$this->layout->set_partial(
			'content',
			$this->render( 
				'availability/list_day',
				array(
					'entries' 	=> $entries,
					'state' 	=> $state,
					)
				)
			);

		$this->layout();
	}

	public function user_zoom_menubar( $object )
	{
		$acl = HC_App::acl();
		if( ! $acl->set_object($object)->can('loginlog::view') ){
			// return;
		}
		return $this->render( 
			'availability/user_zoom_menubar',
			array(
				'object'	=> $object,
				)
			);
	}

	public function index()
	{
		$args = hc_parse_args( func_get_args(), TRUE );
		if( ! (isset($args['user'])) ){
			echo 'PARAMS MISSING IN availability/index<br>';
			return;
		}
		$user_id = is_object($args['user']) ? $args['user']->id : $args['user'];

		$model = HC_App::model('availability');
		$model
			->include_related( 'user', array('id', 'email', 'first_name', 'last_name', 'active'), TRUE, TRUE )
			;

		$model
			->where_related( 'user', 'id', $user_id )
			;
		$model->get();

		$user = HC_App::model('user')
			->where('id', $user_id)
			->get()
			;

		$acl = HC_App::acl();
		$entries = $acl->filter( $model, 'view' );

		$this->layout->set_partial(
			'content',
			$this->render( 
				'availability/index',
				array(
					'entries' 	=> $entries,
					'user' 		=> $user,
					)
				)
			);
		$this->layout();
	}
}

/* End of file customers.php */
/* Location: ./application/controllers/admin/categories.php */