<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_siswa extends CI_Migration
{
    // data identitas pribadi siswa
    // data ini di lengkapi sendiri oleh user siswa yang bersangkutan
    // sedangkan admin hanya menginputkan username dan password saja agar siswa tsb dapat login
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'id_user' => array( // id ini digunakan sebagai reference pada tabel user
                'type' => 'INT',
                'constraint' => 5,
            ),
            'nama' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'hp' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'email' => array( // jadikan sebagai username juga
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'nomor_induk' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'foto' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'tempat_lahir' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'tanggal_lahir' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'alamat' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'biografi' => array(
                'type' => 'VARCHAR',
                'constraint' => '1000',
            ),
            // sosial media (opsional)
            'url_fb' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'url_twitter' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'url_instagram' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'url_youtube' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('siswa');
    }

    public function down()
    {
        $this->dbforge->drop_table('siswa');
    }
}
