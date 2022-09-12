<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblBannedip extends Migration
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
            "ip" => array(
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
        $this->forge->createTable('tbl_bannedip', true);
    }

    public function down()
    {
        //
    }
}
