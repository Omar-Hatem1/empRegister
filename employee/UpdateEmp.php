<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';

$id = $_GET['updateid'];
$printName = "";
$printEmail = "";
$printPassword = "";
$printSalary = "";
$dep_id;
if (isset($_POST['show'])) {
  $show = "SELECT * FROM `employee` WHERE id = $id";
  $query = mysqli_query($connection, $show);
  $row = mysqli_fetch_assoc($query);
  $printName = $row['name'];
  $printEmail = $row['email'];
  $printPassword = $row['pass'];
  $printSalary = $row['salary'];
  $dep_id = $row['dep_id'];
}

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['pass'];
  $salary = $_POST['salary'];
  $dep_id = $_POST['dep_id'];
  $update = "UPDATE `employee` SET id=$id,`name`='$name',email='$email',`pass`='$password',salary='$salary', dep_id = $dep_id WHERE id = $id";
  $query = mysqli_query($connection, $update);
  path('employee/DisplayDep.php');
}



?>
<div class="container my-5">
  <form method="POST">
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" placeholder="Enter your name" name="name" value=<?= $printName ?>>
    </div>

    <div class="form-group">
      <label>Email Address</label>
      <input type="email" class="form-control" placeholder="Enter your Email" name="email" value=<?= $printEmail ?>>
    </div>

    <div class="form-group">
      <label>Salary</label>
      <input type="text" class="form-control" placeholder="Enter your Salary" name="salary" value=<?= $printSalary ?>>
    </div>

    <div class="form-group">
      <label>Password</label>
      <input type="password" class="form-control" placeholder="Enter your Password" name="pass" value=<?= $printPassword ?>>
    </div>

    <div class="form-group">
      <label for="dep_id">Department</label>

      <select class="form-control" name="dep_id" id="dep_id" required>
        <?php
        $depart = "SELECT * FROM `department`";
        $query = mysqli_query($connection, $depart);
        ?>
        <?php foreach ($query as $data) { ?>
          <option value="<?= $data['id'] ?>"> <?= $data['dep'] ?> </option>
        <?php } ?>
      </select>

    </div>

    <button type="submit" class="btn btn-primary" name="submit">Update</button>
    <button type="submit" class="btn btn-primary" name="show">Show my Info</button>
  </form>
</div>
<?php
include '../shared/footer.php';
?>