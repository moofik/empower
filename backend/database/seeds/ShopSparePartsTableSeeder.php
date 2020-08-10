<?php

use Illuminate\Database\Seeder;
use App\SparePart;

class ShopSparePartsTableSeeder extends Seeder
{
    public function run()
    {
        $sparePartsData = [
            ['name' => 'Original parts'],
            ['name' => 'Same as the originals'],
            ['name' => 'Spare parts'],
            ['name' => 'Used parts'],
            ['name' => 'Customer purchased parts'],
        ];

        foreach ($sparePartsData as $sparePartData) {
            SparePart::create($sparePartData);
        }
    }
}
