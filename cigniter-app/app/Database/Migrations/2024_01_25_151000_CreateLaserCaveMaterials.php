<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLaserCaveMaterials extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('thelasercave_materials');
    }

    public function down()
    {
        $this->forge->dropTable('thelasercave_materials');
    }
}
