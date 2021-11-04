<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'name'              => 'mostafa',
        'age'               =>  '22',
        'image'             =>  '1.jpg',
        'uid'               =>  '123456789012',
        'identification'    => '12345678901234',
        'adress'            => 'asd 12 fsdrsfd 3@DA',
        'mobile'            => '011243516566',
        'expire'            => '2021-08-1 00:00:00',
        'point'             =>  '0',
        'parentNam'         => 'essa',
        'parentNum'         => '01123478569',
    ];
});
