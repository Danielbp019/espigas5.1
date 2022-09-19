<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [//se usa para crear usuarios en la tabla junto con el seeder se pueden crear varios usuarios al tiempo para pruebas.
        'name' => $faker->name,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'role' => $faker->randomElement(['empleado', 'supervisor'])
    ];
});

$factory->define(App\Emergency::class, function (Faker\Generator $faker) {
    return [//se usa para crear usuarios en la tabla junto con el seeder se pueden crear varios usuarios al tiempo para pruebas.
        'niu' => str_random(10),
        'event_type' => $faker->randomElement(['EG', 'IN', 'CL', 'IS', 'SS', 'O']),
        'application_type' => $faker->randomElement(['1', '2', '3', '4']),
        'application_date' => str_random(10),
        'time_application' => str_random(10),
        'day_care' => str_random(10),
        'hour_care' => str_random(10),
        'observations' => str_random(250),
        'name_holder' => $faker->name,
        'address' => str_random(10),
        'bill' => str_random(10),
        'name_applicant' => $faker->name,
        'identity_applicant' => str_random(10),
        'phone' => str_random(10),
        'emergency_network' => $faker->randomElement(['Interna', 'Externa'])
    ];
});
 
//php artisan db:seed --class=UserTableSeeder , hace la ejecucion de un solo seeder para llenar una sola tabla con base a la informacion de arriba, lo demas se define en seeds
