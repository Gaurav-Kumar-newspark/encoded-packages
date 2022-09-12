<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblLogs extends Migration
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
            "action" => array(
                'type'           => 'Text',
                'constraint'     => 255,
                'null'     => true,
                ),
            "request" => array(
                'type'           => 'Text',
                'constraint'     => 255,
                'null'     => true,
                ),
            "response" => array(
                'type'           => 'Text',
                'constraint'     => 255,
                'null'     => true,
            ),       
        );
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('tbl_logs', true);
    }

    public function down()
    {
        //
    }
}
