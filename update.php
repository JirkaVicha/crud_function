<?php
// Include function file
include_once('function.php');

// Object
$updatedata = new DB_con();
if (isset($_POST['update'])) {
  // Get the userid
  $userid = intval($_GET['id']);
  // Posted Values
  $fname = $_POST['first_name'];
  $lname = $_POST['last_name'];
  $emailid = $_POST['email_id'];
  $contactno = $_POST['contact_number'];
  $address = $_POST['address'];

  // Function Calling
  $sql = $updatedata->update($fname, $lname, $emailid, $contactno, $address, $userid);
  // Message after updation
  echo "<script>alert('Record Updated successfully');</script>";
  // Code for redirection
  echo "<script>window.location.href='index.php'</script>";
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP CURD Operation using  PHP OOP </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="row">
<div class="col-md-12">
<h3>Update Record | PHP CRUD Operations using  PHP OOP</h3>
<hr />
</div>
</div>

<?php
// Get the userid
$userid = intval($_GET['id']);
$onerecord = new DB_con();
$sql = $onerecord->fetchonerecord($userid);
$cnt = 1;
while ($row = mysqli_fetch_array($sql)) {
  ?>
  <form name="insertrecord" method="post">
<div class="row">
<div class="col-md-4"><b>First Name</b>
<input type="text" name="first_name" value="<?php echo htmlentities($row['FirstName']);?>" class="form-control" required>
</div>
<div class="col-md-4"><b>Last Name</b>
<input type="text" name="last_name" value="<?php echo htmlentities($row['LastName']);?>" class="form-control" required>
</div>
</div>
<div class="row">
<div class="col-md-4"><b>Email id</b>
<input type="email" name="email_id" value="<?php echo htmlentities($row['EmailId']);?>" class="form-control" required>
</div>
<div class="col-md-4"><b>Contactno</b>
<input type="text" name="contact_number" value="<?php echo htmlentities($row['ContactNumber']);?>" class="form-control" maxlength="10" required>
</div>
</div>
<div class="row">
<div class="col-md-8"><b>Address</b>
<textarea class="form-control" name="address" required><?php echo htmlentities($row['Address']);?></textarea>
</div>
</div>
<?php } ?>
<div class="row" style="margin-top: 1%">
<div class="col-md-8">
  <input type="submit" name="update" value="Update">
</div>
</div>
</form>
