<?php
echo $this->hc_form->input(
	array(
		'name'	=> 'repeat',
		'type'	=> 'hidden'
		)
	);
/*
echo $this->hc_form->input(
	array(
		'name'		=> 'date_from',
		'type'		=> 'hidden',
		'default'	=> $date
		)
	);
*/
?>

<?php
$this_date = new Hc_time;
$this_date->setDateDb( $date );
$this_weekday = $this_date->getWeekday();

$weekdays_fields = array();
$wkds = array( 0, 1, 2, 3, 4, 5, 6 );
$wkds = $this_date->sortWeekdays( $wkds );

foreach( $wkds as $wkd )
{
	$wkd_field = array(
		'name'		=> 'custom_weekday[]',
		'type'		=> 'checkbox',
		'value'		=> $wkd,
		'default'	=> $this_weekday,
		);
	if( $wkd == $this_weekday )
	{
		$wkd_field['readonly'] = 'readonly';
	}

	$weekdays_fields[] = '<div class="checkbox-inline">';
	$weekdays_fields[] = 
		'<label>' . 
		$this->hc_form->input(
			$wkd_field
			) . 
		$this_date->formatWeekdayShort($wkd) .
		'</label>';
	$weekdays_fields[] = '</div>';
}
$weekdays_fields = join( ' ', $weekdays_fields );

$in_field = array(
	'name'		=> 'in_out_in',
	'type'		=> 'text',
	'default'	=> 2,
	'size'		=> 3,
	);
$out_field = array(
	'name'		=> 'in_out_out',
	'type'		=> 'text',
	'default'	=> 2,
	'size'		=> 3,
	);

$in_out_fields = array();
$in_out_fields[] = 
	$this->hc_form->input(
		$in_field
		) . ' ' . lang('time_days') . ' ' . lang('time_day_on')
		;
$in_out_fields[] = 
	$this->hc_form->input(
		$out_field
		) . ' ' . lang('time_days') . ' ' . lang('time_day_off')
		;
$in_out_fields = join( ' ', $in_out_fields );

$repeats = array(
	'daily'			=> lang('time_daily'),
	'weekday'		=> lang('time_every_weekday') . ' (' . $this_date->formatWeekdayShort(1) .  ' - ' . $this_date->formatWeekdayShort(5) . ')',
	'weekly'		=> lang('time_weekly') . ' (' . lang('time_every') . ' ' . $this_date->formatWeekdayShort() . ')',
	'weekly-custom'	=> 
					lang('time_weekly') . ' (' . lang('time_custom_days') . ')' . 
					'<div class="hc-radio-info">' .
					$weekdays_fields . 
					'</div>'
					,
	'in-out'	=> 
					'X ' . lang('time_days') . ' ' . lang('time_day_on') . ' / ' . 'Y ' . lang('time_days') . ' ' . lang('time_day_off') . 
					'<div class="hc-radio-info">' .
					$in_out_fields . 
					'</div>'
					,
	'monthly-day'	=> lang('time_monthly') . ' (' .  $this_date->formatWeekdayShort() . ': ' . lang('time_every') . ' ' . $this_date->formatWeekOfMonth() . ')',
	'monthly-day-end'	=> lang('time_monthly') . ' (' .  $this_date->formatWeekdayShort() . ': ' . lang('time_every') . ' ' . $this_date->formatWeekOfMonthFromEnd() . ')',
	'monthly-date'	=> lang('time_monthly') . ' (' . lang('time_day') . ' ' . $this_date->getDay() . ')',
	);
if( in_array($this_date->getWeekday(), array(0,6)) )
	unset( $repeats['weekday'] );

echo Hc_html::wrap_input(
	'',
	array(
		'',
		Hc_bootstrap::nav_tabs(
			array(
				'single'	=> lang('shift_repeat_no'),
				'multiple'	=> lang('shift_repeat_options'),
				),
			$this->hc_form->get_default('repeat'),
			'repeat',
			'',
			'style="margin: 0 0;"'
			)
		)
	);
?>

<?php
echo hc_bootstrap::tab_content(
	array(
		'single'	=> 
			Hc_html::wrap_input(
				lang('time_date'),
//				'<strong>' . $this_date->formatWeekdayShort() . ', ' . $this_date->formatDate() . '</strong>'
				$this->hc_form->build_input(
					array(
						'name'		=> 'date',
						'type'		=> 'date',
						'default'	=> $this_date->formatDate_Db(),
						'options'	=> array(
//							'startDate'	=> $date
							)
						)
					)
				),

		'multiple'	=> 
			Hc_html::wrap_input(
				lang('time_dates'),
				array( 
//					$this_date->formatWeekdayShort() . ', ' . $this_date->formatDate(),
					$this->hc_form->build_input(
						array(
							'name'		=> 'date_from',
							'type'		=> 'date',
							'default'	=> $this_date->formatDate_Db(),
							'options'	=> array(
								'startDate'	=> $date
								)
							)
						) ,
					' - ',
					$this->hc_form->build_input(
						array(
							'name'		=> 'date_to',
							'type'		=> 'date',
							'default'	=> $this_date->formatDate_Db(),
							'options'	=> array(
								'startDate'	=> $date
								)
							)
						)
					)
				) . 
			Hc_html::wrap_input(
				'',
				$this->hc_form->build_input(
					array(
						'name'		=> 'repeat_type',
						'type'		=> 'radio',
						'options'	=> $repeats,
						'default'	=> 'daily',
						'extra'		=> array(
							'class'	=> 'hc-radio-more-info'
							)
						)
					)
				)
		),
	$this->hc_form->get_default('repeat')
	);
?>