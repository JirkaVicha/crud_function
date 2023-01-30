<?php
// Include function file
require_once 'function.php';

// Deletion
if (isset($_GET['del'])) {
  // Getting deletion row id
  $rid = $_GET['del'];
  $deletedata = new DB_con();
  $sql = $deletedata->delete($rid);
  if ($sql) {
    // Message for successfull deletion
    echo "<script>alert('Record deleted successfully');</script>";
    echo "<script>window.location.href='index.php'</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP CRUD Operations using PHP OOP </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        
    </style>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>PHP CRUD Operation using PHP OOP</h3>
        <hr />
        <a href="insert.php"><button class="btn btn-primary">Insert Record</button></a>
        <div class="table-responsive">
          <table id="mytable" class="table table-bordered table-striped">
            <thead>
              <th>#</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Contact</th>
              <th>Address</th>
              <th>Posting Date</th>
              <th>Edit</th>
              <th>Delete</th>
            </thead>

            <tbody>
              <?php
              $fetchdata = new DB_con();
              $sql = $fetchdata->fetchdata();
              $cnt = 1;
              while ($row = mysqli_fetch_array($sql)) {
                ?>
                <tr>
                  <td><?php echo htmlentities($cnt); ?></td>
                  <td><?php echo htmlentities($row['first_name']); ?></td>
                  <td><?php echo htmlentities($row['last_name']); ?></td>
                  <td><?php echo htmlentities($row['email_id']); ?></td>
                  <td><?php echo htmlentities($row['contact_number']); ?></td>
                  <td><?php echo htmlentities($row['address']); ?></td>
                  <td><?php echo htmlentities($row['posting_date']); ?></td>
                  <td><a href="update.php?id=<?php echo htmlentities($row['id']); ?>">
                      <button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a></td>
                  <td><a href="index.php?del=<?php echo htmlentities($row['id']); ?>"><button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><span class="glyphicon glyphicon-trash"></span></button></a></td>
                </tr>
                <?php
                // for serial number increment
                $cnt++;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</body>
</html>