<?php
include_once( dirname(__FILE__) . '/hcWpBase.php' );
include_once( dirname(__FILE__) . '/hcWpPremiumPlugin.php' );

class hcWpBase4_Pro extends hcWpBase4
{
	var $premium = NULL;

	public function _init()
	{
		parent::_init();

		if( $this->hc_product )
		{
			$this->premium = new hcWpPremiumPlugin(
				$this->app,
				$this->hc_product,
				$this->slug,
				$this->full_path,
				$this->system_type
				);
			$this->premium->my_type = 'wp';
		}
	}

	public function admin_total_init()
	{
		register_setting( $this->app, $this->app . '_license_code' );
		register_setting( $this->app, $this->app . '_menu_title' );
	}

	public function admin_submenu()
	{
		parent::admin_submenu();
		$page = add_submenu_page(
			NULL,
			'',
			'',
			'update_plugins',
			$this->slug . '-license',
			array( $this, 'dev_options' )
			);
	}

	public function admin_menu()
	{
	}

	static function uninstall( $prefix )
	{
		hcWpBase4::uninstall( $prefix );

		$current = array();
		$current['license_code'] = get_site_option( $prefix . '_license_code', '' );
		$installation_id = '';

	// delete options
		delete_site_option( $prefix . '_license_code' );
		delete_site_option( $prefix . '_menu_title' );

	// deregister license code
		$my_url = get_admin_url() . 'admin.php?page=' . $prefix;
	// strip http
		$my_url = preg_replace('#^https?://#', '', $my_url);

		if( defined('NTS_DEVELOPMENT') )
			$check_license_url = 'http://localhost/hitcode/customers/lic.php';
		else
			$check_license_url = 'http://www.hitcode.com/customers/lic.php';

		$check_url = 
			$check_license_url . 
			'?action=dereg' . 
			'&code=' . $current['license_code'] . 
			'&iid=' . $installation_id . 
			'&url=' . urlencode($my_url);

		wp_remote_get(
			$check_url,
			array(
				'timeout'	=> 5,
				)
			);
		}

	public function dev_options()
	{
		$current = array();
		$current['license_code'] = get_site_option( $this->app . '_license_code', '' );
		$current['menu_title'] = get_site_option( $this->app . '_menu_title', ucfirst($this->app) );

		$my_url = get_admin_url() . 'admin.php?page=' . $this->slug;
	// strip http
		$my_url = preg_replace('#^https?://#', '', $my_url);
		$installation_id = '';

		$plugin_data = get_plugin_data( $this->full_path );
		$installed_version = $plugin_data['Version'];

		if( defined('NTS_DEVELOPMENT') )
			$check_license_url = 'http://localhost/hitcode/customers/lic.php';
		else
			$check_license_url = 'http://www.hitcode.com/customers/lic.php';

		if( isset($_POST[$this->app . '_submit']) )
		{
			if( isset($_POST[$this->app]) )
			{
				foreach( (array)$_POST[$this->app] as $key => $value )
				{
					$option_name = $this->app . '_' . $key;
					update_site_option( $option_name, $value );
				}

				$current['license_code'] = get_site_option( $this->app . '_license_code', '' );
				$current['menu_title'] = get_site_option( $this->app . '_menu_title', ucfirst($this->app) );
			}
		}

		$check_url = 
			$check_license_url . 
			'?code=' . $current['license_code'] . 
			'&iid=' . $installation_id . 
			'&ver=' . $installed_version . 
			'&prd=' . urlencode($this->hc_product) . 
			'&url=' . urlencode($my_url);
//		echo '<br><br>check url = "' . $check_url . '"<br>';

		// spaghetti starts here
?>

<div class="wrap">
<h2><?php echo ucfirst($this->app); ?> Options</h2>

<?php if( isset($_POST[$this->app . '_submit']) ) : ?>
	<div id="message" class="updated fade">
		<p>
			<?php _e( 'Settings Saved', 'my' ) ?>
		</p>
	</div>
<?php endif; ?>

<form method="post" action="">
	<?php settings_fields( $this->app ); ?>
	<?php //do_settings_sections( $this->app ); ?>
	<table class="form-table">
		<tr valign="top">
		<th scope="row">Menu Title</th>
		<td><input type="text" name="<?php echo $this->app; ?>[menu_title]" value="<?php echo esc_attr( $current['menu_title'] ); ?>" /></td>
		</tr>

		<tr valign="top">
		<th scope="row">License Code</th>
		<td>
			<input type="text" name="<?php echo $this->app; ?>[license_code]" value="<?php echo esc_attr( $current['license_code'] ); ?>" />
			<?php if( strlen($current['license_code']) ) : ?>
				<div style="margin: 1em 0;" id="hc-license-status">
					Checking license ...
				</div>
			<?php endif; ?>
		</td>
		</tr>

		<tr valign="top">
		<th scope="row">&nbsp;</th>
		<td>
			<input name="<?php echo $this->app; ?>_submit" type="submit" class="button-primary" value="Save" />
		</td>
		</tr>

	</table>
</form>
</div>

<?php if( strlen($current['license_code']) ) : ?>
<script>
jQuery(document).ready( function()
{
	jQuery.getScript( "<?php echo $check_url; ?>" )
		.done( function(script, textStatus)
		{
			var display_this = "<div class=\"";
//			display_this += ntsLicenseStatus ? "hitcode-license-status-ok" : "hitcode-license-status-error";
			display_this += "\">";
			display_this += ntsLicenseText;
			display_this += "</div>";

			jQuery('#hc-license-status').html( display_this );
		})
		.fail( function(jqxhr, settings, exception)
		{
			alert( "Error getting JavaScript" );
		});
});
</script>
<?php endif; ?>

<?php
	}
}
?>