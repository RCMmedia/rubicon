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
Version: 3.0.3
Author URI: http://www.hitcode.com/
Text Domain: shiftcontroller
*/

if( file_exists(dirname(__FILE__) . '/db.php') )
{
	$nts_no_db = TRUE;
	include_once( dirname(__FILE__) . '/db.php' );
}

if( defined('NTS_DEVELOPMENT') )
	$happ_path = NTS_DEVELOPMENT;
else
	$happ_path = dirname(__FILE__) . '/happ';

include_once( $happ_path . '/hclib/hcWpBase.php' );
include_once( $happ_path . '/hclib/hcWpPremiumPlugin.php' );

register_uninstall_hook( __FILE__, array('ShiftController_Pro', 'uninstall') );

class ShiftController_Pro extends hcWpBase4
{
	public function __construct()
	{
error_reporting( E_ERROR );
		parent::__construct(
//			strtolower(get_class()),
			'shiftcontroller',
			__FILE__,
			'sfc',
			'ci'
			);
		$this->query_prefix = '?/';
//		$this->deactivate_other( array('shiftcontroller.php') );
	}

	public function _init()
	{
		parent::_init();

error_reporting( E_ERROR );
		$this->premium = new hcWpPremiumPlugin(
			$this->app,
			$this->hc_product,
			$this->slug,
			$this->full_path,
			$this->system_type
			);
		$this->premium->my_type = 'wp';
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

	static function uninstall( $prefix = 'shiftcontroller', $watch_other = array() )
	{
		$prefix = 'shiftcontroller';
		$watch_other = array('shiftcontroller.php');
		hcWpBase4::uninstall( $prefix, $watch_other );
		hcWpPremiumPlugin::uninstall( $prefix );
	}
}

$sh = new ShiftController_Pro();
?>