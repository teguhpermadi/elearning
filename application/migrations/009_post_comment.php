<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_post_comment extends CI_Migration
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
            'parrent_id' => array(
                'type' => 'BIGINT',
                'constraint' => '255',
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'published' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
            ),
            'created_at' => array(
                'type' => 'DATETIME',
            ),
            'updated_at' => array(
                'type' => 'DATETIME',                
            ),
            'published_at' => array(
                'type' => 'DATETIME',
            ),
            'content' => array(
                'type' => 'TEXT',                
            ),
            
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('post_comment');
    }

    public function down()
    {
        $this->dbforge->drop_table('post_comment');
    }
}
