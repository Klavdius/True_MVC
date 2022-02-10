<?php

namespace App\View\Block\dbActive;

use App\View\Block\dbActive\dbMvcConnect;

class dbConnect extends \Core\Block\Template
{
    public $myConnect;
    public $myPdo;

    public function __construct()
    {
        $this->myConnect = new dbMvcConnect();
        $this->myPdo = $this->myConnect->getForPDO();
    }

    public function showTable()
    {
        $command = 'SHOW TABLES  FROM `dbmvc`';
        $res =  $this->myPdo->query($command)->fetchAll($this->myPdo::FETCH_COLUMN);
        $optionArr=null;
        foreach ($res as $value){
            $optionArr=$optionArr.'
            <option value="'.$value.'">'.$value.' </option>
            ';
        }
        $arrBtn=null;
        $arrBtn=$arrBtn . '<br>
        <select id="idSelectTableShow" name="selectTable" size="'.count($res).'" data-show="show">'.$optionArr.

        '</select>
        ';
        echo $arrBtn;
    }

    public function tableShow($tableName){
        $command = 'SELECT * FROM '. $tableName;
        $result = $this->myPdo->query($command)->fetchAll($this->myPdo::FETCH_ASSOC);
        $resultKey = $result[0];
        $tableKey = [];
        foreach ($resultKey as $needKey){
            array_push($tableKey,array_search($needKey,$resultKey));
        }
        foreach($tableKey as $runner){
            echo $runner . " ";
        }
        echo '<br>';
        foreach ($result as $runner){
           foreach ($runner as $value){
               echo $value . " ";
           }
           echo "<br>";

        }

    }
}