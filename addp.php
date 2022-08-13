<?php
    if(isset($_POST)){
        include_once("connection.php");
        $fullname=$_POST["fullname"];
        $regnumber=$_POST['regnumber'];
        $birthcert= $_POST['birthcert'];
        $gender=$_POST['gender'];
        $county=$_POST['county'];

        $sql = "INSERT INTO `patients` (`fullname`, `regnumber`, `birthcert`, `gender`, `county`) VALUES ('$fullname', '$regnumber', '$birthcert', '$gender', '$county')";

        $signup= mysqli_query($conn, $sql);
        
        if($signup){
            ?>
            <script>
                window.alert("Registration successful");
                window.location.href="index.php";
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