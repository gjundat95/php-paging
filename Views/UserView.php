<?php
  class UserView {

    public function index($data, $page, $totalPage) {
      require_once 'Templates/index.php';
    }
    
    public function find($data, $page, $totalPage) {
      require_once 'Templates/find.php';
    }
    
  }
?>