<?php

namespace Core\Tools;

class MasterUrl
{
    public static function UrlSplit($url)
    {

        $url = str_replace('/index.php', '', $url);
        $url = trim($url, '/');
        $arrUrl = explode('/', $url);
        return $arrUrl;
    }

    public function varPrint($name)
    {
        echo '<pre>';
        var_dump($name);
        echo '</pre>';
    }

}