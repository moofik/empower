<?php

use Illuminate\Database\Seeder;
use App\ShopItem;

class ShopServiceSeeder extends Seeder
{
    public function run()
    {
        $shopServiceData = [
            ['name' => 'Oil change', 'is_additional' => false],
            ['name' => 'Exhausts & mufflers', 'is_additional' => false],
            ['name' => 'Brake Renovations', 'is_additional' => false],
            ['name' => 'Tires & Wheels', 'is_additional' => false],
            ['name' => 'Air conditioning', 'is_additional' => false],
            ['name' => 'Steering & Suspension', 'is_additional' => false],
            ['name' => 'Battery', 'is_additional' => false],
            ['name' => 'Ball joints & shafts', 'is_additional' => false],
            ['name' => 'Towing service', 'is_additional' => true],
            ['name' => 'Coffee', 'is_additional' => true],
            ['name' => 'Annual inspection', 'is_additional' => true],
            ['name' => 'Bicycle borrowed', 'is_additional' => true],
            ['name' => 'Wifi for customers', 'is_additional' => true],
            ['name' => 'Search Provider', 'is_additional' => true],
            ['name' => 'Customer premises', 'is_additional' => true],
            ['name' => 'Service in English', 'is_additional' => true],
            ['name' => 'Service in Swedish', 'is_additional' => true],
            ['name' => 'Service in Estonian', 'is_additional' => true],
            ['name' => 'Service in Russian', 'is_additional' => true],
            ['name' => 'Bicycle storage', 'is_additional' => true],
            ['name' => 'Replacement car', 'is_additional' => true],
            ['name' => 'The repair company was approved by the insurance company', 'is_additional' => true],
        ];

        foreach ($shopServiceData as $serviceData) {
            ShopItem::create($serviceData);
        }
    }
}
