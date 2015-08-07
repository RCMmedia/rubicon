<?php
/**
 * @package ShiftController Pro
 * @author HitCode
 */
/*
Plugin Name: ShiftController Pro
Plugin URI: http://www.shiftcontroller.com/
Description: Staff scheduling plugin, Pro version.
Author: HitCode
Version: 2.4.1
Author URI: http://www.hitcode.com/
*/

if( file_exists(dirname(__FILE__) . '/db.php') )
{
	$nts_no_db = TRUE;
	include_once( dirname(__FILE__) . '/db.php' );
}

//if( defined('NTS_DEVELOPMENT') )
//	$happ_path = NTS_DEVELOPMENT;
//else
	$happ_path = dirname(__FILE__) . '/happ';
include_once( $happ_path . '/hclib/hcWpBase_Pro.php' );

register_uninstall_hook( __FILE__, array('ShiftController_Pro', 'uninstall') );

class ShiftController_Pro extends hcWpBase4_Pro
{
	public function __construct()
	{
		parent::__construct(
//			strtolower(get_class()),
			'shiftcontroller',
			__FILE__,
			'sfc',
			'ci'
			);
		$this->query_prefix = '?/';
		$this->deactivate_other( array('shiftcontroller.php') );
	}

	public function admin_menu()
	{
		parent::admin_menu();

		$menu_title = get_site_option( $this->app . '_menu_title', ucfirst($this->app) );
		$page = add_menu_page(
			$menu_title,
			$menu_title,
			'read',
			$this->slug,
			array( $this, 'admin_view' ),
			'dashicons-calendar'
			);
	}

	static function uninstall( $prefix = 'shiftcontroller' )
	{
		$prefix = 'shiftcontroller';
		hcWpBase4_Pro::uninstall( $prefix );
	}
}

$sh = new ShiftController_Pro();
?>