<?php
include("db.php");

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM task WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $Nombres = $row['Nombres'];
    $Apellido = $row['Apellido'];
    $Email=$row['Email'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $Nombres= $_POST['Nombres'];
  $Apellido = $_POST['Apellido'];
  $Edad=$_POST['Edad'];
  $Email = $_POST['Email'];

  $query = "UPDATE task set Nombres = '$Nombres', Apellido = '$Apellido',Email= '$Email' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="Nombres" type="text" class="form-control" value="<?php echo $Nombres; ?>" placeholder="Update Nombres">
        </div>
        <div class="form-group">
        <textarea name="Apellido" class="form-control" cols="30" rows="10"><?php echo $Apellido;?></textarea>
        </div>
        <div class="form-group">
        <textarea name="Edad" class="form-control" cols="30" rows="10"><?php echo $Edad;?></textarea>
        </div>
        <div class="form-group">
        <textarea name="Email" class="form-control" cols="30" rows="10"><?php echo $Email;?></textarea>
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>

