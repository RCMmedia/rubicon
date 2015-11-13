<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_release_setup extends MY_Migration {
	public function up()
	{
		if( ! $this->db->field_exists('release_request', 'shifts') ){
			$this->dbforge->add_column(
				'shifts',
				array(
					'release_request' => array(
						'type'		=> 'TINYINT',
						'null'		=> TRUE,
						// 'default'	=> 0,
						),
					)
				);

			if( $this->db->field_exists('has_trade', 'shifts') ){
				$this->db
					->where('has_trade', 1)
					->update( 'shifts', 
						array(
							'release_request'	=> 1,
							)
						)
					;
			
				$this->dbforge->drop_column(
					'shifts',
					'has_trade'
					);

				if( $this->db->table_exists('logaudit') ){
					$this->db->where('property_name', 'has_trade');
					$this->db->where('object_class', 'shift');
					$this->db->delete('logaudit');
				}
			}
		}
	}

	public function down()
	{
	}
}
