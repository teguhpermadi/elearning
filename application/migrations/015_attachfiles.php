<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_attachfiles extends CI_Migration
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
            'post_id' => array(
                'type' => 'BIGINT',
                'constraint' => '255',
            ),
            'published' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
            ),
            'uploaded_at' => array(
                'type' => 'DATETIME',
            ),
            'file_name' => array(
                'type' => 'VARCHAR',  
                'constraint' => '255',              
            )
            
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('attachfiles');
    }

    public function down()
    {
        $this->dbforge->drop_table('attachfiles');
    }
}
