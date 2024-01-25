<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLaserCaveComments extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'order_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'signature_id' => [
                'type'          => 'INT',
                'constraint'    => 11,
            ],
            'created' => [
                'type' => 'INT',
                'constraint'    => 11,
            ],
            'text' => [
                'type' => 'TEXT',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('thelasercave_comments');
    }

    public function down()
    {
        $this->forge->dropTable('thelasercave_comments');
    }
}
