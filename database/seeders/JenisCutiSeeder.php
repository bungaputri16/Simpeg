<?php

namespace Database\Seeders;

use App\Models\JenisCuti;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisCutiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisCuti::create([
            'name' => 'cuti tahunan'
        ]);
        JenisCuti::create([
            'name' => 'cuti besar'
        ]);JenisCuti::create([
            'name' => 'cuti sakit'
        ]);JenisCuti::create([
            'name' => 'cuti melahirkan'
        ]);
        JenisCuti::create([
            'name' => 'cuti karena alasan penting'
        ]);
        JenisCuti::create([
            'name' => 'cuti diluar tanggungan negara'
        ]);
    }
}
