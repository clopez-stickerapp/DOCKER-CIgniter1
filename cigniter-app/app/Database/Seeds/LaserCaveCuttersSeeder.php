<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LaserCaveCuttersSeeder extends Seeder
{
    public function run()
    {
        // Simple Queries
        $this->db->query('
            INSERT INTO thelasercave_cutters (id, name) VALUES (1, "Rulle"), (2, "Styckvis"), (3, "Ark Rensas"), (4, "Ark EJ Rensade"), (5, "Styckvis ej laser"), (6, "Rulle Ej rensad"), (7, "Styckvis peel cut"), (8, "Spartanics");
        ');
    }
}

