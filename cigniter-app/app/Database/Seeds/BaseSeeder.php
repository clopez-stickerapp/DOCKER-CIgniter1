<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('CaveCommentsSeeder');
        $this->call('CaveCuttersSeeder');
        $this->call('CaveLaminatesSeeder');
        $this->call('CaveLeveranserSeeder');
        $this->call('CaveMaterialsSeeder');
        $this->call('CaveOrdersSeeder');
        $this->call('CaveSignaturesSeeder');
        $this->call('LaserCaveCommentsSeeder');
        $this->call('LaserCaveCuttersSeeder');
        $this->call('LaserCaveLaminatesSeeder');
        $this->call('LaserCaveLeveranserSeeder');
        $this->call('LaserCaveMaterialsSeeder');
        $this->call('LaserCaveOrdersSeeder');
        $this->call('LaserCaveSignaturesSeeder');
    }
}