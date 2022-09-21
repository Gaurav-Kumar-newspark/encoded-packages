<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class Tbl_device_configuration extends Migration
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
            "setting" => array(        
                'type' => 'TEXT',        
                'null' => true,
            ),
            "value" => array(        
                'type' => 'TEXT',        
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
        $this->forge->createTable('tbl_device_configuration', true);
    }

    public function down()
    {
        //
    }
}
