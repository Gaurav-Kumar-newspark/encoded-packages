<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Tblnotificationhistory extends Migration
{
    public function up()
    {
        $fields =   array(
            "id" => array(
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
                ),
            "notification_id" => array(
                'type'           => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                ),
            "sent_on" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),
            "response" => array(
                'type'           => 'TEXT',
                'null' => true,
            ),          
        );
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('tbl_notification_history', true);

    }

    public function down()
    {
        //
        $this->forge->dropTable('tbl_notification_history', true);
    }
}