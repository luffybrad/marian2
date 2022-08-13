<?php 
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <!--custom css-->
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
  </head>
  <body>
    <!--navigation bar-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">MARIAN HOSPITAL</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="login.php">Log In </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Log Out</a>
      </li>
      <li class="nav-item">
        <!-- Button trigger modal -->
        <a class="nav-link" href="#" data-toggle="modal" data-target="#staticBackdrop">Add Doctor</a>
        <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Doctor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST" action="register.php">
                    <?php
                //random reg number generator
                        $number = rand(1, 999);
                        $regnum=sprintf("%03d", $number);
                    ?>
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" name="fullname" class="form-control" id="fullname">
                    </div>
                    <div class="mb-3">
                        <label for="docId" class="form-label">Doctor ID</label>
                        <input type="text" class="form-control" id="docId" name="docId" value="<?php echo $regnum ?>" readonly>
                        <small id="emailHelp" class="form-text text-muted"><b>*&nbsp;Please take note of your ID Number &nbsp;*</b></small>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit"class="btn btn-success">Add</button>
                </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
      </li>
      <li class="nav-item">
        <!-- Button trigger modal -->
        <a class="nav-link" href="#"data-toggle="modal" data-target="#deletedoc">Sign Out Doctor</a>
        <!-- Modal -->
            <div class="modal fade" id="deletedoc" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Sign Out: <?php echo $_SESSION['fullname']?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST" action="signout.php">
                    <div class="mb-3">
                        <input type="text" name="docId" class="form-control" id="docId" value="<?php echo $_SESSION['docId']?>" hidden="true">
                    </div>
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $_SESSION['fullname']?>" readonly>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-danger">Sign Out</button>
                </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
      </li>
    </ul>
  </div>
</nav>
<!--end of navigation-->
    <div class="container">
    <div class="jumbotron jumbotron-fluid bg-primary">
    <center>
    <h1 class="display-4 align-text-center">Patients</h1>
    </center>
</div>
    <div class="row">
        <div class="col">
            <center>
            <b>
                <h2>
                    DR: <i><?php
                    if(isset($_SESSION)){
                         echo $_SESSION['fullname'];
                    }else{
                        echo "No user logged in";   
                    }?></i>
                </h2>
            </b>
            </center>
        </div>
        <div class="col">
            <center>
            <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                Add Patient
                </button>

            <!-- Modal -->

            <div class="modal fade" id="addModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Sign Up</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST" action="addp.php">
                <?php
            //random reg number generator
            $number = rand(1, 999);
                $regnum=sprintf("%03d", $number);
                ?>
                <div class="mb-3">
                    <label for="fullname" class="form-label">Fullname</label>
                    <input type="text" class="form-control" id="fullname" name="fullname">
                </div>
                <div class="mb-3">
                    <label for="regnumber" class="form-label">Registration Number</label>
                    <input type="text" class="form-control" id="regnumber" name="regnumber" value="<?php echo $regnum ?>">
                    <small id="emailHelp" class="form-text text-muted"><b>*&nbsp;Please take note of your Registration Number &nbsp;*</b></small>
                </div>
                <div class="mb-3">
                    <label for="birthcert" class="form-label">Birth Certificate Number</label>
                    <input type="text" class="form-control" id="birthcert" name="birthcert">
                </div>
                    <div class="mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    </div>
                    <div class="mb-3">
                    <label for="county">County</label>
                        <select multiple class="form-control" id="county" name="county">
                            <option>Nairobi</option>
                            <option>Kajiado</option>
                            <option>Kiambu</option>
                            <option>Nyeri</option>
                            <option>Meru</option>
                            <option>Nakuru</option>
                            <option>Narok</option>
                            <option>Turkana</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add</button>
                </div> 
                </form>
                </div>
                </div>
            </div>
            </div>
            </center>
        </div>
    </div>
    <div class="row">
  <table class="table table-striped table-primary table-hover">
  <thead class="thead-dark">
  <tr>
          <th scope="col">Registration Number</th>
          <th scope="col">Fullname</th>
          <th scope="col">Birth Certificate Number</th>
          <th scope="col">Gender</th>
          <th scope="col">County</th>
          <th colspan="2">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
      require_once("connection.php");
    $sql = "SELECT * FROM `patients`";
    $result = mysqli_query($conn, $sql);
    while($row=mysqli_fetch_assoc($result)){
        ?>
        <tr>
          <th><?php echo $row['regnumber']?></th>
          <td><?php echo $row['fullname']?></td>
          <td><?php echo $row['birthcert']?></td>
          <td><?php echo $row['gender']?></td>
          <td><?php echo $row['county']?></td>
          <td>
            <!-- edit button trigger modal -->
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal<?php echo $row['regnumber']?>">
            Edit
            </button>

            <!-- Modal -->
            <div class="modal fade" id="editModal<?php echo $row['regnumber']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit: <?php echo $row['fullname']?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="edit.php">
                    <div class="mb-3">
                                                <input type="text" name="regnumber"  class="form-control" value="<?php echo $row['regnumber']?>" hidden="true">
                                            </div>
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Fullname</label>
                        <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo $row['fullname']?>">
                    </div>
                    <div class="mb-3">
                        <label for="birthcert" class="form-label">Birth Certificate Number</label>
                        <input type="text" class="form-control" name="birthcert" id="birthcert" value="<?php echo $row['birthcert'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="birthcert" class="form-label">Current gender: <?php echo $row['gender'] ?></label>
                    </div>
                    <div class="mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    </div>
                    <div class="mb-3">
                    <label for="county">County</label>
                        <select multiple class="form-control" id="county" name="county" value="<?php echo $row['county']?>">
                        <option>Nairobi</option>
                            <option>Kajiado</option>
                            <option>Kiambu</option>
                            <option>Nyeri</option>
                            <option>Meru</option>
                            <option>Nakuru</option>
                            <option>Narok</option>
                            <option>Turkana</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Edit</button>
                </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
            <!-- end of edit button trigger modal -->
          </td>
          <td>
        <!--delete button trigger modal-->    
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $row['regnumber']?>">
            Delete
            </button>

                <!-- Modal -->
                <div class="modal fade" id="deleteModal<?php echo $row['regnumber']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Delete: <?php echo $row['fullname']?> </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="POST" action="delete.php">
                        <div class="mb-3">
                            <input type="text" name="regnumber"  class="form-control" value="<?php echo $row['regnumber']?>" hidden="true">
                        </div>
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Fullname</label>
                            <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo $row['fullname']?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="birthcert" class="form-label">Birth Certificate Number</label>
                            <input type="text" class="form-control" name="birthcert" id="birthcert" value="<?php echo $row['birthcert'] ?>" readonly>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            <!--end of delete button trigger modal-->
          </td>
    </tr>
    <?php
    }
    ?>

  </tbody>
  <caption>List of patients</caption>

</table>
    </div>
</div>
    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  </body>
</html>