<?php 

require_once('connection.php');
$GLOBALS['connection'] = $connection;

class MenuItems {
    private $db;

    function __construct() {
        $this->db = $GLOBALS['connection'];
    }

    public function viewMenu() {
        $menus = $this->db->query('SELECT * FROM menu WHERE 1')->fetchAll();
        return $menus;  
    }

    public function getItemById($id) {
        try {
            $query = 'SELECT * FROM menu WHERE id = :id';
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $item = $stmt->fetch(PDO::FETCH_ASSOC);
            return $item;
        } catch (PDOException $e) {
            echo "Error fetching item: " . $e->getMessage();
            return null;
        }
    }
}
?>
