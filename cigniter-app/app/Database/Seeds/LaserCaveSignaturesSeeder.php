<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LaserCaveSignaturesSeeder extends Seeder
{
    public function run()
    {
        // Simple Queries
        $this->db->query('
            INSERT INTO thelasercave_signatures (id, name) VALUES (1, "Hugo"), (2, "Ludde"), (3, "Huber"), (4, "Mattias"), (13, "Laser Manden"), (6, "zlatan"), (7, "Kurt Wallander"), (8, "Mallan"), (9, "Johan"), (10, "Der Sturmführer"), (11, "Amity the Little Mermaid"), (12, "Sara"), (14, "Fredrik"), (15, "Magnus"), (16, "Linn Stickerapp"), (17, "System");
        ');
    }
}

