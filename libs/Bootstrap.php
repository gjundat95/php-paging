<?php
  require_once 'Controllers/UserController.php';

  class Bootstrap {
    private $controller = null;

    public function __construct() {
      $this->controller = new UserController();
      
      $action = isset($_GET['action']) ? $_GET['action'] : null;
      if ($action != null) {
        switch($action) {
          case 'none' :
            $this->controller->index();
            break;
          case 'findUserByName' :
            $this->controller->findUserByName();
            break;
          default:   
            $this->controller->index();
            break;
        }
      } else {
        $this->controller->index();
      }
    }
  }

?>