<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblCode extends Migration
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
            "file_id" => array(
                'type' => 'VARCHAR',
                'constraint' => 5,
               
            ),

            "activationcode" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,

            ),   
            
            "status" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),
            "activationdate" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),    
            "mac_address" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),
            "created_by" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),    
            "created_at" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),   
            "updated_at" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),

        );
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('tbl_codes', true);
    }

    public function down()
    {
    //
    }
}
