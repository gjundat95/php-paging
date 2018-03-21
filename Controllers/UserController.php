<?php
  require_once 'Models/UserModel.php';
  require_once 'Views/UserView.php';

  class UserController {

    private $model = null;
    private $view = null;

    function __construct() {
      $this->model = new UserModel();
      $this->view = new UserView();
    }

    public function index() {
      $data = $this->model->getUsers();
      $this->view->index($data);
    }

    public function find() {
     
      if (isset($_GET['name'])) {
        $name = $_GET['name'];
        $data = $this->model->findUserByName('%'.$name.'%');
        $this->view->index($data);
      }
    }

  }

?> 
