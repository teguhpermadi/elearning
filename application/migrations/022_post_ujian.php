<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_post_ujian extends CI_Migration
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
            'post_id' => array(
                'type' => 'BIGINT',
                'constraint' => '255',
            ),
            'ujian_id' => array(
                'type' => 'BIGINT',
                'constraint' => '255',
            ),
            
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('post_ujian');
    }

    public function down()
    {
        $this->dbforge->drop_table('post_ujian');
    }
}
