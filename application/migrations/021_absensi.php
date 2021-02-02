<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_absensi extends CI_Migration
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
            'time_access' => array(
				'type'       => 'DATETIME',
            ),
            'post_id' => array(
				'type'       => 'BIGINT',
				'constraint' => '255'
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('absensi');
    }

    public function down()
    {
        $this->dbforge->drop_table('absensi');
    }
}
