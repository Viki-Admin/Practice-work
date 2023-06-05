<?php

class Database{

    public $lins;

    public function __construct()
    {
        $this->connect();
    }

    public function connect(){
        $confing = require_once 'confing.php';

        $dsn = 'mysql:host='.$confing['host'].';dbname='.$confing['db_name'].';charset='.$confing['charset'].'';

        $this->lins = new PDO ($dsn, $confing['username'], $confing['password']);

        return $this;
    }

    public function execute($sql)
    {
        $sth = $this->lins->prepare($sql);

        return $sth->execute();
    }

    public function query($sql)
    {
        $exe = $this->execute($sql);

        $result = $exe->fetchALL(PDO::FETCH_ASSOC);

        if($result === false)
        {
            return[];
        }

        return $result;
    }
}

?>