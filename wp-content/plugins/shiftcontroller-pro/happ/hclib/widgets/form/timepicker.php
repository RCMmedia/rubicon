<?php
class HC_Form_Input_Timepicker extends HC_Form_Input_Text
{
	function render()
	{
		$name = $this->name();
		$value = $this->value();
		$id = 'nts-' . $name;

		$t = HC_Lib::time();
		$t->setNow();
		$t->setStartDay();
		
		if( $value ){
			$t->modify('+' . $value . ' seconds');
			// $value = $t->formatTime();
		}

		$out = HC_Html_Factory::widget('container');

	/* hidden field to store our value */
		$hidden = HC_Html_Factory::input('hidden')
			->set_name( $name )
			->set_value( $value )
			->set_id($id)
			;

		$attr = $this->attr();
		foreach( $attr as $k => $v ){
			if( ! in_array($k, array('disabled','readonly')) ){
				continue;
			}
			$hidden->add_attr($k, $v);
		}

		$out->add_item( $hidden );

	/* text field to display */
		$display_name = $name . '_display';
		$display_id = 'nts-' . $display_name;

		$text = HC_Html_Factory::input('text')
			->set_name( $display_name )
			->set_id($display_id)
			->add_attr('size', 7)
			->add_attr('class', 'hc-timepicker')
			// ->add_attr( 'style', 'width: 8em' )
			;

		if( strlen($value) ){
			$display_value = $t->formatTime();
			$text->set_value( $display_value );
		}

		foreach( $attr as $k => $v ){
			$text->add_attr($k, $v);
		}

		$out->add_item( $text );

		$return = $this->decorate( $out->render() );
		return $return;
	}
}
