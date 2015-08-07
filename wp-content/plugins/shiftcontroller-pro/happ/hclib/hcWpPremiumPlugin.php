<?php
$checker_file = dirname(__FILE__) . '/wp-plugin-update-checker/plugin-update-checker.php';
if( (! class_exists('hcWpPremiumPlugin')) && file_exists($checker_file) )
{
include_once( $checker_file );

class hcWpPremiumPlugin
{
	var $system_type = 'nts'; // or ci
	var $slug = '';
	var $app = '';
	var $my_type = 'own'; // or wp
	var $checker = NULL;
	var $hc_product = '';

	function __construct( 
		$app,			// app
		$product,		// hitcode product name
		$slug,			// slug in wp admin
		$full_path,		// full path of the original plugin file
		$system_type	// nts or ci
		)
	{
		$this->system_type = $system_type;
		$this->app = $app;
		$this->slug = $slug;
		$this->hc_product = $product;

		if( defined('NTS_DEVELOPMENT') )
		{
			$check_url = 'http://localhost/hitcode/customers/update.php?';
		}
		else
		{
			$check_url = 'http://www.hitcode.com/customers/update.php?';
		}
		$check_url .= '&slug=' . $product;

		$check_period = 24;

		$this->checker = new PluginUpdateChecker_1_5 (
			$check_url,
			$full_path,
			$product,
			$check_period
			);

		$this->checker->addQueryArgFilter( array($this, 'give_code_to_checker') );

	// add more links in plugin list
		add_action( 'after_plugin_row_' . plugin_basename($full_path), array($this, 'license_details'), 10, 3 );

		if( is_multisite() )
			$filter_name = 'network_admin_plugin_action_links_' . plugin_basename($full_path);
		else
			$filter_name = 'plugin_action_links_' . plugin_basename($full_path);
		add_filter( $filter_name, array($this, 'license_link') );

	// reset check period after license code change
		$option_name = $this->app . '_license_code';
		add_action( 'update_site_option_' . $option_name, array($this, 'reset_license') );
	}

	public function give_code_to_checker( $args )
	{
		$args['code'] = $this->get_license();

		$my_url = get_admin_url() . 'admin.php?page=' . $this->slug;
	// strip http
		$my_url = preg_replace('#^https?://#', '', $my_url);
		$args['url'] = $my_url;

		return $args;
	}

	public function reset_license()
	{
		$option_name = 'external_updates-' . $this->hc_product;
		delete_site_option( $option_name );
	}

	static function reset_license_code( $product )
	{
		$option_name = 'external_updates-' . $product;
		delete_site_option( $option_name );
	}

	function license_details( $plugin_file, $plugin_data, $status )
	{
		if( ! current_user_can('update_plugins') )
			return;

		$license_code = $this->get_license();
		$download_url = '';
		if( $license_code )
		{
			$state = $this->checker->getUpdateState();
			$notice = isset($state->update->upgrade_notice) ? $state->update->upgrade_notice : '';
			$download_url = isset($state->update->download_url) ? $state->update->download_url : '';

			if( $notice && (! $download_url) )
			{
//				$notice = 'License error: ' . $notice;
			}
		}
		else
		{
			$notice = 'License is not set yet. ';
		}

		if( $notice )
		{
			$url = $this->get_license_link();
			$license_link = '<a href="' . $url . '">' . 'Enter license code to enable automatic updates' . '</a>';

			$return = array();
			$return[] = '<tr class="plugin-update-tr">';
			$return[] = '<td colspan="3" style="padding: 5px 0 0 0; border: 0;">';

			$return[] = '<style>';
			$return[] = '.plugin-update-tr .update-message.hitcode-license-status-ok {background-color: #efb;}';
			$return[] = '.plugin-update-tr .update-message.hitcode-license-status-ok:before {content: \'\\f147\'; color: #060;}';
			$return[] = '.plugin-update-tr .update-message.hitcode-license-status-error {background-color: #fdd;}';
			$return[] = '.plugin-update-tr .update-message.hitcode-license-status-error:before {content: \'\\f160\'; color: #600;}';
			$return[] = '</style>';

			if( $download_url )
			{
				$return[] = '<div class="update-message hitcode-license-status-ok">';
			}
			else
			{
				$return[] = '<div class="update-message hitcode-license-status-error">';
			}

			$return[] = $notice;

			if( ! $license_code )
			{
				if( current_user_can('update_plugins') )
				{
					$return[] = ' ' . $license_link;
//					$return[] = '<br>';
					$return[] = ' ';
				}
			}
			$return[] = '</div>';

			$return[] = '</td>';
			$return[] = '</tr>';
			$return = join( '', $return );
			echo $return;
		}
	}

	public function get_license()
	{
		$return = '';

		switch( $this->my_type )
		{
			case 'wp':
				$option_name = $this->app . '_license_code';
				$return = get_site_option( $option_name );
				break;

			case 'own':
				global $wpdb;
				$db_prefix = $GLOBALS['NTS_CONFIG'][$this->app]['DB_TABLES_PREFIX'];
				$return = NULL;

				switch( $this->system_type )
				{
					case 'ci':
						$mytable = $db_prefix . 'conf';
						$sql = "SELECT value FROM $mytable WHERE name='license_code'";
						$return = $wpdb->get_var( $sql );
						break;

					case 'nts':
						$mytable = $db_prefix . 'conf';
						$sql = "SELECT value FROM $mytable WHERE name='licenseCode'";
						$return = $wpdb->get_var( $sql );
						break;
				}
				break;
		}

		return $return;
	}

	public function get_license_link()
	{
		switch( $this->my_type )
		{
			case 'wp':
				$license_url = $this->slug . '-license';
				break;

			case 'own':
				switch( $this->system_type )
				{
					case 'ci':
						$license_url = $this->slug . '&/license/admin';
						break;

					case 'nts':
						$license_url = $this->slug . '&nts-panel=admin/conf/upgrade';
						break;
				}
				break;
		}

		if( is_multisite() )
		{
			$return = add_query_arg( 
				array(
					'page' => $license_url,
					),
				network_admin_url('admin.php')
				);
		}
		else
		{
			$return = add_query_arg( 
				array(
					'page' => $license_url,
					),
				admin_url('admin.php')
				);
		}
		return $return;
	}

	public function license_link( $links )
	{
		$url = $this->get_license_link();

		$link_title = __( 'License Code' );
		switch( $this->my_type )
		{
			case 'wp':
				$link_title = __( 'License & Options' );
				break;
			case 'own':
				$link_title = __( 'License Code' );
				break;
		}

		$license_link = '<a href="' . $url . '">' . $link_title . '</a>';
		array_unshift( $links, $license_link );
		return $links;
	}
}
}