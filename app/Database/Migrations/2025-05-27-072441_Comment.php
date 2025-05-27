<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Comment extends Migration
{
    public function up()
    {
        //add comments table
        $this->forge->addField([
            'commentID' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'postID' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'userID' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'content' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
        ]);
        //add primary key
        $this->forge->addKey('commentID', true);
        
        // add unique key to userID and postID
        $this->forge->addUniqueKey(['userID', 'postID']);
        //create table
        $this->forge->createTable('comments', true);
        //add comment to posts table
        $this->forge->addColumn('postforum', [
            'commentCount' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'default' => 0,
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        //delete comments table
        $this->forge->dropTable('comments', true);
        //remove commentCount from posts table
        $this->forge->dropColumn('postforum', 'commentCount');
    }
}
