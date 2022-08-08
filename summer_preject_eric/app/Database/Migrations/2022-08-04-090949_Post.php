<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Post extends Migration
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
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => True,
            ],
            'website' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => True,
            ],
            'category' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => True,
            ],
            'content' => [
                'type' => 'VARCHAR',
                'constraint' => '10000',
                'null' => True,
            ],
            'file' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => True,
            ],
            'dateStart' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => True,
            ],
            'dateEnd' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => True,
            ],
            'update' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => True,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => True,
            ]
        ]);
        $this->forge->addKey('id', True);
        $this->forge->createTable('posts');
    }

    public function down()
    {
        $this->forge->dropTable('posts');
    }
}
