
<?php
class Dbh {
    private $servername;
    private $user;
    private $pass;
    private $dbname;    
    /*
    public function __contruct(){
        $dsn='mysql:host'.$this->host.';dbname='.$this->dbname;
        $options =array(
        PDO:ATTR_PERSISTENT  => true,
        PDO:ATTR_ERRMODE     => PDO::ERRMODE_EXCEPTION
        );
        try {
            $this->dbh = new PDO
        }
    }*/
    
    protected function connect(){
    $this->servername="localhost";
    $this->user="Audric2";
    $this->pass="audric";
    $this->dbname="Audric2";
        $conn= new mysqli($this->servername,$this->user,$this->pass,$this->dbname);
        return $conn;
        
    }
    
}