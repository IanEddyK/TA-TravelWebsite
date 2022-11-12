<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BookRecap extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_book' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'name' => [
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
            'month' => [
                'type'       => 'int',
                'constraint' => '11',
            ],
        ]);
        $this->forge->createTable('book_recap');
    }

    public function down()
    {
        $this->forge->dropTable('book_recap');
    }

}
