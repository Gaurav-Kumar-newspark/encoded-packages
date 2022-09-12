<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblFiledata extends Migration
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
            "title" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),
            "group_id" => array(
                'type' => 'INT',
                'constraint' => 5,
                'null' => true,

            ),
            "filepath" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),
            "filetype" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),
            "epglink" => array(
                'type' => 'TEXT',
                'null' => true,
            ),
            "status" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),
            "expiry_date" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),
            "created_at" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),
            "created_by" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),
            "updated_on" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),
        );
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('tbl_filedata', true);
    }

    public function down()
    {
    //
    }
}
