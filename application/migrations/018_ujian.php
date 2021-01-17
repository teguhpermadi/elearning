<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_ujian extends CI_Migration
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
            'author_id' => array(
                'type' => 'BIGINT',  
                'constraint' => '255',
            ),
            'created_at' => array(
                'type' => 'DATETIME',
            ),
            'mapel_id' => array( // siapa pemilik soal ini
                'type' => 'BIGINT',  
                'constraint' => '255',
            ),
            'kelas_tingkat' => array( // siapa pemilik soal ini
                'type' => 'VARCHAR',  
                'constraint' => '255',
            ),
            'nama_ujian' => array(
                'type' => 'VARCHAR',  
                'constraint' => '255',              
            ),
            'token' => array(
                'type' => 'VARCHAR',  
                'constraint' => '255',              
            ),
            'waktu_selesai' => array(
                'type' => 'DATETIME',          
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('ujian');
    }

    public function down()
    {
        $this->dbforge->drop_table('ujian');
    }
}
