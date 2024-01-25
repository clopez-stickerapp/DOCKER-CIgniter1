<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CaveCuttersSeeder extends Seeder
{
    public function run()
    {
        // Simple Queries
        $this->db->query('
            INSERT INTO thecave_cutters (id, name) VALUES (1, "8000 (Rulle)"), (2, "summa rulle"), (3, "Båda"), (4, "SUMMA F1612"), (5, "Plotter");
        ');
    }
}

