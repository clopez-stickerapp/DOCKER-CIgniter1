<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CaveLeveranserSeeder extends Seeder
{
    public function run()
    {
        // Simple Queries
        $this->db->query('
            INSERT INTO thecave_leveranser (id, name) VALUES (1, "Ark"), (2, "Ark - Rensas"), (3, "Styckvis"), (4, "Styckvis - Rensas");
        ');
    }
}

