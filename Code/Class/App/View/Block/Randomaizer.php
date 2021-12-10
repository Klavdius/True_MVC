<?php

namespace App\View\Block;

use Core\Factory;

class Randomaizer extends \Core\Model\Request
{
    private $arrDeck;

    private $factory;


    public function __construct()
    {
        $this->factory = new Factory();
        $this->factory::createSingleton($this);
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

    public function getArrFirst($number = null)
    {
        static $arrFirst = null;
        if (is_null($arrFirst)){
            for ($i = 0; $i < 7; $i++) {
                $arrDeck = $this->getArrDeck();
                $this->$arrFirst[$i] = array_shift($arrDeck);
            }
        }
        return is_null($number) ? $arrFirst : ( (array_key_exists($number, $arrFirst))  ? $arrFirst[$number] : null) ;
    }

    public function getArrSecond($number = null)
    {
        static $arrSecond = null;
        if (is_null($arrSecond)){
            for ($i = 0; $i < 7; $i++) {
                $arrDeck = $this->getArrDeck();
                $this->$arrSecond[$i] = array_shift($arrDeck);
            }
        }
        return is_null($number) ? $arrSecond : ( (array_key_exists($number,$arrSecond)) ? $arrSecond[$number] : null);
    }

    public function getArrDeck()
    {
        static $arrDeck = null;
        !is_null($arrDeck) ?: $arrDeck = $this->buildDeck();
        return $arrDeck;
    }













}