<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tbl_Security extends Migration
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
            "sitekey" => array(        
                'type' => 'TEXT',        
                'null' => true,
            ),
            "secratekey" => array(        
                'type' => 'TEXT',        
                'null' => true,
            ),      
            "captcha" => array(        
                'type' => 'VARCHAR',        
                'constraint' => 50,
                'null' => true,
            ),           
        );
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('tbl_security', true);
    }

    public function down()
    {
        //
    }
}
