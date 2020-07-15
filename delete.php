<?php 
require_once "functions.php";
site_protect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php
     // DB CONNECTIO WITH PDO 
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "car_rental";
     $thanks = "";


     $conn = new mysqli($servername, $username, $password, $dbname);
     // Check connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }
     //QUERY
     $sql = $conn->query("SELECT low_class.brand, low_class.modell
                          FROM low_class
                          UNION
                          SELECT mid_class.brand, mid_class.modell
                          FROM mid_class
                          UNION
                          SELECT luxury_class.brand, luxury_class.modell
                          FROM luxury_class");

$sql2 = $conn->query("SELECT low_class.modell
                     FROM low_class
                     UNION
                     SELECT mid_class.modell
                     FROM mid_class
                     UNION
                     SELECT luxury_class.modell
                     FROM luxury_class");


     if (count($_POST) > 0) {
            $class = $_POST["class"];
            $cars_modell = $_POST["cars_modell"];    
            
            while ($row2 = $sql2->fetch_assoc()){
                $modell =  $row2["modell"];

                if ($class == "low_class") {
                    $sql = "DELETE FROM low_class WHERE low_class.modell = '$cars_modell'";
                    $edit = $conn->query($sql);
                } elseif ($class == "mid_class") {
                    $sql = "DELETE FROM mid_class WHERE mid_class.modell = '$cars_modell'";
                    $edit = $conn->query($sql);
                } else {
                    $sql = "DELETE FROM luxury_class WHERE luxury_class.modell = '$cars_modell'";
                    $edit = $conn->query($sql);
                }
            }

     };



?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Car Rental</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="add.php">Add Car</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="edit.php">Edit Car</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="delete.php">Delete</a>
        </li>
        </ul>
        <ul class="nav navbar-nav">
        <li>
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
    </ul>
    </div>
    </nav>
    <header>
        <div class="jumbotron main_header">
            <h1 class="display-4">Hello, world!</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <a class="btn btn-primary btn-lg" href="contact.php" role="button">Contact us now</a>
        </div>
    </header>
    <div class="container">
    <form class = "main_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
        <div class="form_header">
                <h1>DELETE:</h1>
        </div>
        <label for="cars">Choose a class:</label>
        <select name="class" id="class">
            <option value="low_class">Low</option>
            <option value="mid_class">Mid</option>
            <option value="luxury_class">Luxury</option>
        </select>

        <label for="cars_modell">Choose a car:</label>
        <select name="cars_modell" id="cars_modell">
        <?php while ($row = $sql->fetch_assoc()){
                    $brand =  $row["brand"];
                    $modell =  $row["modell"];
        ?>
            <option value="<?= $modell ?>"><?= $modell ?></option>
        <?php } ?>
        </select><br>
        <button class="btn btn-primary mt-3 mb-5" type="submit" class="registerbtn">Delete</button>
    </form>
    </div>
  
        
   
<!-- jQuery & Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>