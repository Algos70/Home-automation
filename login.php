<?php
//if login button pressed take inputs and compare them to find successful login
if (isset($_POST['login'])) {
    //secure the input and get them from the global variable post
    $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);


    $producerEmail = 'b@gmail.com';
    $producerPw = '123';
    $customerEmail = 'a@gmail.com';
    $customerPw = '1234';


    if ($email === $customerEmail && $password === $customerPw) {
        echo "Zort not an admin";
        //redirect to the customer
        header("Location: ./customer.php");
    } else if (($email === $producerEmail && $password === $producerPw)) {
        echo 'Zort admin';
        //redirect to the producer
        header("Location: ./producer.php");
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
    <div>a</div>
</body>

</html>