<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Collab;
use App\Institution;
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|    
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'verified' => $verified = $faker->randomElement([User::VERIFIED_USER, User::UNVERIFIED_USER]),
        'verification_token' => $verified == User::VERIFIED_USER ? null : User::generateVerificationCode(),
        'admin' => $verified = $faker->randomElement([User::ADMIN_USER, User::REGULAR_USER]),
    ];
});

$factory->define(Institution::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->company,
        'logo' => $faker->randomElement(['logo-1.jpg', 'logo-2.jpg', 'logo-3.jpg']),
        'link' => $faker->url,
    ];
});

$factory->define(Collab::class, function (Faker $faker) {
    return [
        'category' => $faker->randomElement(['Salud', 'Educacion','DesarrolloSocial', 'Recreacion']),
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'institution_id' => Institution::all()->random()->id,
    ]; 
});