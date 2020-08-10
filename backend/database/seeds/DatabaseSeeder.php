<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);
        $this->call(ShopServiceSeeder::class);
        $this->call(ShopMakeTableSeeder::class);
        $this->call(ShopPaymentOptionsTableSeeder::class);
        $this->call(ShopSparePartsTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RepairRequestSeeder::class);
    }
}
