<?php

/** @var Factory $factory */

use App\ItemRequest;
use App\User;
use App\ShopBrand;
use App\ShopItem;
use App\SparePart;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Spatie\Permission\Models\Role;

/**
 * @return string
 * @throws Exception
 */
function howFastTime(): string
{
    $variants = [
        'As soon as possible',
        '1 day',
        '1-3 days',
        '1 week',
    ];

    return $variants[random_int(0, 3)];
}

$factory->define(ItemRequest::class, function (Faker $faker) {
    /** @var User $user */
    $user = Role::findByName(User::USER_ROLE_USER)
        ->users()
        ->inRandomOrder()
        ->first();

    return [
        'how_fast_time' => howFastTime(),
        'drive' => $faker->randomNumber(5),
        'registration_number' => $faker->randomNumber(8),
        'city' => $user->city,
        'name' => $user->full_name,
        'phone' => $faker->phoneNumber,
        'email' => $user->email,
        'description' => $faker->realText(150),
        'user_id' => $user->id,
        'make_id' => ShopBrand::inRandomOrder()->first(),
        'service_id' => ShopItem::inRandomOrder()->first(),
        'spare_parts_id' => SparePart::inRandomOrder()->first(),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
