<?php 
include('connection.php');
$GLOBALS['connection'] = $connection;



class Orders{
    private $connection;
    function __construct()
    {
        $this->connection = $GLOBALS['connection'];
    }

    public function processTransaction(){
        $data = $this->connection->query('SELECT * FROM online_order WHERE 1')->fetchAll();
    }
}
?>