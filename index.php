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
            <h1 class="display-4">Car Rental Company</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <a class="btn btn-primary btn-lg" href="contact.php" role="button">Contact us now</a>
        </div>
    </header>
    <h1>Low Class</h1>
    <div class="d-flex justify-content-around">
    <!-- PHP SCRIPT -->
    <?php 
        // DB CONNECTIO WITH MySQLi
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "car_rental";

        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection"
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        //Query for DB low_class cars
        $result_low = $conn->query("SELECT 
                                low_class.brand, 
                                low_class.modell, 
                                low_class.hp, 
                                low_class.img,
                                low_class.price_per_day,
                                low_class.fk_availability_id,
                                availability.available
                                FROM low_class
                                INNER JOIN availability ON low_class.fk_availability_id = availability.id;");
        //Query for DB mid_class cars
        $result_mid = $conn->query("SELECT 
                                    mid_class.brand, 
                                    mid_class.modell, 
                                    mid_class.hp, 
                                    mid_class.img,
                                    mid_class.price_per_day,
                                    mid_class.fk_availability_id,
                                    availability.available
                                    FROM mid_class
                                    INNER JOIN availability ON mid_class.fk_availability_id = availability.id;");

        $result_luxury = $conn->query("SELECT 
                                    luxury_class.brand, 
                                    luxury_class.modell, 
                                    luxury_class.hp, 
                                    luxury_class.img,
                                    luxury_class.price_per_day,
                                    luxury_class.fk_availability_id,
                                    availability.available
                                    FROM luxury_class
                                    INNER JOIN availability ON luxury_class.fk_availability_id = availability.id;");

        while ($row = $result_low->fetch_assoc()){
            $brand =  $row["brand"];
            $modell =  $row["modell"];
            $hp =  $row["hp"];
            $img =  $row["img"];
            $price = $row["price_per_day"];
            $available = $row["available"];
    ?>
            <div class="card">
                <img src="img/<?= $img ?>" class="card-img-top" alt="..." height="350px">
                <div class="card-body">
                    <h5 class="card-title"><?= $brand . " " . $modell ?></h5>
                    <p class="card-text"><?= "<b>Horsepower:</b> " . $hp . "hp" ?></p>
                    <p class="card-text"><?= "<b>Price p. Day:</b> " . $price . "€" ?></p>
                    <p class="card-text"><?php 
                    if ($available == "not available") {
                        echo "<b>Availability:</b> " . "<h5 style='color:red'>" . $available . "</h5>";
                    } else {
                        echo "<b>Availability:</b> " . "<h5 style='color:green'>" . $available . "</h5>";
                    } 
                    ?></p>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, totam?</p>
                    <a href="#" class="btn btn-primary">Book now</a>
                </div>
            </div>
    <?php } //LOW CLASS LOOP END ?>               
    </div> <!-- CLOSING DIV FOR THE FIRST CAR ELEMENST -->
    <h1>Mid Class</h1>
    <div class="d-flex justify-content-around mt-5">
    <?php

         while ($row = $result_mid->fetch_assoc()){
            $brand =  $row["brand"];
            $modell =  $row["modell"];
            $hp =  $row["hp"];
            $img =  $row["img"];
            $price = $row["price_per_day"];
            $available = $row["available"]
    
    ?>
        <div class="card">
                    <img src="img/<?= $img ?>" class="card-img-top" alt="..." height="350px">
                    <div class="card-body">
                        <h5 class="card-title"><?= $brand . " " . $modell ?></h5>
                        <p class="card-text"><?= "<b>Horsepower:</b> " . $hp . "hp" ?></p>
                        <p class="card-text"><?= "<b>Price p. Day:</b> " . $price . "€" ?></p>
                        <p class="card-text"><?php 
                        if ($available == "not available") {
                            echo "<b>Availability:</b> " . "<h5 style='color:red'>" . $available . "</h5>";
                        } else {
                            echo "<b>Availability:</b> " . "<h5 style='color:green'>" . $available . "</h5>";
                        } 
                        ?></p>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, totam?</p>
                        <a href="#" class="btn btn-primary">Book now</a>
                    </div>
                </div>
        <?php } //MID CLASS LOOP END ?>
    </div>
    <h1>Luxury Class:</h1>
    <div class="d-flex justify-content-around mt-5">
    <?php

         while ($row = $result_luxury->fetch_assoc()){
            $brand =  $row["brand"];
            $modell =  $row["modell"];
            $hp =  $row["hp"];
            $img =  $row["img"];
            $price = $row["price_per_day"];
            $available = $row["available"]
    
    ?>
        <div class="card">
                    <img src="img/<?= $img ?>" class="card-img-top" alt="..." height="350px">
                    <div class="card-body">
                        <h5 class="card-title"><?= $brand . " " . $modell ?></h5>
                        <p class="card-text"><?= "<b>Horsepower:</b> " . $hp . "hp" ?></p>
                        <p class="card-text"><?= "<b>Price p. Day:</b> " . $price . "€" ?></p>
                        <p class="card-text"><?php 
                        if ($available == "not available") {
                            echo "<b>Availability:</b> " . "<h5 style='color:red'>" . $available . "</h5>";
                        } else {
                            echo "<b>Availability:</b> " . "<h5 style='color:green'>" . $available . "</h5>";
                        } 
                        ?></p>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, totam?</p>
                        <a href="#" class="btn btn-primary">Book now</a>
                    </div>
                </div>
        <?php } //LUXURY CLASS LOOP END ?>
    </div>

<!-- jQuery & Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>