<?php
?>

<p>
<?php echo lang('shift_group'); ?>
<p>
<?php echo lang('common_delete'); ?>:

<?php echo form_open( join('/', array($this->conf['path'], 'delete', $object->id)), array('class' => 'form-horizontal form-condensed')); ?>

<p>
<label class="radio">
	<input type="radio" name="which" id="which" value="this_date" checked>
	<?php echo lang('shift_group_this_date'); ?> [<?php $this->hc_time->setDateDb($object->date); echo $this->hc_time->formatDate(); ?>]
</label>

<label class="radio">
	<input type="radio" name="which" id="which" value="upcoming">
	<?php echo lang('shift_group_upcoming'); ?> (<?php echo $upcoming_count; ?>) [<?php $this->hc_time->setDateDb($object->date); echo $this->hc_time->formatDate(); ?> - <?php $this->hc_time->setDateDb($max_date); echo $this->hc_time->formatDate(); ?>]
</label>

<label class="radio">
	<input type="radio" name="which" id="which" value="all">
	<?php echo lang('shift_group_all'); ?> (<?php echo $count; ?>) [<?php $this->hc_time->setDateDb($min_date); echo $this->hc_time->formatDate(); ?> - <?php $this->hc_time->setDateDb($max_date); echo $this->hc_time->formatDate(); ?>]
</label>

<p>
<?php echo form_submit( array('name' => 'submit', 'class' => 'btn btn-danger hc-confirm'), lang('common_delete')); ?>
<?php echo form_close(); ?>