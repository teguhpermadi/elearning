<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_flipbook extends CI_Migration
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
            'created_at' => array( // kapan soal ini dibuat
                'type' => 'DATETIME',
            ),
            'title' => array( // isi soal
                'type' => 'VARCHAR',  
                'constraint' => '255',              
            ),
            'pages' => array( // isi soal
                'type' => 'JSON',  
                'default' => 'null'
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('flipbook');
    }

    public function down()
    {
        $this->dbforge->drop_table('flipbook');
    }
}
