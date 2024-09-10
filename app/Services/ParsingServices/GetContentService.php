<?php

namespace App\Services\ParsingServices;
use phpQuery;


class GetContentService
{

       public function getSiteContent($url)
    {

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_COOKIEFILE, '/cookies/cookie.txt');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0');
        $site_content = curl_exec($ch);
        curl_close($ch);
        $site_content = phpQuery::newDocument($site_content);
        return ($site_content);
    }
}
