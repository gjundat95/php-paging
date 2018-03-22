<?php
  $name_temp = isset($name) ? $name: '';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }  

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function finds() {
      var name = escape(document.getElementById('txtName').value);
      setCookie('name', name, 1);
      location.href = "?action=find&page=0&name="+name;
    };

    function clears() {
        setCookie('name', '', 0);
        location.href = "?action=none&page=0";
    };

  </script>
</head>
<body>
  <div>

    <table>
      <tr>
        <td>Find User: </td>
        <td><input type="text" class="form-control" id="txtName"></td>
        <td><button id="btnFind" type="button" class="btn btn-default" onClick="finds()" >Find</button></td>
        <td><button id="btnClear" type="button" class="btn btn-default" onClick="clears()" >Clear</button></td>
      </tr>
    </table>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

        <?php
          foreach($data as $item) {
            echo '<tr>';
            echo '<td>'.$item->display_name.'</td>';
            echo '<td>'.$item->user_email.'</td>';
            echo '<td><button type="button" class="btn btn-default">Select</button></td>';
            echo '</tr>';
          }
        ?>
      
      </tbody>
    </table>

    <nav aria-label="...">
      <ul class="pagination">
        <?php

          $links = 5;
          $start = ($page - $links) > 0 ? $page - $links : 0;
          $end =   ($page + $links) < $totalPage ? $page + $links : $totalPage;

          ?>
          <li class="page-item "><a class="page-link" href="?action=find&name=<?php echo $_COOKIE['name'] ?>&page=0"><<</a></li>
          <?php

          if($page == 0 && $totalPage >= 10) {
            for($i = 0; $i < 10; $i++) {
              $position = $i + 1;
              $url = '?action=find&page='.$i.'&name='.$_COOKIE['name'];
  
              if($page == $i) {
                echo '<li class="page-item active"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
              } else {
                echo '<li class="page-item"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
              }
            }
          }

          if($page == 0 && $totalPage <= 10) {
            for($i = 0; $i < $totalPage; $i++) {
              $position = $i + 1;
              $url = '?action=find&page='.$i.'&name='.$_COOKIE['name'];
  
              if($page == $i) {
                echo '<li class="page-item active"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
              } else {
                echo '<li class="page-item"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
              }
            }
          }

          if($page+1 == $totalPage && $totalPage >= 10) {
            for($i = $totalPage - 10; $i < $totalPage; $i++) {
              $position = $i + 1;
              $url = '?action=find&page='.$i.'&name='.$_COOKIE['name'];
  
              if($page == $i) {
                echo '<li class="page-item active"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
              } else {
                echo '<li class="page-item"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
              }
            }
          }

          if($page+1 == $totalPage && $totalPage <= 10) {
            for($i = 0; $i < $totalPage; $i++) {
              $position = $i + 1;
              $url = '?action=find&page='.$i.'&name='.$_COOKIE['name'];
  
              if($page == $i) {
                echo '<li class="page-item active"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
              } else {
                echo '<li class="page-item"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
              }
            }
          }

          if($page != 0 && $page+1 != $totalPage) {
            for($i = 0; $i < 10; $i++) {
              $position = $i + 1;
              $url = '?action=find&page='.$i.'&name='.$_COOKIE['name'];
  
              if($page == $i) {
                echo '<li class="page-item active"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
              } else {
                echo '<li class="page-item"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
              }
            }
          }

          ?>
          <li class="page-item "><a class="page-link" href="?action=find&name=<?php echo $_COOKIE['name'] ?>&page=<?php echo ($totalPage-1) ?>">>></a></li>
         <?php
          
        ?>
       

      </ul>
    </nav>

  </div>
</body>
</html>