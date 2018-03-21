<?php
  require_once('libs/Database.php');

  class UserModel {
    
    private $con = null;
    public $limit = 5;
    public $page = 0;

    public function __construct() {
      $this->con = Database::connect();
    }

    public function getCountUsers() {
      $sql = 'SELECT Count(*) FROM wp_users';
      $stmt = $this->con->prepare($sql);
      $stmt->setFetchMode(PDO::FETCH_OBJ);
      $stmt->execute();
      $counts = $stmt->fetchColumn(); 
      return $counts;
    }

    public function getTotalPage() {
      $total = intval($this->getCountUsers());
      return ceil($total / $this->limit);
    }

    public function getUsers() {

      $total = intval($this->getCountUsers());
      $this->page = isset($_GET['page']) ? intval($_GET['page']) : 1;

      $offset = isset($_GET['page']) ? ($this->page * $this->limit) : 0;

      $sql = 'SELECT ID,user_email,display_name FROM wp_users LIMIT :limit OFFSET :offset';
      $stmt = $this->con->prepare($sql);
      $stmt->bindParam(':limit',$this->limit, PDO::PARAM_INT);
      $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
      $stmt->setFetchMode(PDO::FETCH_OBJ);
      $stmt->execute();
      $stmt = $stmt->fetchAll();

      return $stmt;
    }

    public function findUserByName($name) {

      $total = intval($this->getCountUsers());
      $this->page = isset($_GET['page']) ? intval($_GET['page']) : 1;

      $offset = isset($_GET['page']) ? ($this->page * $this->limit) : 0;

      $sql = 'SELECT ID,user_email,display_name FROM wp_users WHERE display_name like :name LIMIT :limit OFFSET :offset';
      $stmt = $this->con->prepare($sql);
      $stmt->bindParam(':name',$name, PDO::PARAM_STR);
      $stmt->bindParam(':limit',$this->limit, PDO::PARAM_INT);
      $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
      $stmt->setFetchMode(PDO::FETCH_OBJ);
      $stmt->execute();
      $stmt = $stmt->fetchAll();
      return $stmt;
    }

    public function onClickFind() {
      echo "click find";
    }

    public function onClickClear() {
      echo "click clear";
    }

  }

?>
