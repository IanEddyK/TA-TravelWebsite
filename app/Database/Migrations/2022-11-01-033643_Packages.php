<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Packages extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'package_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'title' => [
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
            'image' => [
                'type' =>  'VARCHAR',
                'constraint' => '255'
            ],
            'price' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ]  
        ]);
        $this->forge->addKey('package_id', true);
        $this->forge->createTable('packages');
    }

    public function down()
    {
        $this->forge->dropTable('packages');
    }

}