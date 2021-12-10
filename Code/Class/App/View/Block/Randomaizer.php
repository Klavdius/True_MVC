<?php

namespace App\View\Block;



class Randomaizer extends \Core\Model\Request
{
    private $arrDeck;

    private $factory;


    public function __construct()
    {
       echo "1";
    }

    private function buildDeck()
    {
        for ($i = 0; $i < 60; $i++) {
            $this->arrDeck[$i] = $i;
            shuffle($this->arrDeck);
        }
        return $this->arrDeck;
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
            for ($i = 0; $i < 7; $i++) {
                $arrFirst[$i] = array_shift($arrDeck);
            }
        }
        return is_null($number) ? $arrFirst : ( (array_key_exists($number, $arrFirst))  ? $arrFirst[$number] : null) ;
    }

    public static function getArrSecond($number = null)
    {
        static $arrSecond = null;
        if (is_null($arrSecond)){
            $arrDeck = Randomaizer::getArrDeck();
            for ($i = 0; $i < 7; $i++) {
                $arrSecond[$i] = array_shift($arrDeck);
            }
        }
        return is_null($number) ? $arrSecond : ( (array_key_exists($number,$arrSecond)) ? $arrSecond[$number] : null);
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