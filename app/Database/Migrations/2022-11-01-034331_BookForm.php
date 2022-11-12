<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BookForm extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_book' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'phone' => [
                'type' =>  'VARCHAR',
                'constraint' => '35'
            ],
            'address' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'location' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'package_id' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'guests' => [
                'type'       => 'int',
                'constraint' => '11',
            ],
            'arrivals' => [
                'type'       => 'DATE',
            ],
            'leaving' => [
                'type'       => 'DATE',
            ],
            'created_at' => [
                'type'       => 'DATE',
            ]
        ]);
        $this->forge->addKey('id_book', true);
        $this->forge->createTable('book_form');
    }

    public function down()
    {
        $this->forge->dropTable('book_form');
    }

}
