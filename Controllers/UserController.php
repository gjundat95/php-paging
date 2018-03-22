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
      $countUser = $this->model->getCountUsers();
      $data = $this->model->getUsers();
      $totalPage = $this->model->getTotalPage();
      $this->view->index($data, $this->model->page, $totalPage);
    }

    public function find() {
      if (isset($_GET['name'])) {
        $name = $_GET['name'];
        $data = $this->model->findUserByName('%'.$name.'%');
        $totalPage = $this->model->getTotalPage();
        $this->view->find($data, $this->model->page, $totalPage);
      }
    }

  }

?> 
