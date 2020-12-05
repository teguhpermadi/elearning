<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_category extends CI_Migration
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
            'parrent_id' => array(
                'type' => 'BIGINT',
                'constraint' => '255',
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'meta_title' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'slug' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'content' => array(
                'type' => 'TEXT',
            ),
            
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('category');
    }

    public function down()
    {
        $this->dbforge->drop_table('category');
    }
}
