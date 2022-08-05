<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Login extends Migration
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
            'account' => [ 
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => True
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => True
            ],
        ]);
        $this->forge->addKey('id', True);
        $this->forge->createTable('logins');
    }

    public function down()
    {
        $this->forge->dropTable('logins');
    }
}
