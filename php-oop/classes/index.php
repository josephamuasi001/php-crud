<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    require_once 'Car.php';

    

    $car01 = new Car("Volvo", "red");
    echo $car01->vehicleType;
    ?>
</body>
</html>