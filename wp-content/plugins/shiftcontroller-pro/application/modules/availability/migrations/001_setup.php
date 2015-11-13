<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_availability_setup extends MY_Migration {
	public function up()
	{
		if( $this->db->table_exists('availability') )
			return;

		// conf
		$this->dbforge->add_field(
			array(
				'id' => array(
					'type' => 'INT',
					'null' => FALSE,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
					),
				'user_id' => array(
					'type' => 'INT',
					'null' => FALSE,
					'default' => 0,
					),
				'start' => array(
					'type' => 'INT',
					'null' => FALSE,
					),
				'end' => array(
					'type' => 'INT',
					'null' => FALSE,
					),
				'type' => array(
					'type'		=> 'TINYINT',
					'null'		=> FALSE,
					'default'	=> 1, // AVAILABILITY_HC_MODEL::TYPE_UNAVAILABLE,
					),
				'date_start' => array(
					'type'		=> 'INT',
					'null'		=> FALSE,
					),
				'date_end' => array(
					'type'		=> 'INT',
					'null'		=> FALSE,
					),
				'details' => array(
					'type'		=> 'VARCHAR(255)',
					'null'		=> FALSE,
					'default'	=> '',
					),
				)
			);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('availability');
	}

	public function down()
	{
	}
}