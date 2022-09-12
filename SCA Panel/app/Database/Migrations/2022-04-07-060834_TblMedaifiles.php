<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblMediafiles extends Migration
{
    public function up()
    {
        $fields = array(
        
            "id" => array(
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
                ),
            "tag_id" => array(
                'type'           => 'INT',
                'constraint'     => 50,
                'null'     => true,
                ),
            "filename" => array(
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true,
                ),
            "title" => array(
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true,
                ),
            "created_at" => array(
                'type'           => 'VARCHAR',
                'constraint'     => 50,
                'null'           => true,
                ),                 
        );
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('tbl_mediafiles', true);
    }

    public function down()
    {
        //
    }
}
