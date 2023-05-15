<?php

declare(strict_types=1);

namespace App\Tasks;

class LoadPageTask
{

    /**
     * Get page content 
     *
     * @param string $url
     * @return string
     */
    public function run(string $url): string
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, $url);
        $content = curl_exec($curl);
        curl_close($curl);

        return $content;
    }
}
