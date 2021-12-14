<?php

namespace App\View\Block;



class Randomaizer extends \Core\Model\Request
{
    private $arrDeck;

    private $factory;


    public function __construct()
    {

    }

    public static function createSingleton(string $classname)
    {
        if (!isset(self::$singletons[$classname])) {
            $singleton = self::create($classname);
            if ($singleton) {
                self::$singletons[$classname] = $singleton;
            }
        }

        return self::$singletons[$classname] ?? null;
    }

    public static function create(string $classname)
    {
        if (class_exists($classname)) {
            return new $classname;
        }
        return null;
    }

    public static function getArrFirst($number = null)
    {
        static $arrFirst = null;
        if (is_null($arrFirst)){
            $arrDeck = Randomaizer::getArrDeck();
            $j = 0;
            for ($i = 0; $i < 7; $i++) {
                $arrFirst[$i] = $arrDeck[$j];
                $j +=2;
            }
        }
        return is_null($number) ? $arrFirst : ( (array_key_exists($number, $arrFirst))  ? $arrFirst[$number] : null) ;
    }

    public static function getArrSecond($number = null)
    {
        static $arrSecond = null;
        if (is_null($arrSecond)){
            $arrDeck = Randomaizer::getArrDeck();
            $j = 1;
            for ($i = 0; $i < 7; $i++) {

                $arrSecond[$i] = $arrDeck[$j];
                $j +=2;
            }
        }
        return is_null($number) ? $arrSecond : ( (array_key_exists($number,$arrSecond)) ? $arrSecond[$number] : null);
    }

    public static function getBattelfild($number = null)
    {
        static $battelfild = null;
        if (is_null($battelfild))
        {
            $battelfild[0] = "Равнины";
            $battelfild[1] = "Холмы";
            $battelfild[2] = "Крепость";
            $battelfild[3] = "Замок";
            $battelfild[4] = "Город";
            $battelfild[5] = "Сторожевая башня";
            $battelfild[6] = "Болото";
            $battelfild[7] = "Река";
            $battelfild[8] = "Лес";
            shuffle($battelfild);
        }
        return $battelfild;
    }
    public static function getArrDeck()
    {
        static $arrDeck = null;
        if (is_null($arrDeck))
        {
            for ($i = 0; $i < 60; $i++) {
                $arrDeck[$i] = $i;
                shuffle($arrDeck);
            }
        }
        return $arrDeck;
    }














}