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
      $data = $this->model->getAllUsers();
      $this->view->index($data);
    }

    public function findUserByName() {
     
      if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $data = $this->model->findUserByName('%'.$name.'%');
        $this->view->index($data);
      }
    }

  }

?> 
