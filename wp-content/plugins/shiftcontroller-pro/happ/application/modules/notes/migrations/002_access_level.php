<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_notes_access_level extends MY_Migration {
	public function up()
	{
		if( ! $this->db->field_exists('access_level', 'notes') )
		{
			$this->dbforge->add_column(
				'notes',
				array(
					'access_level' => array(
						'type'		=> 'TINYINT',
						'null'		=> FALSE,
						'default'	=> 0,
						),
					)
				);
		}
	}

	public function down()
	{
	}
}