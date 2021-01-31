<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_nilai extends CI_Migration
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
            'siswa_id' => array(
                'type' => 'BIGINT',
                'constraint' => '255',
            ),
            'post_id' => array(
                'type' => 'BIGINT',
                'constraint' => '255',
            ),
            'waktu_penilaian' => array(
                'type' => 'DATETIME',
            ),
            'nilai' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'keterangan' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('nilai');
    }

    public function down()
    {
        $this->dbforge->drop_table('nilai');
    }
}
