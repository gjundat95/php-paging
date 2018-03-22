<?php
  require_once 'Controllers/UserController.php';

  class Bootstrap {
    private $controller = null;

    public function __construct() {
      $this->controller = new UserController();
      $this->controller->find();
    }
  }

?>