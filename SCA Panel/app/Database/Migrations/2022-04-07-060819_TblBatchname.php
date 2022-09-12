<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblBatchname extends Migration
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

            "batchname" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),
            "common" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,

            ),
            
        );
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('tbl_batchname', true);
    }

    public function down()
    {
    //
    }
}
