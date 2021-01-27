<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_user_longtime extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'user_id' => array(
                'type' => 'BIGINT',  
                'constraint' => '255',
            ),
            'ip_address' => array(
				'type'       => 'VARCHAR',
				'constraint' => '45'
            ),
            'login_time' => array(
				'type'       => 'VARCHAR',
				'constraint' => '255'
            ),
            'logout_time' => array(
				'type'       => 'VARCHAR',
				'constraint' => '255'
            ),
            'status' => array(
				'type'       => 'VARCHAR',
				'constraint' => '255'
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('user_longtime');
    }

    public function down()
    {
        $this->dbforge->drop_table('user_longtime');
    }
}
