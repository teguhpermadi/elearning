<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_pengajar extends CI_Migration
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
            'id_mapel' => array(
                'type' => 'INT',
                'constraint' => '255',
            ),
            'id_guru' => array(
                'type' => 'INT',
                'constraint' => '255',
            ),
            'id_kelas' => array(
                'type' => 'INT',
                'constraint' => '255',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('pengajar');
    }

    public function down()
    {
        $this->dbforge->drop_table('pengajar');
    }
}
