<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_result_ujian extends CI_Migration
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
            'ujian_id' => array(
                'type' => 'BIGINT',  
                'constraint' => '255',
            ),
            'siswa_id' => array(
                'type' => 'BIGINT',  
                'constraint' => '255',
            ),
            'waktu_ujian' => array(
                'type' => 'DATETIME',
            ),
            'nilai' => array(
                'type' => 'INT',
                'default' => 0,
            ),
            'history' => array(
                'type' => 'JSON',
                'default' => null,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('result_ujian');
    }

    public function down()
    {
        $this->dbforge->drop_table('result_ujian');
    }
}
