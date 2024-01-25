<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LaserCaveCommentsSeeder extends Seeder
{
    public function run()
    {
        // Simple Queries
        $this->db->query('
            INSERT INTO thelasercave_comments (id, order_id, signature_id, created, text) VALUES (11994, 8637, 9, 1610974504, "Printas i lasern och skÄrs i borden"), (11995, 8638, 9, 1611564676, "Den trycktes utan vitt under sist."), (11996, 8639, 9, 1611742553, "Trycks i lasern och skÄr digitalt. Totalt 250 st ark"), (11997, 8640, 9, 1624873628, "Printas i spartanics och skÄrs digitalt i borden");
        ');
    }
}

