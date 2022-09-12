<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblParticulerfile extends Migration
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
            "filepath" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),
            "code_id" => array(
                'type' => 'INT',
                'constraint' => 5,
                'null' => true,

            ),
            
        );
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('tbl_particularfile', true);
    }

    public function down()
    {
    //
    }
}
