<?php

$faker = Faker\Factory::create();

$rows = [];

for ($i = 0; $i < 10; $i++) ***REMOVED***
    $js = (bool)rand(0, 1);
    $rows[] = [
        'id' => (string)($i + 1),
        'department_id' => (string)rand(1, 20),
        'position_id' => (string)rand(1, 7),
        'language_id' => (string)rand(1, 4),
        'gender_id' => (string)rand(1, 76),
        'last_name' => $faker->firstName(),
        'first_name' => $faker->name(),
        'email' => $faker->email,
        'username' => $faker->userName,
        'password' => $faker->password(8),
        'cevi_name' => $faker->userName,
        'birthdate' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'phone' => (string)rand(10000000, 1111111111),
        'mobile' => (string)rand(10000000, 1111111111),
        'signup_completed' => (string)((int)true),
        'js_certificate' => (string)((int)$js),
        'js_certificate_until' => $js ? (string)rand(2017, 2020) : null,
        'created' => $faker->dateTimeThisCentury('now')->format('Y-m-d H:i:s'),
        'created_by' => (string)rand(1, 50),
        'modified' => null,
        'modified_by' => null,
        'deleted' => (string)((int)true),
        'deleted_at' => null,
        'deleted_by' => null,
    ];
***REMOVED***

return $rows;
