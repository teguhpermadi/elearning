<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_identitas extends CI_Migration
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
            'id_user' => array( // id ini digunakan sebagai reference pada tabel user
                'type' => 'INT',
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
            'pendidikan' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
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
        $this->dbforge->create_table('identitas');
    }

    public function down()
    {
        $this->dbforge->drop_table('identitas');
    }
}
