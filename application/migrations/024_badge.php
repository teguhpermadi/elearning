<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_badge extends CI_Migration
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
            'kode' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'nama' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'logo' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),

        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('badge');

        $data = [
            [
                'id' => 1,
                'kode' => 'a',
                'nama' => 'Disiplin',
                'logo' => 'a_badge.png',
            ],
            [
                'id' => 2,
                'kode' => 'b',
                'nama' => 'Tekun',
                'logo' => 'b_badge.png',
            ],
            [
                'id' => 3,
                'kode' => 'c',
                'nama' => 'Tangkas',
                'logo' => 'c_badge.png',
            ],
            [
                'id' => 4,
                'kode' => 'd',
                'nama' => 'Teladan',
                'logo' => 'c_badge.png',
            ],
            [
                'id' => 5,
                'kode' => 'e',
                'nama' => 'Berprestasi',
                'logo' => 'c_badge.png',
            ],
        ];

        $this->db->insert_batch('badge', $data);
    }

    public function down()
    {
        $this->dbforge->drop_table('badge');
    }
}
