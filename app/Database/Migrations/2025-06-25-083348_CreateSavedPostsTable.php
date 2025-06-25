<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSavedPostsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'auto_increment' => true],
            'user_id'    => ['type' => 'INT', 'null' => false],
            'post_id'    => ['type' => 'INT', 'null' => false],
            'saved_at'   => ['type' => 'DATETIME', 'null' => false],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('user_id');
        $this->forge->addKey('post_id');
        $this->forge->createTable('saved_posts');
    }

    public function down()
    {
        $this->forge->dropTable('saved_posts');
    }
}
