<?php
$conflicts = $e->conflicts();
$notes = $e->note->get()->all;

/* CLASS */
$class = array();
$class[] = 'dropdown-toggle';
$class[] = 'alert';
$class[] = 'alert-condensed';

if( count($conflicts) )
	$class[] = 'alert-danger2';

if( $e->user_id )
{
	if( $e->status == SHIFT_MODEL::STATUS_ACTIVE )
		$class[] = 'alert-success';
	else
		$class[] = 'alert-info';
}
else
{
	if( $e->status == SHIFT_MODEL::STATUS_ACTIVE )
		$class[] = 'alert-danger';
	else
		$class[] = 'alert-warning';
}
$class = join( ' ', $class );

$this->hc_time->setDateDb( $e->date );
$date_view = $this->hc_time->formatDate();

$time_view = $this->hc_time->formatPeriodOfDay($e->start, $e->end)
?>

<?php if( count($entries) > 1 ) : ?>
	<div class="pull-right" style="margin: 0.5em 0.5em;">
		<?php
		echo $this->hc_form->input( 
			array(
				'name'	=> 'id[]',
				'type'	=> 'checkbox',
				'value'	=> $e->id,
				),
			FALSE
			);
		?>
	</div>
<?php endif; ?>

<div class="<?php echo $class; ?>">

<ul class="list-unstyled list-separated">
	<li class="dropdown">
		<i class="fa-fw fa fa-calendar-o"></i> 
		<a class="" href="#" data-toggle="dropdown">
			<?php echo $date_view; ?> <b class="caret"></b>
		</a>

		<?php
		$trade_menu = Modules::run('shift_trades/admin/trade_actions', $e);
		if( $trade_menu )
		{
			echo Hc_html::dropdown_menu($trade_menu);
		}
		?>
	</li>

	<li>
		<i class="fa-fw fa fa-clock-o"></i> <?php echo $time_view; ?>
	</li>

	<?php if( $location_count > 1 ) : ?>
		<li>
			<i class="fa-fw fa fa-home"></i> <?php echo $e->location->get()->title(); ?>
		</li>
	<?php endif; ?>

	<li>
		<i class="fa-fw fa fa-sign-out text-danger"></i> <?php echo $e->user->get()->full_name(); ?>
	</li>

	<?php if( count($notes) > 0 ) : ?>
		<?php
		$notes_text = array();
		reset( $notes );
		foreach( $notes as $n )
		{
			$notes_text[] = $n->content;
		}
		$notes_text = join( ";<br>", $notes_text );
		?>
		<li style="font-style: italic;">
			<i class="fa-fw fa fa-comment-o"></i> 
			<?php echo $notes_text; ?>
		</li>
	<?php endif; ?>

</ul>

</div>