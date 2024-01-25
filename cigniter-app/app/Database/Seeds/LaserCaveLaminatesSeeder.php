<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LaserCaveLaminatesSeeder extends Seeder
{
    public function run()
    {
        // Simple Queries
        $this->db->query('
            INSERT INTO thelasercave_laminates (id, name) VALUES (1, "Glossy PET"), (2, "Satin PET"), (3, "UV Gloss PET"), (4, "Matt anvÄnd ej lÄngre"), (5, "Olaminerad"), (6, "Gamla UV "), (7, "Epoxy Sabina");
        ');
    }
}

