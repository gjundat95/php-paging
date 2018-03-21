<?php
  require_once('libs/Database.php');

  class UserModel {
    
    private $con = null;

    public function __construct() {
      $this->con = Database::connect();
    }

    public function getUsers() {

      $sql = 'SELECT ID,user_email,display_name FROM wp_users';
      $stmt = $this->con->prepare($sql);
      $stmt->setFetchMode(PDO::FETCH_OBJ);
      $stmt->execute();
      $stmt = $stmt->fetchAll();
      return $stmt;

    }

    public function findUserByName($name) {
      $sql = 'SELECT ID,user_email,display_name FROM wp_users WHERE display_name like ?';
      $stmt = $this->con->prepare($sql);
      $stmt->setFetchMode(PDO::FETCH_OBJ);
      $stmt->execute(array($name));
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
