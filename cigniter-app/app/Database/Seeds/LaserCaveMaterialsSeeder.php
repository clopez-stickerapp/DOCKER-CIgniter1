<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LaserCaveMaterialsSeeder extends Seeder
{
    public function run()
    {
        // Simple Queries
        $this->db->query('
            INSERT INTO thelasercave_materials (id, name) VALUES (1, "Trans TUNN"), (2, "Transparent"), (3, "Vitt TUNN"), (4, "Avtagbar VIT"), (5, "Vitt"), (6, "PE TRANS ej laser"), (7, "Borstad alu"), (8, "Spegelvinyl"), (9, "Hårdhäftande VIT"), (10, "Warranty"), (11, "PE VIT ej laser"), (12, "Kraft Paper"), (13, "Reflex");
        ');
    }
}

