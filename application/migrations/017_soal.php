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
                'type' => 'VARCHAR',  
                'constraint' => '255',              
            ),
            'skor' => array( // skor soal
                'type' => 'VARCHAR',  
                'constraint' => '255',              
            ),
            'jenis_soal' => array( // pilihan ganda / jawaban singkat
                'type' => 'VARCHAR',  
                'constraint' => '255',              
            ),
            'opsi' => array(
                'type' => 'JSON',  
                'default' => null,              
            ),
            // 'opsi_a' => array( // khusus pilihan ganda gunakan kolom ini untuk menyimpan pilihannya
            //     'type' => 'VARCHAR',  
            //     'constraint' => '255',      
            // ),
            // 'opsi_b' => array( // khusus pilihan ganda gunakan kolom ini untuk menyimpan pilihannya
            //     'type' => 'VARCHAR',  
            //     'constraint' => '255',      
            // ),
            // 'opsi_c' => array( // khusus pilihan ganda gunakan kolom ini untuk menyimpan pilihannya
            //     'type' => 'VARCHAR',  
            //     'constraint' => '255',      
            // ),
            // 'opsi_d' => array( // khusus pilihan ganda gunakan kolom ini untuk menyimpan pilihannya
            //     'type' => 'VARCHAR',  
            //     'constraint' => '255',      
            // ),
            // 'opsi_e' => array( // khusus pilihan ganda gunakan kolom ini untuk menyimpan pilihannya
            //     'type' => 'VARCHAR',  
            //     'constraint' => '255',      
            // ),
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
            'aktif' => array( //soal aktif atau tidak
                'type' => 'TINYINT',
                'constraint' => '1',
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
