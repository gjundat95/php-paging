<?php
  class UserView {

    public function index($data, $page, $totalPage) {
      require_once 'Tems/Index.php';
    }
    
    public function find($data, $page, $totalPage) {
      require_once 'Tems/Find.php';
    }
    
  }
?>