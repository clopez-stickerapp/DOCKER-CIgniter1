<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LaserCaveOrdersSeeder extends Seeder
{
    public function run()
    {
        // Simple Queries
        $this->db->query('
            INSERT INTO thelasercave_orders (id, status, created, order_id, name, image, file1, file2, file3, file4, file5, height, width, m2, quantity, done_before, material, laminate, cutter, leverans, signature_id, error) VALUES (8633, "pp_klar", 1605099558, "", "CYKLOP_TEST", "", "Cyklop-PRINT.pdf", "Cyklop-CUT-2.ai", "", "", "", 900, 305, "2.745", 10, "0000-01-01", 2, 3, 0, 0, 9, 0), (8634, "pp_klar", 1611563646, "SE1281629", "SE1281629_CYKLOP", "", "SE1281629_PRINT_NY(2).pdf", "SE1281629_CUT_NY(2).ai", "", "", "", 735, 330, "9.702", 40, "2020-11-30", 2, 3, 4, 1, 9, 0), (8635, "pp_klar", 1611234256, "SE1287725", "SE1287725_CYKLOP", "", "SE1287725_CUT_darker_NY.ai", "SE1287725_PRINT_NY_2.pdf", "SE1287725_CUT_NY_2.ai", "", "SE1287725_PRINT_Darker_CUT.ai", 309, 649, "12.03246", 60, "2020-11-30", 2, 3, 4, 1, 9, 0), (8636, "pp_klar", 1607607274, "test", "CYCLOP_Testsheet", "", "Testsheet.pdf", "", "", "", "", 1, 1, "0.000001", 1, "2020-12-14", 0, 0, 0, 0, 9, 0), (8637, "pp_klar", 1611233813, "SE1350916", "SE1350916_CYKLOP", "", "SE1350916_PRINT.pdf", "SE1350916_PRINT_NY.pdf", "SE1350916_CUT_NY.ai", "", "", 300, 899, "67.425", 250, "2021-01-25", 2, 3, 4, 1, 9, 0), (8638, "pp_klar", 1611579310, "SE1360319", "SE1360319_CYKLOP_reprint", "", "SE1360319_CUT.ai", "SE1360319_PRINT_darker.pdf", "", "", "", 307, 647, "11.91774", 60, "2021-01-28", 2, 3, 4, 1, 9, 0), (8639, "pp_klar", 1611826985, "SE1364565", "SE1364565_CYKLOP", "", "SE1364565_PRINT_NEW.pdf", "SE1364565_CUT_NEW.ai", "", "", "", 585, 58, "1.6965", 50, "2021-01-31", 2, 3, 4, 1, 9, 0), (8640, "ny", 1624945975, "SE1561997", "SE1561997_CYKLOP_revC", "", "SE1561997_PRINT_ny.pdf", "SE1561997_CUT.ai", "", "", "", 307, 907, "69.61225", 250, "2021-07-05", 2, 1, 4, 1, 9, 0);
        ');
    }
}

