<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Find User</title>
  <link rel="stylesheet" href="Templates/styles.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body id="body">

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

      function find_home() {
        var name = escape(document.getElementById('text-name').value);
        setCookie('name', name, 1);
        location.href = "?action=find&page=0&name="+name;
      };

      function clear_home() {
        setCookie('name', '', 0);
        location.href = "?action=none&page=0";
      };


      function closeDialog(id, name, mail) {
        var returnedValue = {
            id: id,
            name: name,
            mail: mail
        };

        if (window.showModalDialog) {//IE + FF + legacy Chrome
            if (window.opener)
            {
                window.opener.returnValue = returnedValue;
            }
            window.returnValue = returnedValue;
            window.close();
        }
        else {
            // Chrome support (& Opera?)
            console.log("Tuan anh");
            window.opener.SetReturnedValue(JSON.stringify(returnedValue));
            window.close();
        }
    };


  </script>  

  <div id="container">
    <table>
      <tr>
        <td><p id="text-find">Find User: </p></td>
        <td><input type="text" id="text-name"></td>
        <td><button id="button-find" type="button" onClick="find_home()" >Find</button></td>
        <td><button id="button-clear" type="button"  onClick="clear_home()" >Clear</button></td>
      </tr>
    </table>

    <table class="table table-striped" id="table-list-user">
      <thead style="background-color: #fff">
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
            ?>
            <td><button type="button" class="btn btn-default" onclick="closeDialog(&#39;<?php echo $item->ID; ?>&#39;,&#39;<?php echo $item->display_name; ?>&#39;,&#39;<?php echo $item->user_email; ?>&#39;)">Select</button></td>
            </tr>
            <?php
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

      ?>
      <li class="page-item "><a class="page-link" href="?action=none"><<</a></li>
      <?php

      if($page == 0 && $totalPage >= 10) {
        for($i = 0; $i < 10; $i++) {
          $position = $i + 1;
          $url = '?action=none&page='.$i;

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
          $url = '?action=none&page='.$i;

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
          $url = '?action=none&page='.$i;

          if($page == $i) {
            echo '<li class="page-item active"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
          } else {
            echo '<li class="page-item"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
          }
        }
      }

      if($page+1 == $totalPage && $totalPage < 10) {
        for($i = 0; $i < $totalPage; $i++) {
          $position = $i + 1;
          $url = '?action=none&page='.$i;

          if($page == $i) {
            echo '<li class="page-item active"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
          } else {
            echo '<li class="page-item"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
          }
        }
      }

      if($page != 0 && $page+1 != $totalPage) {
        if($totalPage < 10) {
          for($i = $start; $i < $totalPage; $i++) {
            $position = $i + 1;
            $url = '?action=none&page='.$i;

            if($page == $i) {
              echo '<li class="page-item active"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
            } else {
              echo '<li class="page-item"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
            }
          }
        } else {
          if($page < 5) {
            for($i = $start; $i < 10; $i++) {
              $position = $i + 1;
              $url = '?action=none&page='.$i;
  
              if($page == $i) {
                echo '<li class="page-item active"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
              } else {
                echo '<li class="page-item"><a class="page-link" href="'.$url.'">'.$position.'</a></li>';
              }
            }
          } else {
            for($i = $start; $i < $end; $i++) {
              $position = $i + 1;
              $url = '?action=none&page='.$i;
  
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
       <li class="page-item "><a class="page-link" href="?action=none&page=<?php echo ($totalPage - 1) ?>">>></a></li>
      <?php

    ?>
  </ul>
</nav>


</body>
</html>