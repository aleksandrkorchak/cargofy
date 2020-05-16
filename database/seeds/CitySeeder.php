<?php

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            [
                'name' => collect([
                    'ua' => 'Київ',
                    'en' => 'Kyiv'
                ])->toJson(),
                'slug' => Str::slug('Київ'),
                'lat' => 50.450100,
                'lng' => 30.523400
            ],
            [
                'name' => collect([
                    'ua' => 'Вінниця',
                    'en' => 'Vinnytsia'
                ])->toJson(),
                'slug' => Str::slug('Вінниця'),
                'lat' => 49.233083,
                'lng' => 28.468217
            ],
            [
                'name' => collect([
                    'ua' => 'Львів',
                    'en' => 'Lviv'
                ])->toJson(),
                'slug' => Str::slug('Львів'),
                'lat' => 49.839683,
                'lng' => 24.029717
            ],
            [
                'name' => collect([
                    'ua' => 'Одеса',
                    'en' => 'Odessa'
                ])->toJson(),
                'slug' => Str::slug('Одеса'),
                'lat' => 46.482526,
                'lng' => 30.723310
            ],
            [
                'name' => collect([
                    'ua' => 'Харків',
                    'en' => 'Kharkiv'
                ])->toJson(),
                'slug' => Str::slug('Харків'),
                'lat' => 49.993500,
                'lng' => 36.230383
            ],
            [
                'name' => collect([
                    'ua' => 'Дніпро',
                    'en' => 'Dnipro'
                ])->toJson(),
                'slug' => Str::slug('Дніпро'),
                'lat' => 48.464717,
                'lng' => 35.046183
            ],
        ]);
    }
}
