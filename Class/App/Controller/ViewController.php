<?php

namespace App\Controller;


class ViewController extends \Core\Model\Request
{
    private $view;
    private $table;
    private $dFirst;
    private $dSecond;

    public function __construct()
    {
        $this->table = new TableController();
        $this->dFirst = $this->table->getArrFirst();
        $this->dSecond = $this->table->getArrSecond();


    }

    public function toHtml($viewName)
    {
        $filePath = BD . DS . 'Code' . DS . 'Class' . DS . 'App' . DS . 'View' . DS. $viewName. '.phtml';
        if (file_exists($filePath)) {
            require_once $filePath;
        }
    }

    public function sendPage()
    {
        echo <<<END
            
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <!--    <link rel="stylesheet" type="text/css" href="/css/style.css" />-->
                <title>Поле битвы</title>
                <link rel="stylesheet" type="text/css" href="/css/style.css" />
            </head>
            
            
            <form>
                <body>
                    <br>
                        <h1>Добро пожаловать!</h1>
                    <br>
                        <h1>Карты первого игрока</h1>
                        <ul>
                            <li>
                              $this->dFirst[0]
                            </li>
            
                        </ul>
            
                    <br>
            
                </body>
            </form>

END;
    }


}