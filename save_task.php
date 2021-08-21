<?php

include('db.php');

if(isset($_POST['save_task'])){
    echo'saving';
   $Nombres= $_POST['Nombres'];
   $Apellido=$_POST['Apellido'];
   $Edad=$_POST['Edad'];
   $Email=$_POST['Email'];
  

   $query = "INSERT INTO task(nombres,apellido,edad,email) VALUES ('$Nombres', '$Apellido','$Edad','$Email')";
  $result= mysqli_query($conn,$query);
   if (!$result){
       die("Query Failed");
   }

$_SESSION['message']='Task Saved succesfully';
$_SESSION['message_type']='success';
   header("Location: index.php");
}
?>