<?php
//connect to db
require_once("connection.php");
//collect variables
if(isset($_POST['submit'])){
    $docId=$_POST['docId'];
//sql statement
    $sql="DELETE FROM `doctors` WHERE `doctors`.`docId` = $docId";
//sql statement execution
     $signout = mysqli_query($conn,$sql);
     if($signout){
        ?>
        <script>
         window.alert("Sign Out successful");
         window.location.href = "login.php";
         </script>
      <?php
     }else{
      ?>
      <script>
         window.alert("Could not delete");
         window.location.href = "index.php";
      </script>
      <?php
     }
}