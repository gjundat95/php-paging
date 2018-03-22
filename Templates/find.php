<?php
  $name_temp = isset($name) ? $name: null;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  
  <link rel="stylesheet" href="Templates/styles.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

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

  <div id="container">

    <table>
      <tr>
      <td><p id="textFind">Find User: </p></td>
        <td><input type="text" id="txtName"></td>
        <td><button id="btnFind" type="button"  onClick="finds()" >Find</button></td>
        <td><button id="btnClear" type="button"  onClick="clears()" >Clear</button></td>
      </tr>
    </table>

    <table class="table table-striped" id="table-list-user">
      <thead>
        <tr>
          <th id="column-table-name">Name</th>
          <th id="column-table-email">Email</th>
          <th id="column-table-select"></th>
        </tr>
      </thead>
      <tbody>

        <?php
          foreach($data as $item) {
            echo '<tr>';
            echo '<td id="column-table-name">'.$item->display_name.'</td>';
            echo '<td id="column-table-email">'.$item->user_email.'</td>';
            echo '<td id="column-table-select"><button type="button" class="btn btn-default">Select</button></td>';
            echo '</tr>';
          }
        ?>
      
      </tbody>
    </table>

  </div>

  <nav aria-label="...">
      <ul class="pagination">
        <?php

          $links = 5;
          $start = ($page - $links) > 0 ? $page - $links : 0;
          $end =   ($page + $links) < $totalPage ? $page + $links : $totalPage;
          $name = isset($_COOKIE['name']) ? $_COOKIE['name'] : '';

          ?>
          <li class="page-item "><a class="page-link" href="?action=find&name=<?php echo $_COOKIE['name'] ?>&page=0"><<</a></li>
          <?php

          if($page == 0 && $totalPage >= 10) {
            for($i = 0; $i < 10; $i++) {
              $position = $i + 1;
              $url = '?action=find&page='.$i.'&name='.$name;
  
              if($page == $i) {
                echo '<li class="page-item active"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
              } else {
                echo '<li class="page-item"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
              }
            }
          }

          if($page == 0 && $totalPage < 10) {
            for($i = 0; $i < $totalPage; $i++) {
              $position = $i + 1;
              $url = '?action=find&page='.$i.'&name='.$name;
  
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
              $url = '?action=find&page='.$i.'&name='.$name;
  
              if($page == $i) {
                echo '<li class="page-item active"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
              } else {
                echo '<li class="page-item"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
              }
            }
          }

          if($page+1 == $totalPage && $totalPage <= 10) {
            if($page != 0) {
              for($i = 0; $i < $totalPage; $i++) {
                $position = $i + 1;
                $url = '?action=find&page='.$i.'&name='.$name;
    
                if($page == $i) {
                  echo '<li class="page-item active"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
                } else {
                  echo '<li class="page-item"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
                }
              }
            }
          }

          if($page != 0 && $page+1 != $totalPage) {
            if($totalPage < 10) {
              for($i = 0; $i < $totalPage; $i++) {
                $position = $i + 1;
                $url = '?action=find&page='.$i.'&name='.$name;
    
                if($page == $i) {
                  echo '<li class="page-item active"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
                } else {
                  echo '<li class="page-item"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
                }
              }
            } else {
              if($page < 5) {
                for($i = 0; $i < 10; $i++) {
                  $position = $i + 1;
                  $url = '?action=find&page='.$i.'&name='.$name;
      
                  if($page == $i) {
                    echo '<li class="page-item active"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
                  } else {
                    echo '<li class="page-item"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
                  }
                }
              } else {
                for($i = $start; $i < $end; $i++) {
                  $position = $i + 1;
                  $url = '?action=find&page='.$i.'&name='.$name;
      
                  if($page == $i) {
                    echo '<li class="page-item active"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
                  } else {
                    echo '<li class="page-item"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
                  }
                }
              }
            }
          }

          ?>
          <li class="page-item "><a class="page-link" href="?action=find&name=<?php echo $name ?>&page=<?php echo ($totalPage-1) ?>">>></a></li>
         <?php
          
        ?>
       

      </ul>
  </nav>


  <script type="text/javascript">
    document.getElementById("txtName").value = unescape(getCookie('name'));
    document.getElementById("txtName")
    .addEventListener("keyup", function(event) {
        event.preventDefault();
        if (event.keyCode === 13) {
            finds();
        }
    });
  </script>        

</body>
</html>