<?php
namespace App\View\Block\dbActive;

use App\View\Block\dbActive\dbMvcConnect;

class dbConnect extends \Core\Block\Template
{
    public $myConnect;
    public $myPdo;
    public $number = 0;
    public $numberDiv = 0;
    public function __construct()
    {
        $this->myConnect = new dbMvcConnect();
        $this->myPdo = $this->myConnect->getForPDO();
    }

    public function getPDO()
    {
        return $this->myPdo;
    }

    public  function getNumber()
    {
        $this->number++;
        return $this->number;
    }
    public function getNumberDiv()
    {
        $this->numberDiv++;
        return $this->numberDiv;
    }
    public  function newCollum()
    {
        echo '<br>
        <input id="id' . $this->getNumber().'"  name="input'.$this->getNumber().'" type="text" autocomplete="off" >

        <select name="select'.$this->getNumber().'">
            <option selected disabled value="nope"> выбирите тип данных</option>
            <option value="FLOAT"> дробное</option>
            <option value="INT">числовая</option>
            <option value="varchar(60)">строка</option>
            <option value="DATETIME">дата и время</option>
        </select>
        <div id="idDivTarget'.$this->getNumberDiv().'">
        
        </div>
        ';
    }

}
