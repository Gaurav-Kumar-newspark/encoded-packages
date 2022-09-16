<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tblfirebase_logs extends Migration
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
            "request" => array(
                'type'           => 'TEXT',
                'null'           => true,
                ),
            "response" => array(
                'type'           => 'TEXT',
                'null'           => true,
                ),
            "date" => array(
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true,
                ),                 
        );
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('tbl_firebase_logs', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('tbl_firebase_logs', true);
    }
}