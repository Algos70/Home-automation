<?php
//connects to the sql database
$conn = mysqli_connect('localhost', 'algos', '123456', 'dbtest');

//write query for all infos
$sql = 'SELECT light, lightColor, tempature, sound, securityS, door, roomba, waterHeater FROM device';

//make query and get result
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$infos = mysqli_fetch_all($result, MYSQLI_ASSOC);

//frees result from memory for good practice
mysqli_free_result($result);

//print_r($infos); //prints the array taken from the database
//all the infos from the database, selected from $infos array
$light = $infos[0]['light'];
$color = $infos[0]['lightColor'];
$tempature = $infos[0]['tempature'];
$sound = $infos[0]['sound'];
$securityS = $infos[0]['securityS'];
$door = $infos[0]['door'];
$roomba = $infos[0]['roomba'];
$waterHeater = $infos[0]['waterHeater'];


/*For all the if statements below, if a certain button is pressed then update the database */

// If the button is clicked, update the database
//mysqli_real_escape_string secures the input we want to send to the data base
if (isset($_POST['light'])) {
    $new_value = mysqli_real_escape_string($conn, !$light);
    $new_sql = "UPDATE device SET light = '$new_value'";
    if (mysqli_query($conn, $new_sql)) {
        //success
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
    //refresh the page to relod the database
    header('Location: ./customer.php');
}

if (isset($_POST['sound'])) {
    $new_value = mysqli_real_escape_string($conn, !$sound);
    $new_sql = "UPDATE device SET sound = '$new_value'";
    if (mysqli_query($conn, $new_sql)) {
        //success
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
    //refresh the page to relod the database
    header('Location: ./customer.php');
}


if (isset($_POST['lock'])) {
    $new_value = mysqli_real_escape_string($conn, !$door);
    $new_sql = "UPDATE device SET door = '$new_value'";
    if (mysqli_query($conn, $new_sql)) {
        //success
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
    //refresh the page to relod the database
    header('Location: ./customer.php');
}

if (isset($_POST['roomba'])) {
    $new_value = mysqli_real_escape_string($conn, !$roomba);
    $new_sql = "UPDATE device SET roomba = '$new_value'";
    if (mysqli_query($conn, $new_sql)) {
        //success
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
    //refresh the page to relod the database
    header('Location: ./customer.php');
}

if (isset($_POST['heater'])) {
    $new_value = mysqli_real_escape_string($conn, !$waterHeater);
    $new_sql = "UPDATE device SET waterHeater = '$new_value'";
    if (mysqli_query($conn, $new_sql)) {
        //success
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
    //refresh the page to relod the database
    header('Location: ./customer.php');
}

//whatever is the input change the database accordingly for the color 
if (isset($_POST['change-color'])) {
    if ($_POST['colorlist'] == 'red') {
        $new_value = mysqli_real_escape_string($conn, 'red');
        $new_sql = "UPDATE device SET lightColor = '$new_value'";
        mysqli_query($conn, $new_sql);
    } else if ($_POST['colorlist'] == 'blue') {
        $new_value = mysqli_real_escape_string($conn, 'blue');
        $new_sql = "UPDATE device SET lightColor = '$new_value'";
        mysqli_query($conn, $new_sql);
    } else if ($_POST['colorlist'] == 'green') {
        $new_value = mysqli_real_escape_string($conn, 'green');
        $new_sql = "UPDATE device SET lightColor = '$new_value'";
        mysqli_query($conn, $new_sql);
    }
    //refresh the page to relod the database
    header('Location: ./customer.php');
}

//whatever is the input change the database accordingly for the security
if (isset($_POST['security'])) {
    if ($_POST['sec'] == 'low') {
        $new_value = mysqli_real_escape_string($conn, 'low');
        $new_sql = "UPDATE device SET securityS = '$new_value'";
        mysqli_query($conn, $new_sql);
    } else if ($_POST['sec'] == 'off') {
        $new_value = mysqli_real_escape_string($conn, 'off');
        $new_sql = "UPDATE device SET securityS = '$new_value'";
        mysqli_query($conn, $new_sql);
    } else if ($_POST['sec'] == 'high') {
        $new_value = mysqli_real_escape_string($conn, 'high');
        $new_sql = "UPDATE device SET securityS = '$new_value'";
        mysqli_query($conn, $new_sql);
    }
    //refresh the page to relod the database
    header('Location: ./customer.php');
}

//control air conditioner, later will be implemented
if (isset($_POST['air'])) {
    $new_value = mysqli_real_escape_string($conn, $_POST['temp']);
    $new_sql = "UPDATE device SET tempature = '$new_value'";
    if (mysqli_query($conn, $new_sql)) {
        //success
    } else {
        echo 'query error: ' . mysqli_error($conn);
        header('Location: ./customer.php');
    }
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
                    echo 'OFF';
                } else {
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
                    echo 'RED';
                } else if ($color == 'green') {
                    echo 'GREEN';
                } else if ($color == 'blue') {
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
            <p class="title">DESIRED TEMPERATURE</p>
            <p class="state">
                <?php
                //shows the current tempature

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
                    echo 'OFF';
                } else {
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
                    echo 'LOW';
                } else if ($securityS == 'high') {
                    echo 'HIGH';
                } else if ($securityS == 'off') {
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
                    echo 'OPEN';
                } else {
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
                    echo 'CHARGING';
                } else {
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
                    echo 'OFF';
                } else {
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