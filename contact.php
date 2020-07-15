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

     //Reseting the page after 4sec
     function setTimeout($fn, $time){
         sleep(($time/1000));
         $fn();
     }

     $resetVal = function (){
         $thanks = "";
         unset($thanks);
         header("Refresh: 4; url=contact.php");
     };

     $conn = new mysqli($servername, $username, $password, $dbname);
     // Check connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }

     if (count($_POST) > 0) {
        $f_name = $_POST["f_name"];
        $l_name = $_POST["l_name"];
        $phone = $_POST["phone"];
        $date = $_POST["date"]; 
        
        $sql = "INSERT INTO request(f_name, l_name, phone, `date`) VALUES ('$f_name', '$l_name', $phone, '$date')";

        $result = $conn->query($sql);

        $thanks = "<h2 style='color:green'> Thank you " . $f_name . " " . $l_name . " for choosing us </h2><br><h3>We will contact you soon!</h3>";
        
        setTimeout($resetVal,3000);
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
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
    </header>
    <main>
    <div class="container">
    <?php
    if ($thanks == "") {

    } else { ?>
        <div class="alert alert-primary" role="alert">
            <?= $thanks ?>
        </div>
    <?php } ?>
        <form class = "main_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <div class="form_header">
                <h1>Contact</h1>
                <p>Please send us your request so we can contact you as soon as possible</p>
            </div>
            <!-- Formular -->
            <div class = "form_fields">
            <div class="row">
                <div class="col-12">
                    <label for="f_name">First Name:</label><br>
                    <input type="text" class="form-control"  name="f_name">
                </div>
                <div class="col-12">
                    <label for="l_name">Last Name:</label><br>
                    <input type="text" class="form-control" name="l_name">
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    Phone Number:
                    <input type="text" class="form-control" name="phone">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="phone">Date:</label><br>
                    <input type="date" class="form-control" placeholder="date" name="date">
                </div>
            </div>
            <button class="btn btn-primary mt-3 mb-5" type="submit" class="registerbtn">Send</button>
        </form>
    </div>
    </main>
   
<!-- jQuery & Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>