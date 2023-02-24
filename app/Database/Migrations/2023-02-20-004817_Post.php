<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Post extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'postId' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
            ],
            'postImage' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
            ], 'is_active' => [
                'type' => 'VARCHAR',
                'constraint' => '250'

            ],
            'is_deleted' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
            ],
            'description' => [
                'type' => 'TEXT',
            ],

        ]);
        $this->forge->addKey('postId', true);
        $this->forge->createTable('posts');

    }

    public function down()
    {
        //
    }
}
