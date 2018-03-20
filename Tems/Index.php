<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div>

    <table>
      <tr>
        <td>Enter infor: </td>
        <td><input type="text" class="form-control" id="usr"></td>
        <td><button type="button" class="btn btn-default" onclick="onClickFind()">Find</button></td>
        <td><button type="button" class="btn btn-default" onclick="onClickClear()">Clear</button></td>
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
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item active">
          <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>

  </div>
</body>
</html>