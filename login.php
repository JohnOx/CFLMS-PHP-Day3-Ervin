<!-- Including functions file  -->
<?php require_once "functions.php"; ?>
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


     $conn = new mysqli($servername, $username, $password, $dbname);
     // Check connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }

     // Prüfen, ob Form-Submit (d.h., ob POST Werte vorhanden sind):
    if (count($_POST) > 0) {
        $sql = $conn->query("SELECT * FROM employee");
        while ($row = $sql->fetch_assoc()) {
            $email = $row["email"];
            $pwd = $row["pwd"];

            // Prüfen, ob User "admin" / "test" eingegeben hat:
            // password_verify($_POST["pwd"], $pwd)
            if ($_POST["email"] === $email && $_POST["pwd"] === $pwd) {
                // LOGIN OK - d.h. starte session und lege Wert für "login" = "ok" an!
                    session_start();
                    $_SESSION["login"] = "ok";
                    // LOGIN OK: Session gestartet, Session-Wert gesetzt - done!
                    // Umleitung auf geschützte Startseite:
                    header("Location: add.php");
                    exit;
            }
        }
        
    }



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

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" autocomplete="on" method="POST">
        <fieldset>
            <div class="row">
            <div class="col-sm-12 col-md-6">
                <label for="user">Username: </label>
                <input type="text" name="email" id="user" class="form-control" value="">
            </div>
            <div class="col-sm-12 col-md-6">
                <label for="pwd">Password: </label>
                <input type="password" name="pwd" id="pwd" class="form-control" value="">
            </div>
            </div>
            <div class="row mt-3">
            <div class="col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
            </div>
        </fieldset>
    </form>     

  
        
   
<!-- jQuery & Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>