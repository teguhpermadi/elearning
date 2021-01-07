<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_upload extends CI_Migration
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
            'milik' => array(
                'type' => 'VARCHAR',  
                'constraint' => '255',              
            ),
            'file_name' => array(
                'type' => 'VARCHAR',  
                'constraint' => '255',              
            ),
            'file_extension' => array(
                'type' => 'VARCHAR',  
                'constraint' => '255',              
            ),
            'token' => array(
                'type' => 'VARCHAR',  
                'constraint' => '255',              
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('upload');
    }

    public function down()
    {
        $this->dbforge->drop_table('upload');
    }
}
