<?php
namespace App\View\Block\dbActive;

use App\View\Block\dbActive\dbMvcConnect;

class dbConnect extends \Core\Block\Template
{
    public $myConnect;
    public $myPdo;
    public $number = 0;
    public $contentSelect;
    public $numberDiv = 0;
    public $contentNewTable;
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
    public function newCollum($value)
    {
        $this->contentNewTable = null;
        for($i = 0;$i < $value; $i++)
        {
            $this->contentNewTable = $this->contentNewTable . '<br>
        <input id="idNameCollum' . $this->getNumber().'" data-flag="flag" placeholder="Название столбца"  type="text" autocomplete="off" >

        <select name="select'.$this->getNumber().'" data-flag="flag" >
            <option selected disabled value="nope"> выбирите тип данных</option>
            <option value="FLOAT"> дробное</option>
            <option value="INT">числовая</option>
            <option value="varchar(60)">строка</option>
            <option value="DATETIME">дата и время</option>
        </select>
        
        ';
        }

        echo $this->contentNewTable;
    }

    public function inputForSelect()
    {
        $this->contentSelect = null;
        $this->contentSelect = "<option selected disabled value=\"nope\"> Выберите число колонок </option>";
        for($i = 1; $i < 21; $i++)
        {
            $this->contentSelect = $this->contentSelect . '<option value=\'' . $i . '\'> '.$i.'</option>';
        }
        echo $this->contentSelect;
    }

    public function creatNewTable($tableName,$arrInput,$arrSelect)
    {
        $ni = 0;
        $ns = 0;
        $prepareArray = [];
        $firstId = "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY";
        foreach($arrInput as &$ni){
            array_push($prepareArray,($ni. " " . array_shift($arrSelect))) ;
        }
        $prepareArray = implode(",",$prepareArray);
        echo $prepareArray;
        $n1 = 'CREATE TABLE' .' ' . $tableName. ' (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY ,'. $prepareArray .' )';
        $this->myPdo->query($n1);
//        echo $prepareArray;
    }
}
