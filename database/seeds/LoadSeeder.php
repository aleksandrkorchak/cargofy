<?php

use Illuminate\Database\Seeder;

class LoadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loads')->insert([
            [
                'city_from_id' => 3,
                'city_to_id' => 1,
                'name' => collect([
                    'en' => 'Edged boards',
                    'ua' => 'Дошка обрізна'
                ]),
                'volume' => 22,
                'photo' => 'images/brus.png'
            ],
            [
                'city_from_id' => 2,
                'city_to_id' => 4,
                'name' => collect([
                    'en' => 'Potatoes',
                    'ua' => 'Картопля'
                ]),
                'volume' => 21,
                'photo' => 'images/potatoes.jpg'
            ],
            [
                'city_from_id' => 5,
                'city_to_id' => 6,
                'name' => collect([
                    'en' => 'Metalwork',
                    'ua' => 'Металеві вироби'
                ]),
                'volume' => 25,
                'photo' => 'images/metal.png'
            ],
            [
                'city_from_id' => 4,
                'city_to_id' => 1,
                'name' => collect([
                    'en' => 'Crushed granite',
                    'ua' => 'Щебінь гранітний'
                ]),
                'volume' => 40,
                'photo' => 'images/granite.jpg'
            ],
            [
                'city_from_id' => 3,
                'city_to_id' => 2,
                'name' => collect([
                    'en' => 'Products',
                    'ua' => 'Продукти'
                ]),
                'volume' => 2,
                'photo' => 'images/products.jpg'
            ],
        ]);
    }
}
