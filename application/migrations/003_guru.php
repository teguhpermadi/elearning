<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_guru extends CI_Migration
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
            'first_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'no_hp' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'email' => array( // jadikan sebagai username juga
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'nomor_induk' => array( // tidak semua guru memiliki nomor induk, guru GTT biasanya tidak memiliki nomor induk
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'foto' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('guru');
    }

    public function down()
    {
        $this->dbforge->drop_table('guru');
    }
}
