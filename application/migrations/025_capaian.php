<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_capaian extends CI_Migration
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
            'poin' => array(
                'type' => 'INT',
                'constraint' => '255',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('capaian');

    }

    public function down()
    {
        $this->dbforge->drop_table('capaian');
    }
}
