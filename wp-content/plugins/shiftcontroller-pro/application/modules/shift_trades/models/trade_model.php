<?php
class Trade_model extends MY_model
{
	const STATUS_PENDING = 1;	// just after the staff listed the shift as available for trade
	const STATUS_APPROVED = 2;	// trade request approved by the admin
	const STATUS_ACCEPTED = 3;	// trade was accepted by another staff
	const STATUS_DENIED = 4;	// trade request denied by the admin
	const STATUS_COMPLETED = 5;	// the staff has been reassigned

	var $table = 'trades';
	var $has_one = array(
//		'shift' => array(
//			'class'			=> 'shift_model',
//			'other_field'	=> 'trade',
//			),
//		'to_user' => array(
//			'class'			=> 'user_model',
//			'other_field'	=> 'trade',
//			)
		);

	var $validation = array(
		'shift'	=> array(
			'label'		=> 'lang:shift',
			'rules'		=> array('required'),
			),
		'status'	=> array(
			'label'	=> 'lang:trade_status',
			'rules'	=> array(
				'enum' => array(
					self::STATUS_PENDING,
					self::STATUS_APPROVED,
					self::STATUS_DENIED,
					self::STATUS_ACCEPTED,
					self::STATUS_COMPLETED,
					)
				),
			),
		);

	var $prop_text = array(
		'status'	=> array(
			self::STATUS_PENDING	=> array( 'lang:trade_status_pending',		'important' ),
			self::STATUS_APPROVED	=> array( 'lang:trade_status_approved',		'warning' ),
			self::STATUS_DENIED		=> array( 'lang:trade_status_denied',		'important' ),
			self::STATUS_ACCEPTED	=> array( 'lang:trade_status_accepted',		'success' ),
			self::STATUS_COMPLETED	=> array( 'lang:trade_status_completed',	'success' ),
			),
		);

	var $my_fields = array(
		array(
			'name'		=> 'status',
			'label'		=> 'lang:trade_status',
			'type'		=> 'dropdown',
			),
		array(
			'name'		=> 'shift',
			'label'		=> 'lang:shift',
			),
		array(
			'name'		=> 'to_user',
			'label'		=> 'lang:user_level_staff',
			),
		);

	public function id_label()
	{
		return $this->prop_text('status', TRUE);
	}

	protected function _after_save()
	{
		$changes = $this->get_changes();

	/* reassign staff for the shift */
		if( isset($changes['status']) && ($this->status == TRADE_MODEL::STATUS_COMPLETED) )
		{
			$this->to_user->get();
			$relation = array(
				'user'	=> $this->to_user
				);
			$this->shift->get();
			$this->shift->save( $relation );
		}
	}
}