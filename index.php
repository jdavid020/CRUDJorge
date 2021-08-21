<?php include('db.php')?>
<?php include('includes/header.php')?>
<div class="container p-4">
<div class="row">
<div class="col-md-4">

<?php if(isset($_SESSION['message'])) { ?>
    <div class="alert alert-<?=$_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
  <?=$_SESSION['message']?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
  </button>
</div>
<?php session_unset();} ?>
<hr>

<div class="card card-body">
<form action='save_task.php'method='POST'>
<div class="form-group">
<input type="text"name='Nombres'clss='form-control'
placeholder='Nombres'autofocus>

</div>

<div class="card card-body">
<div class="form-group">
<textarea name='Apellido'rows='2'class='form-control'
placeholder=' Apellido'></textarea>
</div>


<div class="card card-body">
<form action='save_task.php'method='POST'>
<div class="form-group">
<input type="text"name='edad'clss='form-control'
placeholder='Edad'autofocus>

<div class="card card-body">
<form action='save_task.php'method='POST'>
<div class="form-group">
<input type="text"name='Email'clss='form-control'
placeholder='Email'autofocus>

<input type="submit"class='btn btn-success btn-block'name='save_task'value='save'>

</form>



</div>

  </div>
  <hr>
<div class="col-md-10">
<table class='table table-bordered'>
<thead>
<tr>
<th>Nombres</th>
<th>Apellido</th>
<th>Edad</th>
<th>Email</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$query="SELECT* FROM task";
$result_tasks= mysqli_query($conn,$query);
while( $row = mysqli_fetch_array ($result_tasks)){?>
  
  
    <tr>
    <td><?php echo $row['Nombres']?></td>
    <td><?php echo $row['Apellido']?></td>
    <td><?php echo $row['Edad']?></td>
    <td><?php echo $row['Email']?></td>
    <td>
    <a href="edit.php?id=<?php echo $row['id']?>">
    <i class="fas fa-marker"></i>
    
    </a>
    <a href="delete_task.php?id=<?php echo $row['id']?>">
    <i class="far fa-trash-alt"></i>
    
   </a> 
    </tr>
<?php }?>
</tbody>
</table>
</div>

</div>

</div>

<?php include ("includes/footer.php")?>