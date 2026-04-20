<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAuthFieldsToUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'password_hash' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'email',
            ],
            'role' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'default' => 'member',
                'after' => 'password_hash',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', ['password_hash', 'role']);
    }
}
