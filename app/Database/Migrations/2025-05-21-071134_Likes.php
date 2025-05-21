<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Likes extends Migration
{
    public function up()
    {
        //create likes table with foreign key to users and posts
        $this->forge->addField([
            'likeID'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'userID'       => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'postID'      => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'createdAt timestamp default now()',
        ]);
        // primary key
        $this->forge->addKey('likeID', TRUE); 
        // add unique key to userID and postID
        $this->forge->addUniqueKey(['userID', 'postID']);
        $this->forge->createTable('likes', TRUE);
        
    }

    public function down()
    {
        //drop likes table
        $this->forge->dropTable('likes');
    }
}
