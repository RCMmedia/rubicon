<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_notes_setup extends MY_Migration {
	public function up()
	{
		if( ! $this->db->table_exists('notes') )
		{
			$this->dbforge->add_field(
				array(
					'id' => array(
						'type' => 'INT',
						'null' => FALSE,
						'unsigned' => TRUE,
						'auto_increment' => TRUE
						),
					'content' => array(
						'type' => 'TEXT',
						'null' => FALSE,
						),
					'created' => array(
						'type' => 'INT',
						'null' => TRUE,
						),
			/* relationship fields */
					'author_id' => array(
						'type' => 'INT',
						'null' => TRUE,
						),
					)
				);
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->create_table('notes');
		}

	/* check if relationships required */
		$CI =& ci_get_instance();
		$modules_conf = $CI->config->item('modules');
		if( isset($modules_conf['notes']['relations']) && is_array($modules_conf['notes']['relations']) ){
			foreach( $modules_conf['notes']['relations'] as $rel ){
				if( ! $this->db->field_exists($rel, 'notes') ){
					$this->dbforge->add_column(
						'notes', 
						array(
							$rel => array(
								'type' => 'INT',
								'null' => TRUE,
								),
							)
						);
				}
			}
		}
	}

	public function down()
	{
	}
}