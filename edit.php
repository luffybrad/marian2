<?php

//connect to db
require_once("connection.php");
//collect variables
if(isset($_POST)){
    $regnumber=$_POST['regnumber'];
    $fullname=$_POST['fullname'];
    $birthcert=$_POST['birthcert'];
    $gender= $_POST['gender'];
    $county= $_POST['county'];
//sql statement
    $sql="UPDATE `patients` SET 
    `regnumber`='$regnumber',
    `fullname`='$fullname',
    `birthcert`='$birthcert', 
     `gender` = '$gender',
     `county` = '$county'
     WHERE `patients`.`regnumber` = $regnumber ";
//sql statement execution
     $update= mysqli_query($conn,$sql);
     if($update){
        ?>
        <script>
         window.alert("Update is successful");
         window.location.href = "index.php";
         </script>
      <?php
     }else{
      ?>
      <script>
         window.alert("Could not update");
         window.location.href = "index.php";
      </script>
      <?php
     }
}
?>