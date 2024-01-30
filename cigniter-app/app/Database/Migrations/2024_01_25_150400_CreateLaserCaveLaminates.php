<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLaserCaveLaminates extends Migration
{
    protected $DBGroup = 'laser';

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
        $this->forge->createTable('laminates');
    }

    public function down()
    {
        $this->forge->dropTable('laminates');
    }
}
