<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_soal extends CI_Migration
{

    // membuat tabel soal
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'author_id' => array( // siapa pemilik soal ini
                'type' => 'BIGINT',  
                'constraint' => '255',
            ),
            'mapel_id' => array( // siapa pemilik soal ini
                'type' => 'BIGINT',  
                'constraint' => '255',
            ),
            'tingkat' => array( // siapa pemilik soal ini
                'type' => 'VARCHAR',  
                'constraint' => '255',
            ),
            'created_at' => array( // kapan soal ini dibuat
                'type' => 'DATETIME',
            ),
            'soal' => array( // isi soal
                'type' => 'TEXT',    
            ),
            'skor' => array( // skor soal
                'type' => 'INT',  
                'default' => 0,         
            ),
            'jenis_soal' => array( // pilihan ganda / jawaban singkat
                'type' => 'VARCHAR',  
                'constraint' => '255',              
            ),
            'opsi' => array(
                'type' => 'JSON',  
                'default' => null,              
            ),
            'petunjuk' => array( // opsional untuk menampilkan petunjuk dalam mengerjakan soal
                'type' => 'VARCHAR',  
                'constraint' => '255',              
            ),
            'kunci' => array( // kunci jawaban untuk soal ini
                'type' => 'VARCHAR',  
                'constraint' => '255',              
            ),
            'pembahasan' => array( // opsional untuk menampilkan pembahasan dari soal ini
                'type' => 'VARCHAR',  
                'constraint' => '255',              
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('soal');
    }

    public function down()
    {
        $this->dbforge->drop_table('soal');
    }
}
