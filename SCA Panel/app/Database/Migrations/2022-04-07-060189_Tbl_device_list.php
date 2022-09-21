<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class Tbl_device_list extends Migration
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
            "mac_address" => array(        
                'type' => 'TEXT',        
                'null' => true,
            ),
            "code_id" => array(        
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
        $this->forge->createTable('tbl_device_list', true);
    }

    public function down()
    {
        //
    }
}
