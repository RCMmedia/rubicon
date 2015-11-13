<?php
class Availability_HC_Model extends MY_model
{
	var $table = 'availability';
	var $default_order_by = array('date_start' => 'DESC');

	var $has_one = array(
		'user' => array(
			'class'			=> 'user',
			'other_field'	=> 'availability',
			)
		);

	const TYPE_UNAVAILABLE = 1;
	const TYPE_PREFERRED = 2;

	var $validation = array(
		'date_start'	=> array('required', 'trim'),
		'date_end'		=> array('required', 'trim', 'check_date_end'),
		'end'			=> array('required', 'check_time'),
		'type'			=> array(
			'required',
			'enum' => array(
				self::TYPE_UNAVAILABLE,
				self::TYPE_PREFERRED,
				)
			),
		);

	public function valid_for_date( $date ){
		$return = FALSE;

		if( $this->date_end < $date ){
			return $return;
		}
		if( $this->date_start > $date ){
			return $return;
		}

		$dates = $this->get_dates();
		if( in_array($date, $dates) ){
			$return = TRUE;
		}

		return $return;
	}

	public function get_dates()
	{
		$date_input = HC_Html_Factory::input('recurring_date');
		$date_value = $date_input->unserialize( $this->details, 'no-dates' );
		$date_value['datestart'] = $this->date_start;
		$date_value['dateend'] = $this->date_end;
		$date_input->set_value( $date_value );
		$return = $date_input->dates();
		return $return;
	}

	public function _check_date_end( $field )
	{
		$return = ( $this->date_end >= $this->date_start ) ? TRUE : FALSE;
		if( ! $return ){
			$return = HCM::__('The end date should be after the start date');
		}
		return $return;
	}

	public function _check_time( $field )
	{
		$return = ( $this->end != $this->start ) ? TRUE : FALSE;
		if( ! $return ){
			$return = HCM::__('The end time should differ from the start time');
		}
		return $return;
	}
}