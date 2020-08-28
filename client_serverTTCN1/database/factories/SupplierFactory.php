<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Supplier::class, function (Faker $faker) {
    return [
        'company_name' => $faker->company,
        'contact_fname' => $faker->firstName,
        'contact_lname' =>$faker->lastName,
        'address1' => $faker->address,
        'address2' => $faker->secondaryAddress,
        'city' => $faker->city,
        'state' => $faker->state,
        'postal_code' => $faker->postcode,
        'country' => $faker->country,
        'phone' => $faker->phoneNumber,
        'fax' => $faker->text(25),
        'email' => $faker->email,
        'website' => $faker->url,
        'logo' => $faker->imageUrl(50,50,null,false)
    ];
});
