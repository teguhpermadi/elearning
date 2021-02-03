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
            'min_poin' => array(
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
                'min_poin' => 100, //100
            ],
            [
                'id' => 2,
                'kode' => 'b',
                'nama' => 'Tekun',
                'logo' => 'b_badge.png',
                'min_poin' => 1000, //1000
            ],
            [
                'id' => 3,
                'kode' => 'c',
                'nama' => 'Tangkas',
                'logo' => 'c_badge.png',
                'min_poin' => 10000, //10.000
            ],
            [
                'id' => 4,
                'kode' => 'd',
                'nama' => 'Teladan',
                'logo' => 'd_badge.png',
                'min_poin' => 100000, //100.000
            ],
            [
                'id' => 5,
                'kode' => 'e',
                'nama' => 'Berprestasi',
                'logo' => 'e_badge.png',
                'min_poin' => 1000000, //1.000.000
            ],
        ];

        $this->db->insert_batch('badge', $data);
    }

    public function down()
    {
        $this->dbforge->drop_table('badge');
    }
}
