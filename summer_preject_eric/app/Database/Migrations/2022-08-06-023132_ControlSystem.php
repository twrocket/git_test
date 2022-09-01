<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ControlSystem extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => True,
                'auto_increment' => True
            ],
            'time' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => True,
            ],
            'location' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => True,
            ],
            'category' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => True,
            ],
            'time_end' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => True,
            ]
            
        ]);
        $this->forge->addKey('id', True);
        $this->forge->createTable('controls');
    }

    public function down()
    {
        $this->forge->dropTable('controls');
    }
}
