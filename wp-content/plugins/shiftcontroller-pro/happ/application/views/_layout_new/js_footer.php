<?php
$conf = HC_App::app_conf();
$time_min = $conf->get('time_min');
$time_max = $conf->get('time_max');

$t = HC_Lib::time();
$time_format = $t->timeFormat();

$cal_language = array(
	'days'			=> array( HCM::__('Sun'), HCM::__('Mon'), HCM::__('Tue'), HCM::__('Wed'), HCM::__('Thu'), HCM::__('Fri'), HCM::__('Sat'), HCM::__('Sun') ),
	'daysShort'		=> array( HCM::__('Sun'), HCM::__('Mon'), HCM::__('Tue'), HCM::__('Wed'), HCM::__('Thu'), HCM::__('Fri'), HCM::__('Sat'), HCM::__('Sun') ),
	'daysMin'		=> array( HCM::__('Sun'), HCM::__('Mon'), HCM::__('Tue'), HCM::__('Wed'), HCM::__('Thu'), HCM::__('Fri'), HCM::__('Sat'), HCM::__('Sun') ),
	'months'		=> array( HCM::__('Jan'), HCM::__('Feb'), HCM::__('Mar'), HCM::__('Apr'), HCM::__('May'), HCM::__('Jun'), HCM::__('Jul'), HCM::__('Aug'), HCM::__('Sep'), HCM::__('Oct'), HCM::__('Nov'), HCM::__('Dec') ),
	'monthsShort'	=> array( HCM::__('Jan'), HCM::__('Feb'), HCM::__('Mar'), HCM::__('Apr'), HCM::__('May'), HCM::__('Jun'), HCM::__('Jul'), HCM::__('Aug'), HCM::__('Sep'), HCM::__('Oct'), HCM::__('Nov'), HCM::__('Dec') ),
	'today'			=> 'Today',
	'clear'			=> 'Clear',
	);

$cal_language_js_code = array();
foreach( $cal_language as $k => $v ){
	$cal_language_js_code_line = '';

	$cal_language_js_code_line .= $k . ': ';
	if( is_array($v) ){
		$cal_language_js_code_line .= '[';
		$cal_language_js_code_line .= join(', ', array_map(create_function('$v', 'return "\"" . $v . "\"";'), $v));
		$cal_language_js_code_line .= ']';
	}
	else {
		$cal_language_js_code_line .= '"' . $v . '"';
	}
	$cal_language_js_code[] = $cal_language_js_code_line;
}
$cal_language_js_code = join(",\n", $cal_language_js_code);

?>
<script language="JavaScript">
;(function($){
	$.fn.hc_datepicker.dates['en'] = {
<?php echo $cal_language_js_code; ?>
	};
}(jQuery));

;(function($){
	$.fn.hc_datepicker.defaults.autoclose = true;
}(jQuery));

;(function($){
	$.fn.hc_timepicker.defaults.appendTo = '#nts';
	$.fn.hc_timepicker.defaults.step = 5;
	$.fn.hc_timepicker.defaults.timeFormat = '<?php echo $time_format; ?>';
	$.fn.hc_timepicker.defaults.minTime = <?php echo $time_min; ?>;
	$.fn.hc_timepicker.defaults.maxTime = <?php echo $time_max; ?>;
//	$.fn.hc_timepicker.defaults.scrollDefault = <?php echo $time_min; ?>;
}(jQuery));

function hc_init_page2()
{
	jQuery('.hc-timepicker').hc_timepicker();
	jQuery('.hc-datepicker').hc_datepicker({
		})
		.on('changeDate', function(ev)
			{
			var dbDate = 
				ev.date.getFullYear() 
				+ "" + 
				("00" + (ev.date.getMonth()+1) ).substr(-2)
				+ "" + 
				("00" + ev.date.getDate()).substr(-2);

		// remove '_display' from end
			var display_id = jQuery(this).attr('id');
			var display_suffix = '_display';
			var value_id = display_id.substr(0, (display_id.length - display_suffix.length) );

			jQuery('#' + value_id).val( dbDate );
			});
}
</script>