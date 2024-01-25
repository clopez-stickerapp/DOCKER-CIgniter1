<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CaveSignaturesSeeder extends Seeder
{
    public function run()
    {
        // Simple Queries
        $this->db->query('
            INSERT INTO thecave_signatures (id, name) VALUES (1, "Lille Hu"), (2, "Ludde"), (3, "Huber"), (4, "Mattias"), (5, "Tony Montana"), (6, "Tant Anna"), (7, "Kurt Wallander"), (8, "Mallan"), (9, "Don Juan"), (10, "Someone"), (11, "Lilla Sjöjungfrun"), (12, "Sara"), (13, "Den förvedne"), (14, "Norea"), (15, "Blindgren"), (16, "Magnus"), (17, "Mark Delorenzo"), (18, "Alexandra"), (19, "Yana"), (20, "Camilla"), (21, "Alexander N");
        ');
    }
}

