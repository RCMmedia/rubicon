<?php
class Conflict_Availability_Preferred_HC_Model extends Conflict_HC_Model
{
	protected $type = 'availability_preferred';

	function get( $model )
	{
	/* if the shift within the preferred availability */
		$myclass = get_class();
		$return = array();

		if( $model->type == $model->_const('TYPE_TIMEOFF') ){
			return $return;
		}

		if( ! (strlen($model->start) && strlen($model->end)) ){
			return $return;
		}
		if( ! ($model->date && $model->date_end) ){
			return $return;
		}
		if( ! $model->user_id ){
			return $return;
		}

		$am = HC_App::model('availability');
		$am
			->where_related( 'user', 'id', $model->user_id )
			->where( 'type', $am->_const('TYPE_PREFERRED') )
			->where('date_end >=', $model->date)
			->where('date_start <=', $model->date_end)
			;
		$am->get_iterated_slim();

		$found_availability = FALSE;
		foreach( $am as $availability ){
			/* get dates of this availability */
			$this_dates = $availability->get_dates();
			foreach( $this_dates as $this_date ){
				$test = HC_App::model('shift');
				$test->date = $this_date;
				$test->start = $availability->start;
				$test->end = $availability->end;
				$test->validate();

				if( $test->date_end < $model->date ){
					continue;
				}
				if( $test->date > $model->date_end ){
					break;
				}
				if( $test->covers($model) ){
					$found_availability = TRUE;
					break;
				}
			}
			if( $found_availability ){
				break;
			}
		}

		if( ! $found_availability ){
			$conflict = new $myclass;

			$conflict_id = array($model->id);
			sort($conflict_id);
			$conflict_id = $this->type . '_' . join('_', $conflict_id);

			$conflict->id = $conflict_id;
			$conflict->shift_id = $model->id;
			// $conflict->details = $availability->id;
			$return[] = $conflict;
		}
		return $return;
	}
}