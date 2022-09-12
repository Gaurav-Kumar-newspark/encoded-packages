<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblMediatags extends Migration
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
            "tagname" => array(
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
        $this->forge->createTable('tbl_mediatags', true);
    }

    public function down()
    {
        //
    }
}
