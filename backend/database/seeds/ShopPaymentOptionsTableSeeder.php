<?php

use Illuminate\Database\Seeder;
use App\ShopPaymentOption;

class ShopPaymentOptionsTableSeeder extends Seeder
{
    public function run()
    {
        $paymentOptions = [
            ['name' => 'Cash'],
            ['name' => 'Fall'],
            ['name' => 'Debit card'],
            ['name' => 'Financing or partial payment'],
            ['name' => 'American Express'],
            ['name' => 'Diners club'],
            ['name' => 'Mastercard'],
            ['name' => 'Visa'],
        ];

        foreach ($paymentOptions as $paymentOption) {
            ShopPaymentOption::create($paymentOption);
        }
    }
}
