<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CaveLaminatesSeeder extends Seeder
{
    public function run()
    {
        // Simple Queries
        $this->db->query('
            INSERT INTO thecave_laminates (id, name) VALUES (1, "Glossy"), (2, "Floor"), (3, "Satine matte"), (4, "White Window"), (5, "Sandy"), (6, "12 Mil Mx Laminat (HeavyD)"), (7, "Uncoated"), (8, "EPOXY"), (9, "Appliceringsfilm"), (10, "Super Rough"), (11, "Pebble");
        ');
    }
}

