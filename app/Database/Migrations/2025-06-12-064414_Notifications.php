<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Notifications extends Migration
{
    public function up()
    {
        //create notifications table
        $this->forge->addField([
            'notificationID' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'userID' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'message' => [
                'type' => 'TEXT',
            ],
            'isRead' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
        ]);
        //add primary key
        $this->forge->addKey('notificationID', true);
        //create table
        $this->forge->createTable('notifications', true);
        //add notifications to users table
        $this->forge->addColumn('users', [
            'notificationCount' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'default' => 0,
                'null' => true,
            ],
        ]);
        //add foreign key constraint
        $this->forge->addForeignKey('userID', 'users', 'id', 'CASCADE', 'SET NULL');
    }

    public function down()
    {
        //delete notifications table
        $this->forge->dropTable('notifications', true);
        //remove notificationCount from users table
        $this->forge->dropColumn('users', 'notificationCount');
    }
}
