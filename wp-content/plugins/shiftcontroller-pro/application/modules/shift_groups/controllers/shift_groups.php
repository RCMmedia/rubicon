<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shift_Groups_HC_Controller extends _Front_HC_controller
{
	private $params = array();
	protected $form = NULL;

	function __construct()
	{
		parent::__construct();

		$this->form = HC_Lib::form()
			// ->set_input( 'action', 'hidden' )
			// ->set_input( 'id', 'checkbox_set' )
			->set_input( 'status', 'radio' )
			->set_input( 'end', 'timepicker' )
			// ->set_input( 'end', 'time' )
			->set_input( 'start', 'timepicker' )
			// ->set_input( 'start', 'time' )
			->set_input( 'ids', 'hidden' )
			;
	}

	function shift_zoom_menubar( $object )
	{
		$return = '';
		if( ! $object->group_id ){
			return $return;
		}

		$group_count = $object->where('group_id', $object->group_id)->count();

		$group_id = $object->group_id;
		$shifts = array();
		if( $group_id > 0 ){
			$shifts = HC_App::model('shift')
				->where('group_id', $group_id)
				->get()
				;
		}

		$acl = HC_App::acl();
		$shifts = $acl->filter( $shifts, 'view' );
		$group_count = count( $shifts );

		return $this->render( 
			'shift_groups/shift_zoom_menubar',
			array(
				'count'	=> $group_count
				)
			);
	}

	function bulk()
	{
		$acl = HC_App::acl();
		$extensions = HC_App::extensions();
	/* if post supplied */
		$post = $this->input->post();

		if( isset($post['id']) ){
			$ids = $post['id'];
		}
		elseif( isset($post['ids']) ){
			$ids = explode( '|', $post['ids'] );
		}
		else {
			$ids = array();
		}

		// $action = isset($post['action']) ? $post['action'] : '';
		// if( $ids && $action ){
		if( $ids ){
			$model = HC_App::model('shift');
			$model->where_in('id', $ids)->get();
			$success_count = 0;

			$action = 'update';

		/* delete */
			if( isset($post['delete']) ){
				$action = 'delete';
				foreach( $model as $o ){
					if( ! $acl->set_object($o)->can('delete') ){
						continue;
					}
					if( $o->delete() ){
						$success_count++;
					}
				}
			}
		/* update */
			else {
				$this->form->grab( $post );
				$form_values = $this->form->values();
				foreach( $model as $o ){
					if( ! $acl->set_object($o)->can('edit') ){
						continue;
					}

					reset( $form_values );
					foreach( $form_values as $k => $v ){
						if( $v === NULL ){
							continue;
						}
						$o->{$k} = $v;
					}

					if( $o->save() ){
						$success_count++;
					}
					else {
						$errors = $o->errors();
					}
				}
			}

			switch( $action ){
				case 'delete':
					$msg = sprintf( HCM::_n('%d shift deleted', '%d shifts deleted', $success_count), $success_count );
					break;
				default:
					$msg = sprintf( HCM::_n('%d shift updated', '%d shifts updated', $success_count), $success_count );
					break;
			}

			if( $msg ){
				$this->session->set_flashdata( 
					'message',
					$msg
					);
			}

			foreach( $model as $o ){
				$extensions->run('shifts/update', $post, $o);
			}
		}

		$redirect_to = '-referrer-';

		$parent_refresh = array();
		foreach( $model as $o ){
			$this_parent_refresh = $o->present_calendar_refresh();
			$parent_refresh = array_merge($parent_refresh, $this_parent_refresh);
		}
		$parent_refresh = array_keys($parent_refresh);

		$this->redirect( $redirect_to, $parent_refresh );
	}

	function index( $object, $object_id = NULL )
	{
		if( $object_id === NULL ){
			$object_class = $object->my_class();
			$object_id = $object->id;
		}
		else {
			$object_class = $object;
			$object = HC_App::model($object_class)->get_by_id($object_id);
		}

		$entries = array();
		if( $object->group_id ){
			$entries = HC_App::model( $object_class );
			$entries
				->where( 'group_id', $object->group_id )
				->get()
				;
		}

	/* render view */
		$this->layout->set_partial(
			'content', 
			$this->render( 
				'shift_groups/index',
				array(
					'entries'	=> $entries,
					'object'	=> $object,
					'form'		=> $this->form,
					)
				)
			);
		$this->layout();
	}

	function form()
	{
		$args = hc_parse_args( func_get_args() );
		$content = isset($args['content']) ? $args['content'] : NULL;
		$count = isset($args['count']) ? $args['count'] : 0;

	/* render view */
		$this->layout->set_partial(
			'content', 
			$this->render( 
				'shift_groups/form',
				array(
					'form'			=> $this->form,
					'act_on_all'	=> 0,
					'content'		=> $content,
					'count'			=> $count,
					)
				)
			);

		$this->layout();
	}

	function formall()
	{
		$args = hc_parse_args( func_get_args() );
		$shifts = isset($args['shifts']) ? $args['shifts'] : array();

		$ids = array_map(create_function('$o', 'return $o->id;'), $shifts);

	/* render view */
		$this->layout->set_partial(
			'content', 
			$this->render( 
				'shift_groups/form',
				array(
					'form'			=> $this->form,
					'act_on_all'	=> 1,
					'ids'			=> $ids,
					'count'			=> count($ids),
					)
				)
			);

		$this->layout();
	}

	public function save( $model, $form )
	{
		$t = HC_Lib::time();
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
		foreach( $also_get as $ag ){
			$post[ $ag ] = $this->input->post( $ag );
		}
		$form->set_defaults( $post );

		$dates = array();
		if( $post['repeat'] == 'multiple' ){
			$t->setDateDb( $post['date_from'] );
			$rex_date = $post['date_from'];

			while( $rex_date <= $post['date_to'] ){
				$dates[] = $rex_date;
				switch( $post['repeat_type'] ){
					case 'daily':
						$t->modify( '+1 day' );
						break;
					case 'weekday':
						$t->modify( '+1 day' );
						while( in_array($t->getWeekday(), array(0,6)) )
							$t->modify( '+1 day' );
						break;
					case 'weekly':
						$t->modify( '+1 week' );
						break;
					case 'weekly-custom':
						$custom_weekday = $post['custom_weekday'];
						$t->modify( '+1 day' );
						while( ! in_array($t->getWeekday(), $custom_weekday) )
							$t->modify( '+1 day' );
						break;
					case 'monthly-day':
						$this_week = $t->getWeekOfMonth();
						$t->modify( '+4 weeks' );
						while( $t->getWeekOfMonth() != $this_week )
							$t->modify( '+1 week' );
						break;
					case 'monthly-day-end':
						$this_week = $this->hc_time->getWeekOfMonthFromEnd();
						$this->hc_time->modify( '+4 weeks' );
						while( $this->hc_time->getWeekOfMonthFromEnd() != $this_week )
							$this->hc_time->modify( '+1 week' );
						break;
					case 'monthly-date':
						$t->modify( '+1 month' );
						break;
					case 'in-out':
						$in_out_in = $post['in_out_in'];
						$in_out_out = $post['in_out_out'];
						if( ! isset($in_out_count) )
							$in_out_count = 1;
						if( $in_out_count < $in_out_in )
						{
							$t->modify( '+1 day' );
							$in_out_count++;
						}
						else
						{
							$in_out_count = 1;
							$t->modify( '+' . ($in_out_out+1) . ' day' );
						}
						break;
				}
				$rex_date = $t->formatDate_Db();
			}
		}
		else {
			$dates = array($model->date);
		}

		$model->date = $dates;

		if( count($dates) > 1 ) {
			/* set the shift group_id */
			$sm = HC_App::model('shift');
			$max_group_id = $sm->select_max('group_id')->get()->group_id;
			if( ! $max_group_id ){
				$max_group_id = 0;
			}
			$model->group_id = $max_group_id + 1;
		}

		$return = array( $model, $form );
		return $return;
	}
}

/* End of file customers.php */
/* Location: ./application/controllers/admin/categories.php */