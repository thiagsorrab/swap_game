<?php

use Faker\Generator as Faker;

$factory->define(App\Usuario::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'data_nascimento' => $faker->date,
        'genero' => 'Masculino',
        'telefone' => $faker->phoneNumber,
        'tipo' => '1'
        'email' => $faker->unique()->safeEmail,        
        'senha' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm' // secret        
    ];
});
