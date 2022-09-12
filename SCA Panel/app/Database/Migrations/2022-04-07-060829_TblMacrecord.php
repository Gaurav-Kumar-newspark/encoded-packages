<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblMacrecords extends Migration
{
    public function up()
    {
        $fields = array(

            "id" => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ),

            "list_id" => array(        
                'type' => 'INT',        
                'constraint' => 5,
                'null' => true,
            ),
            "mac_address" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,

            ),       
   
            "created_at" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),                
        );
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('tbl_macrecord', true);
    }

    public function down()
    {
    //
    }
}
