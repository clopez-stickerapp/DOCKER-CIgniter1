<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLaserCaveOrders extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'created' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'order_id' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => '',
            ],
            'file1' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => '',
            ],
            'file2' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => '',
            ],
            'file3' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => '',
            ],
            'file4' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => '',
            ],
            'file5' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => '',
            ],
            'height' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'width' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'm2' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'quantity' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'done_before' => [
                'type'       => 'DATE',
            ],
            'material' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'laminate' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'cutter' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'leverans' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'signature_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'error' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('thelasercave_orders');
    }

    public function down()
    {
        $this->forge->dropTable('thelasercave_orders');
    }
}
