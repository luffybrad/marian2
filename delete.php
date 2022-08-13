<?php
//connect to db
require_once("connection.php");
//collect variables
if(isset($_POST)){
    $regnumber=$_POST['regnumber'];
//sql statement
    $sql="DELETE FROM `patients`
     WHERE `patients`.`regnumber` = $regnumber ";
//sql statement execution
     $delete = mysqli_query($conn,$sql);
     if($delete){
        ?>
        <script>
         window.alert("Record deletion successful");
         window.location.href = "index.php";
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
?>