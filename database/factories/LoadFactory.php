<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\City;
use App\Models\Load;
use Faker\Generator as Faker;

//use Faker\Factory as Faker;

$factory->define(Load::class, function (Faker $faker) {
    $countCity = City::count();

    $loadsName = [
        [
            'en' => 'Edged boards',
            'ua' => 'Дошка обрізна'
        ],
        [
            'en' => 'Potatoes',
            'ua' => 'Картопля'
        ],
        [
            'en' => 'Metalwork',
            'ua' => 'Металеві вироби'
        ],
        [
            'en' => 'Crushed granite',
            'ua' => 'Щебінь гранітний'
        ],
        [
            'en' => 'Products',
            'ua' => 'Продукти'
        ],
        [
            'en' => 'Bus',
            'ua' => 'Шини'
        ],
        [
            'en' => 'Pavement',
            'ua' => 'Бруківка'
        ],
        [
            'en' => 'Building materials',
            'ua' => 'Будівельні матеріали'
        ],
        [
            'en' => 'Wheat',
            'ua' => 'Пшениця'
        ],
    ];
    $randLoadNameIndex = random_int(0, count($loadsName) - 1);


    $dirList = scandir('public/images');
    $photos = array_filter ($dirList, function ($element) {
        return is_file('public/images/' . $element);
    });

    return [
        'city_from_id' => $faker->numberBetween(1, $countCity),
        'city_to_id' => $faker->numberBetween(1, $countCity),
        'name' => [
            'en' => $loadsName[$randLoadNameIndex]['en'],
            'ua' => $loadsName[$randLoadNameIndex]['ua']
        ],
        'volume' => $faker->randomFloat(null, 1, 30),
        'photo' => $faker->randomElement($photos),
    ];
});
