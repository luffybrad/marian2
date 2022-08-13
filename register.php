<?php
 if(isset($_POST['submit'])){
    include_once("connection.php");
    $docId= $_POST['docId'];
    $fullname=$_POST['fullname'];

    $sql= "INSERT INTO `doctors` (`docId`, `fullname`) VALUES ('$docId', '$fullname')";

    $register = mysqli_query($conn, $sql);

    if($register){
        ?>
        <script>
            window.alert("Registration successful");
            window.location.href="login.php";
        </script> 
        <?php
    }else{
        ?>
        
        <script>
            window.alert("Oops!....something wrong happened");
            window.location.href="index.php";
        </script>
        
        <?php 
    }
 }
?>
