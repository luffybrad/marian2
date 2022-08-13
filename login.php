<?php
    if(isset($_POST['login'])){
        require_once("connection.php");
        $docId = $_POST['docId'];
        $sql = "SELECT * FROM `doctors` WHERE docId= '$docId'";
        $login = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($login);

        if($count>0){
            session_start();
            $sql = "SELECT * FROM doctors WHERE docId='$docId'";
            $result = mysqli_query($conn, $sql);
            $row=mysqli_fetch_assoc($result);
            $_SESSION['fullname']=$row["fullname"];
            $_SESSION['docId']=$row["docId"];
            header("Location:index.php");
        }else{
            ?>
            
            <script>
                window.alert("Could not log in");
                window.location.href="login.php";
            </script>
            
            <?php 
        }
    }
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Log In</title>
  </head>
  <body>
    <div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col">
        <div class="card text-center">
            <div class="card-header">
                Log In
            </div>
            <div class="card-body">
            <h5 class="card-title">Doctor ID</h5>
            <form method="POST" action="" class="card-text">
                <div class="mb-3">
                    <input type="text" class="form-control" id="docId" name="docId">
                </div>
            <div class="card-footer text-muted">
            <button type="submit" name="login" class="btn btn-primary">Login</button>
  </div>
</form>
</div>
</div>
        </div>
        <div class="col"></div>
    </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  </body>
</html>