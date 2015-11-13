<?php
class Wordpress_User_HC_Model
{
	private $count = array(
		'success'	=> 0,
		'archived'	=> 0,
		);

	public function get_last_count( $what = 'success' )
	{
		$return = 0;
		if( isset($this->count[$what]) ){
			$return = $this->count[$what];
		}
		return $return;
	}

	public function wp_roles()
	{
		global $wp_roles;
		if( ! isset($wp_roles) ){
			$wp_roles = new WP_Roles();
		}
		$return = $wp_roles->get_names();
		return $return;
	}

	public function sync_all( $config_roles = array() )
	{
		$this->count = array(
			'success'	=> 0,
			'archived'	=> 0,
			);

		$result = TRUE;
		$processed_users = array();

		$wum = HC_App::model('wordpress_user');
		$wordpress_roles = $wum->wp_roles();

		reset( $wordpress_roles );
		foreach( $wordpress_roles as $role_value => $role_name ){
			if( ! isset($config_roles['role_' . $role_value]) ){
				continue;
			}
			$our_level = $config_roles['role_' . $role_value];
			if( ! $our_level ){
				continue;
			}

			$args = array(
				'role'	=> $role_value,
				);
			$wordpress_users = get_users( $args );
			foreach( $wordpress_users as $wuser ){
				if( (! $role_value) && $wuser->roles ){
					continue;
				}
				$this_result = $this->sync( $wuser->ID, $our_level );
				if( $this_result === TRUE ){
					$processed_users[] = $wuser->ID;
					$this->count['success']++;
				}
				else {
					if( ! is_array($result) ){
						$result = array();
					}
					$result[$wuser->ID] = $this_result;
				}
			}
		}

	/* those that are deleted in WordPress make archived */
		$um = HC_App::model('user');
		if( ! $processed_users ){
			$processed_users = array(0);
		}
		$um->where_not_in( 'id', $processed_users );
		$um->update( 'active', $um->_const('STATUS_ARCHIVE') );
		$archived_count = $um->db->affected_rows();
		$this->count['archived'] = $archived_count;

		return $result;
	}

	public function sync( $id, $force_level = NULL )
	{
		$wuser = get_user_by( 'id', $id );

		$user = HC_App::model('user');
		$user
			->where('id', $id)
			->get()
			;
		$is_new = $user->exists() ? FALSE : TRUE;

		if( $is_new ){
			$user->id = $id;
			if( $force_level ){
				$user_level = $force_level;
			}
			else {
				/* check new user level */
				$app_conf = HC_App::app_conf();
				$wp_role = ( $wuser->roles && is_array($wuser->roles) && isset($wuser->roles[0]) ) ? $wuser->roles[0] : '';

				$k = 'wordpress_' . 'role_' . $wp_role;
				$user_level = $app_conf->get( $k );
				if( $wp_role == 'administrator' ){
					$user_level = $user->_const('LEVEL_ADMIN');
				}
			}

			if( ! $user_level )
				return;

			$user->level = $user_level;
			$password = hc_random();
			$user->password = $password;
			$user->confirm_password = $password;
		}
		else {
			if( $force_level ){
				$user->level = $force_level;
			}
		}

		if( $wuser->user_firstname ){
			$user->first_name = $wuser->user_firstname;
			$user->last_name = $wuser->user_lastname;
		}
		else {
			$user->first_name = $wuser->display_name;
		}

		if( $wuser->user_email ){
			if( $is_new OR ($wuser->user_email != $user->email) ){
				// check if this email already exists
				$um = HC_App::model('user');
				$um
					->where( 'email', $wuser->user_email )
					->get()
				;

				if( $um->exists() )	{
					if( $is_new ){
						// update id in our table
						$um->where('id', $um->id)->update('id', $id);
						$user->id = $id;
					}
					else {
						$user->id = $um->id;
					}
					$is_new = FALSE;
				}
				$user->email = $wuser->user_email;
			}
		}

		$user->active = $user->_const('STATUS_ACTIVE');
		$user->remove_validation( 'email' );
		$user->remove_validation( 'username' );
		$user->remove_validation( 'confirm_password' );

/*
		if( $is_new ){
			if( $user->save_as_new() ){
				$return = TRUE;
			}
			else {
				$return = $user->errors();
			}
		}
		else {
			if( $user->save() ){
				$return = TRUE;
			}
			else {
				$return = $user->errors();
			}
		}
*/
		if(
			( $is_new && $user->save_as_new() )
			OR
			( (! $is_new) && $user->save() )
			){
			$return = TRUE;
		}
		else {
			$return = $user->errors();
		}
		return $return;
	}
}
