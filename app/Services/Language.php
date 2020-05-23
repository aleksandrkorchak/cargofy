<?php


namespace App\Services;


class Language
{
    /**
     * Get languages with path for menu
     *
     * @param $path
     * @return \string[][]
     */
    public function getLanguagesWithPath($path)
    {


        $segments = explode('/', trim($path, '/'));
        $endPath = '';

        $indexFrom = array_search('from', $segments);
        if (false !== $indexFrom) {
            $endPath = implode('/', array_slice($segments, $indexFrom));
        }

        $languages = [
            'en' => [
                'name' => 'English',
                'path' => '/' . $endPath
            ],
            'ua' => [
                'name' => 'Українська',
                'path' => '/ua/' . $endPath
            ]
        ];

        return $languages;
    }
}
