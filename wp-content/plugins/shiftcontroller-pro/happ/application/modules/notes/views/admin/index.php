<?php
$access_levels = $this->access_manager->access_levels( 'note_' . $parent_class );
?>
<?php foreach( $entries as $e ) : ?>
	<?php
	$can = $this->access_manager->can_edit( $e );
	$this->hc_time->setTimestamp( $e->created );
	?>

	<div class="alert alert-none">
		<?php if( $can ) : ?>
			<?php echo ci_anchor( array('notes/admin/delete', $e->id), '&times;', 'class="close hc-confirm text-danger" title="' . lang('common_delete') . '"' ); ?>
		<?php endif; ?>
		<ul class="list-unstyled">
			<li>
				<strong><?php echo $this->hc_time->formatFull(); ?></strong>
			</li>
			<li>
				<i class="fa fa-user"></i> <?php echo $e->author->get()->title(); ?>
			</li>
			<li>
				<em>
				<?php echo $e->content; ?>
				</em>
			</li>
			<?php if( $can && (count($access_levels) > 1) ) : ?>
				<li class="text-muted">
					<?php echo lang('common_who_can_see'); ?>: <strong><?php echo $access_levels[ $e->access_level ]; ?></strong>
				</li>
			<?php endif; ?>
		</ul>
	</div>
<?php endforeach; ?>

<dl>
	<dt>
		<?php echo lang('common_add_note'); ?>
	</dt>
	<dd>
		<?php
		echo form_open(
			join('/', array(
				'notes/admin/add',
				$parent_class,
				$parent_id)
				),
			array(
				'class' => 'form-horizontal form-condensed'
				)
			);
		?>
		<?php
		echo hc_form_input( 
			array(
				'name'	=> 'notes',
				'type'	=> 'textarea',
				'rows'	=> 3
				),
			array(),
			array(),
			FALSE
			);
		?>

		<?php if( count($access_levels) > 1 ) : ?>
			<p>
				<?php echo lang('common_who_can_see'); ?>
				<br>
				<?php
				echo $this->hc_form->input(
					array(
						'name'		=> 'access_level',
						'type'		=> 'dropdown',
						'options'	=> $access_levels,
						)
					);
				?>
			</p>
		<?php endif; ?>

		<div>
		<?php echo form_submit( array('name' => 'submit', 'class' => 'btn btn-primary'), lang('common_add')); ?>
		</div>
		<?php echo form_close(); ?>
	</dd>
</dl>