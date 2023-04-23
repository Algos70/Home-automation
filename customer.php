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


/*For all the if statements below, if a certain button is pressed then update the database */

// If the button is clicked, update the database
//mysqli_real_escape_string secures the input we want to send to the data base
if (isset($_POST['light'])) {


    // acquire lock
    $fp = fopen($file, 'r+');
    flock($fp, LOCK_EX);

    // make changes to data
    if ($dataArray[0] == 0) {
        $dataArray[0] = 1;
    } else {
        $dataArray[0] = 0;
    }

    // write updated data back to file
    file_put_contents($file, implode(',', $dataArray));

    // release lock
    flock($fp, LOCK_UN);
    fclose($fp);



    //refresh the page to relod
    header('Location: ./customer.php');
}

if (isset($_POST['sound'])) {

    // acquire lock
    $fp = fopen($file, 'r+');
    flock($fp, LOCK_EX);

    // make changes to data
    if ($dataArray[3] == 0) {
        $dataArray[3] = 1;
    } else {
        $dataArray[3] = 0;
    }

    // write updated data back to file
    file_put_contents($file, implode(',', $dataArray));

    // release lock
    flock($fp, LOCK_UN);
    fclose($fp);
    //refresh the page to relod 
    header('Location: ./customer.php');
}


if (isset($_POST['lock'])) {

    // acquire lock
    $fp = fopen($file, 'r+');
    flock($fp, LOCK_EX);

    // make changes to data
    if ($dataArray[5] == 0) {
        $dataArray[5] = 1;
    } else {
        $dataArray[5] = 0;
    }

    // write updated data back to file
    file_put_contents($file, implode(',', $dataArray));

    // release lock
    flock($fp, LOCK_UN);
    fclose($fp);
    //refresh the page to relod 
    header('Location: ./customer.php');
}

if (isset($_POST['roomba'])) {

    // acquire lock
    $fp = fopen($file, 'r+');
    flock($fp, LOCK_EX);

    // make changes to data
    if ($dataArray[6] == 0) {
        $dataArray[6] = 1;
    } else {
        $dataArray[6] = 0;
    }

    // write updated data back to file
    file_put_contents($file, implode(',', $dataArray));

    // release lock
    flock($fp, LOCK_UN);
    fclose($fp);
    //refresh the page to relod 
    header('Location: ./customer.php');
}

if (isset($_POST['heater'])) {

    // acquire lock
    $fp = fopen($file, 'r+');
    flock($fp, LOCK_EX);

    // make changes to data
    if ($dataArray[7] == 0) {
        $dataArray[7] = 1;
    } else {
        $dataArray[7] = 0;
    }

    // write updated data back to file
    file_put_contents($file, implode(',', $dataArray));

    // release lock
    flock($fp, LOCK_UN);
    fclose($fp);
    //refresh the page to relod 
    header('Location: ./customer.php');
}

//whatever is the input change the database accordingly for the color 
if (isset($_POST['change-color'])) {
    if ($_POST['colorlist'] == 'red') {

        // acquire lock
        $fp = fopen($file, 'r+');
        flock($fp, LOCK_EX);

        $dataArray[1] = 'red';

        // write updated data back to file
        file_put_contents($file, implode(',', $dataArray));

        // release lock
        flock($fp, LOCK_UN);
        fclose($fp);
    } else if ($_POST['colorlist'] == 'blue') {
        // acquire lock
        $fp = fopen($file, 'r+');
        flock($fp, LOCK_EX);

        $dataArray[1] = 'blue';

        // write updated data back to file
        file_put_contents($file, implode(',', $dataArray));

        // release lock
        flock($fp, LOCK_UN);
        fclose($fp);
    } else if ($_POST['colorlist'] == 'green') {
        // acquire lock
        $fp = fopen($file, 'r+');
        flock($fp, LOCK_EX);

        $dataArray[1] = 'green';

        // write updated data back to file
        file_put_contents($file, implode(',', $dataArray));

        // release lock
        flock($fp, LOCK_UN);
        fclose($fp);
    }
    //refresh the page to relod
    header('Location: ./customer.php');
}

//whatever is the input change the database accordingly for the security
if (isset($_POST['security'])) {
    if ($_POST['sec'] == 'low') {
        // acquire lock
        $fp = fopen($file, 'r+');
        flock($fp, LOCK_EX);

        $dataArray[4] = 'low';

        // write updated data back to file
        file_put_contents($file, implode(',', $dataArray));

        // release lock
        flock($fp, LOCK_UN);
        fclose($fp);
    } else if ($_POST['sec'] == 'off') {
        // acquire lock
        $fp = fopen($file, 'r+');
        flock($fp, LOCK_EX);

        $dataArray[4] = 'off';

        // write updated data back to file
        file_put_contents($file, implode(',', $dataArray));

        // release lock
        flock($fp, LOCK_UN);
        fclose($fp);
    } else if ($_POST['sec'] == 'high') {
        // acquire lock
        $fp = fopen($file, 'r+');
        flock($fp, LOCK_EX);

        $dataArray[4] = 'high';

        // write updated data back to file
        file_put_contents($file, implode(',', $dataArray));

        // release lock
        flock($fp, LOCK_UN);
        fclose($fp);
    }
    //refresh the page to relod 
    header('Location: ./customer.php');
}

//control air conditioner, later will be implemented
if (isset($_POST['air'])) {

    // acquire lock
    $fp = fopen($file, 'r+');
    flock($fp, LOCK_EX);

    $dataArray[2] = $_POST['temp'];

    // write updated data back to file
    file_put_contents($file, implode(',', $dataArray));

    // release lock
    flock($fp, LOCK_UN);
    fclose($fp);
    header('Location: ./customer.php');
}
?>

<!DOCTYPE php>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoHome-Customer</title>
    <link rel="stylesheet" href="producer-styles.css">
    <script src="producer.js" defer></script>
    <script src="displayCustomer.js" defer></script>
</head>

<body>
    <div class="header">
        <h1>Customer Dashboard</h1>
        <a href="index.html">Logout</a>
    </div>
    <div class="cards">
        <div class="card lights">
            <p class="title">LIGHTS</p>
            <p class="state" data-state="off">
                <?php
                //shows state of the light(wheter its on or off)
                if ($light == 0) {
                    echo '<img src="./img/display/lights-off.png" width="50px" height="50px" img/> </br>';
                    echo 'OFF';
                } else {
                    echo '<img src="./img/display/lights-on.png" width="50px" height="50px" img/> </br>';
                    echo 'ON';
                }

                ?>
            </p>
            <form action="" class="light-control" method="post">
                <button type="submit" name="light">
                    <?php
                    //shows state of the BUTTON
                    if ($light == 0) {
                        echo 'TURN ON';
                        echo '';
                    } else {
                        echo 'TURN OFF';
                    }

                    ?>
                </button>
            </form>
        </div>
        <div class="card colors">
            <p class="title">LIGHT COLOR</p>
            <p class="state" data-state="green">
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
            <form onsubmit="submitColor " action="" class="color-control" method="post">
                <select name="colorlist" id="colorlist">
                    <option value="red">RED</option>
                    <option value="green">GREEN</option>
                    <option value="blue">BLUE</option>
                </select>
                <button type="submit" name="change-color">APPLY CHANGES</button>
            </form>
        </div>
        <div class="card temp">
            <p class="title">ROOM TEMPERATURE</p>
            <p class="state">
                <?php
                //shows the current tempature
                echo '<img src="./img/display/temprature.png" width="50px" height="50px" img/> </br>';

                echo $tempature;
                ?>
            </p>
            <form action="" method="post" style="display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 20px;">
                <div class="temp-control">
                    <input type="number" required name="temp" min="8" max="38" value="8" step=".01">
                </div>
                <button type="submit" name="air">START AIR CONDITIONER</button>
            </form>
        </div>
        <div class="card sound">
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
            <form action="" method="post">
                <button type="submit" name="sound">
                    <?php
                    //shows state of the BUTTON
                    if ($sound == 0) {
                        echo 'TURN ON';
                    } else {
                        echo 'TURN OFF';
                    }

                    ?>
                </button>
            </form>
        </div>
        <div class="card security">
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
            <form action="" class="security-control" method="post">
                <select name="sec" id="sec">
                    <option value="low">LOW</option>
                    <option value="high">HIGH</option>
                    <option value="off">OFF</option>
                </select>
                <button type="submit" name="security">APPLY CHANGES</button>
            </form>
        </div>
        <div class="card lock">
            <p class="title">DOOR LOCK</p>
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
            <form action="" method="post">
                <button type="submit" name="lock">
                    <?php
                    //shows state of the BUTTON
                    if ($door == 0) {
                        echo 'LOCK';
                    } else {
                        echo 'UNLOCK';
                    }

                    ?>
                </button>
            </form>
        </div>
        <div class="card roomba">
            <p class="title">ROOMBA</p>
            <p class="state">
                <?php
                //shows state of the ROOMBA cleaning robot(wheter its on or off)
                if ($roomba == 0) {
                    echo '<img src="./img/display/charging.png" width="50px" height="50px" img/> </br>';

                    echo 'CHARGING';
                } else {
                    echo '<img src="./img/display/roomba.png" width="50px" height="50px" img/> </br>';
                    echo 'CLEANING';
                }

                ?>
            </p>
            <form action="" method="post">
                <button type="submit" name="roomba">
                    <?php
                    //shows state of the ROOMBA cleaning robot
                    if ($roomba == 0) {
                        echo 'START';
                    } else {
                        echo 'STOP';
                    }

                    ?>
                </button>
            </form>
        </div>
        <div class="card heater">
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
            <form action="" method="post">
                <button type="submit" name="heater">
                    <?php
                    if ($waterHeater == 0) {
                        echo 'TURN ON';
                    } else {
                        echo 'TURN OFF';
                    }

                    ?>
                </button>
            </form>
        </div>
    </div>
</body>

</html>