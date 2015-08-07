<?php
echo form_open(
	join('/', array($this->conf['path'], 'action')),
	array(
		'class'	=> 'form-horizontal form-condensed',
		)
	);
?>
<?php
$menu = array(
	'approve'	=> array(
		'title'	=> '<i class="fa fa-check text-success"></i> ' . lang('common_approve'),
		'class'	=> 'hc-form-submit',
		'href'	=> '#approve',
		),
	'deny'		=> array(
		'title'	=> '<i class="fa fa-thumbs-o-down text-warning"></i> ' . lang('common_reject'),
		'class'	=> 'hc-form-submit',
		'href'	=> '#reject',
		),
	);
?>

<?php if( count($entries) > 1 ) : ?>
	<ul class="nav nav-pills">
		<li>
			<a href="#" class="hc-all-checker" data-collect="id[]">
				<?php echo lang('common_check_all'); ?>
			</a>
		</li>

		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-wrench"></i> <?php echo lang('common_with_selected'); ?> <b class="caret"></b>
			</a>
			<?php
			echo Hc_html::dropdown_menu($menu);
			?>
		</li>
	</ul>
<?php endif; ?>

<?php require( NTS_SYSTEM_APPPATH . 'views/_boilerplate/index.php' ); ?>

<?php echo form_close(); ?>