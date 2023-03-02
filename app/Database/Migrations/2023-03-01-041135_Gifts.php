<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Gifts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'gifts_title' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'gifts_subtitle' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'gifts_info' => [
                'type' => 'TEXT',
                'null' => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('gifts');
    }

    public function down()
    {
        $this->forge->dropTable('gifts');
    }
}
