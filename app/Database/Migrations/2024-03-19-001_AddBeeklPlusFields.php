<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBeeklPlusFields extends Migration
{
    public function up()
    {
        // Add beekl_plus status to users table
        $this->forge->addColumn('users', [
            'is_premium' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
                'after' => 'password'
            ],
            'avatar_frame' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'after' => 'is_premium'
            ],
            'dark_mode' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
                'after' => 'avatar_frame'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', ['is_premium', 'avatar_frame', 'dark_mode']);
    }
}
