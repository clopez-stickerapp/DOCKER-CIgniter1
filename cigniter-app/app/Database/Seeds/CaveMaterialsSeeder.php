<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CaveMaterialsSeeder extends Seeder
{
    public function run()
    {
        // Simple Queries
        $this->db->query('
            INSERT INTO thecave_materials (id, name) VALUES (1, "Vanligt (BF)"), (2, "Endast skÄrning-transfer"), (3, "HiTack"), (4, "Transparent"), (5, "Satin Matt"), (6, "Silvermetallic"), (7, "Flouroscerande Grön"), (8, "Removable"), (9, "Frostad vinyl"), (10, "Epoxy"), (11, "Double sided coverall"), (12, "Heattransfer"), (13, "Guldmetallic"), (14, "Cling"), (15, "Gul vinyl"), (16, "Röd skÄrvinyl"), (17, "Ljusgrå skÄrvinyl"), (18, "Reflex vit"), (19, "spegelvinyl"), (20, "Wallsticker_geckotex"), (21, "Vit Heattransfer"), (22, "Flouroscerande Rosa"), (23, "100mic olaminerat"), (24, "Magnet"), (25, "Banderoll"), (26, "Quickmount"), (27, "Textil"), (28, "Arlon"), (29, "3M skin"), (30, "Asfaltvinyl"), (31, "Hedin Bil Silvermetallic"), (32, "Transparent ej_permanent"), (33, "coverall"), (34, "Glitter"), (35, "Flouroscerande Orange"), (36, "Skal"), (37, "Ultraclear"), (38, "IP ETU"), (39, "Lasergravyr"), (40, "Fluoroscerande gul"), (41, "MALLANS HF"), (42, "iPhone 5"), (43, "Frysvinyl"), (44, "Schablon Oramask 810"), (45, "3M Nails"), (46, "HårdhÄftande Transp"), (47, "Nya Wallsticker");
        ');
    }
}

