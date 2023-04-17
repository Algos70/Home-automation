<?php
$conn = mysqli_connect('localhost', 'algos', '123456', 'dbtest');

//write query for all infos
$sql = 'SELECT email, pw, isAdmin FROM pinfo';

//make query and get result
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$infos = mysqli_fetch_all($result, MYSQLI_ASSOC);

//frees result from memory for good practice
mysqli_free_result($result);

//close connection if you want to
//mysqli_close($conn);

//print_r($infos);


if (isset($_POST['login'])) {
    //secure the input and get them from the global variable post
    $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $i = 0;
    $isEmailFound = false;

    foreach ($infos as $item) {
        if ($item['email'] === $email) {
            $isEmailFound = true;
            break;
        }
        $i++;
    }


    //If input is in the database then get them from the data base
    //else just show wrong password to the user like the user input the 
    //wrong password
    if ($isEmailFound) {
        //variables from the database
        $email = $infos[$i]['email'];
        $pw = $infos[$i]['pw'];
        $isAdmin = $infos[$i]['isAdmin'];

        if ($email === $email  && $password === $pw && $isAdmin == 0) {
            echo "Zort not an admin";
            //redirect to the customer
            header("Location: ./customer.php");
        } else if (($email === $email  && $password === $pw && $isAdmin == 1)) {
            echo 'Zort admin';
            //redirect to producer
            header("Location: ./producer.php");
        } else {
        }
    } else {
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="producer-styles.css">

    <title>Wrong Password</title>
</head>

<body>
    <div class="header">
        <h1>Wrong password, please try again later.</h1>
        <button onclick="window.location.href = 'index.html'" class="home"> Home Page </button>

    </div>
</body>

</html>