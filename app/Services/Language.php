<?php


namespace App\Services;


class Language
{
    public function getLanguagesWithPath($path)
    {
//        $path = '/from/lviv';
        $segments = explode('/', trim($path, '/'));


        $languages = [
            'en' => [
                'name' => 'English',
                'path' => ''
            ],
            'ua' => [
                'name' => 'Українська',
                'path' => ''
            ]
        ];


        switch (count($segments)){
            case 0:
            case 1:
                $languages['en']['path'] = '/';
                $languages['ua']['path'] = '/ua';
                break;
            case 2:
                $languages['en']['path'] = "/{$segments[0]}/{$segments[1]}";
                $languages['ua']['path'] = "/ua/{$segments[0]}/{$segments[1]}";
                break;
            case 3:
                $languages['en']['path'] = "/{$segments[1]}/{$segments[2]}";
                $languages['ua']['path'] = "/ua/{$segments[1]}/{$segments[2]}";

        }


        return $languages;

    }
}
