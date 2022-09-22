<?php
include '../Registeration/general/env.php';
include '../Registeration/general/functions.php';
include '../Registeration/shared/header.php';
include '../Registeration/shared/navbar.php';

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['pass'];
  $salary = $_POST['salary'];
  $depId = $_POST['dep_id'];

  $insert = "INSERT INTO `employee` values(null, '$name', '$email', '$password', $depId, $salary)";
  $query = mysqli_query($connection, $insert);
  if ($query) {
    path('index.php');
  }
}
?>

<div class="container my-3">
  <h1 class="text-center"> Employee Registeration </h1>
</div>
<div class="container my-5">
  <form method="POST">
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" placeholder="Enter your name" name="name" required>
    </div>

    <div class="form-group">
      <label>Email Address</label>
      <input type="text" class="form-control" placeholder="Enter your Email Address" name="email" required>
    </div>

    <div class="form-group">
      <label>Password</label>
      <input type="password" class="form-control" placeholder="Enter your Password Address" name="pass" required>
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

    <div class="form-group">
      <label>Salary</label>
      <input type="text" class="form-control" placeholder="Enter your Salary" name="salary" required>
    </div>

    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>
</div>
<?php
include '../Registeration/shared/footer.php';
?>