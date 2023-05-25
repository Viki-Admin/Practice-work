<?php
//  Методы самолета
 abstract class Airplane
{
    public $name_text;
    public $pos;
    public $status;
    public $res = false;

    public $ready = true;
    public $cleaning = true;
    public $painting = true;

    public function __construct($name_text, $res)
    {
        $this->name_text=$name_text;
        $this->res=$res;
    }

    public function take_off()
    {
        $this->status = "Посадка";
        $this->res = false;
        echo "Самолет {$this->name_text}. Статус: {$this->status}<br>";
    }

    public function takeoff()
    {
        $this->status = "Взлет";
        $this->res = true;
        echo "Самолет {$this->name_text}. Статус: {$this->status}<br>";
    }

    public function Res(){
        if($this->res == true){
            return "В воздухе";
        }
        if($this->res == false){
            return "На земле";
        }
    }
    
}

// Методы самолета МИГ
class MIG extends Airplane {
    
    public function ataca()
    {
        $this->status = "Атака";
        $this->res = false;
        echo "Самолет {$this->name_text}. Статус: {$this->status}<br>";
    }
}

// Методы самолета ТУ-154
class TY_154 extends Airplane {
    
}



// Методы аэропорта
class Airport
{
    public $air;
    public $airpot = array();

    public function __construct($air)
    {
        $this->air=$air;
    }

    public function Air($airpot)
    {
        if (count($this->airpot) < $this->air)
        {
            $airpot->take_off();
            $this->airpot[] = $airpot;
            echo " Самолет {$airpot->name_text} принят в аэропорт.<br>";
        }
        else
        {
            echo "В аэропорте закончились места.<br>";
        }
        echo"<br>";
    }


    public function Pot($airpot)
    {
        $key = array_search($airpot, $this->airpot);

        if( $key !== false)
        {
            $airpot->takeoff();
            echo " Самолет {$airpot->name_text} освободил место и улетел.<br>";
        }
        echo "<br>";
            
    }

    public function Port($airpot)
    {
        if ($airpot->ready == true)
        {
            $airpot->ready = false;
            echo " Самолет {$airpot->name_text} ушел на стоянку.<br>";
        }
        else
        {
            echo "Самолет не смог уйти на стоянку.<br>";
        }
        echo"<br>";
    }

    public function Pors($airpot)
    {
        if ($airpot->ready == false)
        {
            $airpot->ready = true;
            echo " Самолет {$airpot->name_text} готов взлетать.<br>";
        }
        else
        {
            echo "Самолет не смог взлететь.<br>";
        }
        echo"<br>";
    }

    public function Pops($airpot)
    {
        if ($airpot->cleaning == true)
        {
            $airpot->ready = false;
            echo " Самолет {$airpot->name_text} готов к уборке.<br>";
        }
        else
        {
            echo "Самолет уже убран.<br>";
        }
        echo"<br>";
    }

    public function paint($airpot)
    {
        if ($airpot->painting == true)
        {
            $airpot->painting = false;
            echo " Самолет {$airpot->name_text} готов к покраске.<br>";
        }
        else
        {
            echo "Самолет уже покрашен.<br>";
        }
        echo"<br>";
    }
}


// Association
$MIG = new MIG ("МИГ", 30000);
$TY_154 = new TY_154 ("ТУ-154", 130000);
$Airport = new Airport (10);

// Aggregation
$Airport->Air($MIG);

// Composition
$Airport->Air( new MIG ("МИГ-131313", 1313));


$TY_154->take_off();

echo"Самалет {$TY_154->name_text} сейчас находиться {$TY_154->Res()}<br>";

$TY_154->takeoff();
echo"Самалет {$TY_154->name_text} сейчас находиться {$TY_154->Res()}<br>";

$MIG->take_off();
echo"Самалет {$MIG->name_text} сейчас находиться {$MIG->Res()}<br>";

$MIG->takeoff();
echo"Самалет {$MIG->name_text} сейчас находиться {$MIG->Res()}<br>";

$MIG->ataca();

$Airport->air($MIG);
$Airport->air($TY_154);

$Airport->Port($MIG);
$Airport->Port($TY_154);

$Airport->Pot($MIG);
$Airport->Pot($TY_154);

$Airport->Pors($MIG);
$Airport->Pors($TY_154);

$Airport->Pops($MIG);
$Airport->Pops($TY_154);

$Airport->paint($MIG);
$Airport->paint($TY_154);


// $Airport->Pot($MIG);
// $Airport->Pot($TY_154);








?>