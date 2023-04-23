<?php

$file = 'mockData.txt';

//get the data from the specified file
$fullData = file_get_contents($file);
$dataArray = explode(',', $fullData);


//mock data values
$light = $dataArray[0];
$color = $dataArray[1];
$tempature = $dataArray[2];
$sound = $dataArray[3];
$securityS = $dataArray[4];
$door = $dataArray[5];
$roomba = $dataArray[6];
$waterHeater = $dataArray[7];


?>

<!DOCTYPE php>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoHome-Producer</title>
    <link rel="stylesheet" href="producer-styles.css">
    <script src="displayProducer.js" defer></script>
</head>

<body>
    <div class="header">
        <h1>Producer Dashboard</h1>
        <a href="index.html">Logout</a>
    </div>
    <div class="cards">
        <div class="card">
            <p class="title">LIGHTS</p>
            <p class="state">
                <?php
                //shows state of the light(whether its on or off)
                if ($light) {
                    echo '<img src="./img/display/lights-on.png" width="50px" height="50px" img/> </br>';

                    echo 'ON';
                } else {
                    echo '<img src="./img/display/lights-off.png" width="50px" height="50px" img/> </br>';

                    echo 'OFF';
                }

                ?>
            </p>
        </div>
        <div class="card">
            <p class="title">LIGHT COLOR</p>
            <p class="state">
                <?php
                //change the button content 
                if ($color == 'red') {
                    echo '<img src="./img/display/red-light.png" width="50px" height="50px" img/> </br>';
                    echo 'RED';
                } else if ($color == 'green') {
                    echo '<img src="./img/display/green-light.png" width="50px" height="50px" img/> </br>';

                    echo 'GREEN';
                } else if ($color == 'blue') {
                    echo '<img src="./img/display/blue-light.png" width="50px" height="50px" img/> </br>';
                    echo 'BLUE';
                }

                ?>
            </p>
        </div>
        <div class="card">
            <p class="title">TEMPERATURE</p>
            <p class="state">
                <?php
                //shows the current tempature
                echo '<img src="./img/display/temprature.png" width="50px" height="50px" img/> </br>';
                $rand = rand(1, 5);
                echo (int) $tempature  - $rand;
                ?>
            </p>
        </div>
        <div class="card">
            <p class="title">SOUND SYSTEM</p>
            <p class="state">
                <?php
                //change the content to show wheter its on or of
                if ($sound == 0) {
                    echo '<img src="./img/display/sound-off.png" width="50px" height="50px" img/> </br>';

                    echo 'OFF';
                } else {
                    echo '<img src="./img/display/sound-on.png" width="50px" height="50px" img/> </br>';

                    echo 'ON';
                }
                ?>
            </p>
        </div>
        <div class="card">
            <p class="title">SECURITY</p>
            <p class="state">
                <?php
                //change the button content 
                if ($securityS == 'low') {
                    echo '<img src="./img/display/security-middle.png" width="50px" height="50px" img/> </br>';

                    echo 'LOW';
                } else if ($securityS == 'high') {
                    echo '<img src="./img/display/security-high.png" width="50px" height="50px" img/> </br>';

                    echo 'HIGH';
                } else if ($securityS == 'off') {
                    echo '<img src="./img/display/security-off.png" width="50px" height="50px" img/> </br>';

                    echo 'OFF';
                }
                ?>

            </p>

        </div>
        <div class="card">
            <p class="title">DOOR</p>
            <p class="state">
                <?php
                //shows state of the door(wheter its on or off)
                if ($door == 0) {
                    echo '<img src="./img/display/door-unlocked.png" width="50px" height="50px" img/> </br>';

                    echo 'OPEN';
                } else {
                    echo '<img src="./img/display/door-locked.png" width="50px" height="50px" img/> </br>';

                    echo 'LOCKED';
                }

                ?>
            </p>
        </div>
        <div class="card">
            <p class="title">ROOMBA</p>
            <p class="state">
                <?php
                //shows state of the BUTTON
                if ($roomba == 0) {
                    echo '<img src="./img/display/charging.png" width="50px" height="50px" img/> </br>';

                    echo 'CHARGING';
                } else {
                    echo '<img src="./img/display/roomba.png" width="50px" height="50px" img/> </br>';
                    echo 'CLEANING';
                }

                ?>
            </p>
        </div>
        <div class="card">
            <p class="title">WATER HEATER</p>
            <p class="state">
                <?php
                if ($waterHeater == 0) {
                    echo '<img src="./img/display/heating-off.png" width="50px" height="50px" img/> </br>';

                    echo 'OFF';
                } else {
                    echo '<img src="./img/display/heating-on.png" width="50px" height="50px" img/> </br>';

                    echo 'HEATING WATER';
                }

                ?>
            </p>
            <p class="water-temp">
                <?php
                echo rand(30, 40);
                ?>
            </p>

        </div>
    </div>
</body>

</html>