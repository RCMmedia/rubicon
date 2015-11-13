<?php
class HC_Html_Widget_Calendar
{
	private $range = 'week'; // may be week or month
	private $date = '';
	private $end_date = '';
	private $content = array();
	private $wide_slot = TRUE;
	private $title = NULL;

	function __construct( $date = '' )
	{
		$t = HC_Lib::time();
		$t->setNow();
		$this->set_date( $t->formatDate_Db() );
	}

	public function set_title( $title )
	{
		$this->title = $title;
		return $this;
	}

	public function title()
	{
		return $this->title;
	}

	function dates()
	{
		$t = HC_Lib::time();

		$start_date = $this->date();
		$end_date = $this->end_date();

		if( $end_date ){
			$return = array();
			$t->setDateDb( $start_date );
			$rex_date = $t->formatDate_Db();
			while( $rex_date <= $end_date ){
				$return[] = $rex_date;
				$t->modify('+1 day');
				$rex_date = $t->formatDate_Db();
			}
		}
		else {
			$t->setDateDb( $start_date );
			$return = $t->getDates( $this->range() );
		}

		return $return;
	}

	function set_date_content( $date, $content )
	{
		$this->content[$date] = $content;
		return $this;
	}
	function date_content( $date )
	{
		return isset($this->content[$date]) ? $this->content[$date] : NULL;
	}

	function set_date( $date )
	{
		$this->date = $date;
		return $this;
	}
	function date()
	{
		return $this->date;
	}

	function set_end_date( $end_date )
	{
		$this->end_date = $end_date;
		return $this;
	}
	function end_date()
	{
		return $this->end_date;
	}

	function set_wide_slot( $wide_slot )
	{
		$this->wide_slot = $wide_slot;
		return $this;
	}
	function wide_slot()
	{
		return $this->wide_slot;
	}

	function set_range( $range )
	{
		$this->range = $range;
		return $this;
	}
	function range()
	{
		return $this->range;
	}

	function render()
	{
		$t = HC_Lib::time();
		$t->setDateDb( $this->date() );

		$start_date = $this->date();
		$end_date = $this->end_date();

		if( ! $end_date ){
			switch( $this->range() ){
				case 'week':
					$t->setDateDb( $this->date() );

					$t->setStartWeek();
					$start_date = $t->formatDate_Db();
					$t->setEndWeek();
					$end_date = $t->formatDate_Db();
					break;

				case 'month':
					$t->setDateDb( $this->date() );

					$t->setStartMonth();
					$start_date = $t->formatDate_Db();
					$t->setEndMonth();
					$end_date = $t->formatDate_Db();
					break;
			}
		}

		$t->setDateDb( $start_date );
		$month_matrix = $t->getMonthMatrix( $end_date );

		$slot_width = 1;
		$title = $this->title();

	/* wide slot */
		if( ($this->range() == 'week') && ($this->wide_slot()) ){
			$title = NULL;
			$slot_width = 3;
			$month_matrix = array( 
				array_slice($month_matrix[0], 0, 4),
				array_slice($month_matrix[0], 4)
				);
		}

		$out = HC_Html_Factory::element('div')
			->add_attr('class', 'cal')
			;
		if( $title ){
			// $out->add_attr('class', 'cal-title');
		}

		foreach( $month_matrix as $week => $days ){
			$grid = HC_Html_Factory::widget('grid')
				->add_attr('class', 'cal-row')
				->add_attr('class', 'flex-box')
				->add_attr('class', 'row-slim')
				->add_attr('class', 'flex-bordered')
				;

			if( $title ){
				$title_cell = HC_Html_Factory::element('div')
					// ->add_attr('class', 'thumbnail')
					->add_attr('class', 'squeeze-in')
					->add_attr('style', 'padding: 2px;')
					;

				$title_cell->add_child( $title );
				$grid->add_item( 
					$title_cell,
					2,
					array(
						'class'	=> array('hc-cal-day'),
						// 'style'	=> 'border: green 1px solid;',
						)
					);
			}

			foreach( $days as $rex_date ){
				$t->setDateDb( $rex_date );

				$day = HC_Html_Factory::element('div')
					// ->add_attr('class', 'thumbnail')
					->add_attr('class', 'squeeze-in')
					->add_attr('style', 'padding: 2px;')
					;

				$date_content = $this->date_content($rex_date);
				if( $date_content ){
					$day->add_child( $date_content );
				}
				else {
					$day = '';
				}
				$grid->add_item( 
					$day,
					$slot_width,
					array(
						'class'	=> array('hc-cal-day'),
						// 'class'	=> array('hc-flex-bordered'),
						'style'	=> 'border: green 1px solid;',
						)
					);
			}
			$out->add_child( $grid );
		}
		return $out->render();
	}
}
