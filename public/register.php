<?php

/** Register
 *  -------
 *  @file
 *  @copyright Copyright (c) 2020 Recherche Graphique, MIT License, See the LICENSE file for copying permissions.
 *  @brief Register page
 *  @author ludovic.rx@eduge.ch
 */

session_start();
require_once(__DIR__ . DIRECTORY_SEPARATOR . "res" . DIRECTORY_SEPARATOR . "php" . DIRECTORY_SEPARATOR . "all.inc.php");

/**> Error message when the email is already used */
define("ERROR_MESSAGE_EMAIL", "The email is already used.");
/**> Error message when the usernamiis already used */
define("ERROR_MESSAGE_USERNAME", "The username is already used.");
/**> Error message when both passwords are not the same */
define("ERROR_MESSAGE_PASSWORD", "The passwords are not the same.");
/**> Error message when not all the fields are set */
define("ERROR_MESSAGE_FILLED", "You need to fill all the fields.");
/**> Error message if ther is an error when we add in the database */
define("ERROR_MESSAGE_DATABASE", "Your account could not be added in the database.");

/**> Email that is entered by the user */
$email = "";

/**> username that is entered by the user */
$username = "";

/**> Password that is entered by the user */
$password = "";

/**> Password to verify */
$passwordVerify = "";

/**> Error that we can display */
$errors = array();

if (filter_input(INPUT_POST, "submit", FILTER_SANITIZE_STRING)) {
    $userDB = new LUserDB();
    $tmpEmail = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    if (filter_var($tmpEmail, FILTER_VALIDATE_EMAIL)) {
        $email = $tmpEmail;
    }
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $passwordVerify = filter_input(INPUT_POST, "passwordVerify", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // If email, username, password and password verify are valid
    if (strlen($email) > 0 && strlen($username) > 0 && strlen($password) > 0 && strlen($passwordVerify) > 0) {

        if (!$userDB->emailExists($email)) {
            if ($password == $passwordVerify) {
                if ($userDB->insertUser($email, $username, $password)) {
                    header("Location: login.php");
                } else {
                    array_push($errors, ERROR_MESSAGE_DATABASE);
                }
            } else {
                array_push($errors, ERROR_MESSAGE_PASSWORD);
            }
        } else {
            array_push($errors, ERROR_MESSAGE_EMAIL);
        }
    } else {
        array_push($errors, ERROR_MESSAGE_FILLED);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Theme color -->
    <meta name="theme-color" content="#7952b3">

    <!-- Custom styles for this template -->
    <link href="res/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form action="#" method="POST">
            <img class="mb-4" src="res/img/bar-chart.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            <label for="inputEmail" class="visually-hidden">Email address</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="email" value="<?= $email ?>">
            <label for="inputUsername" class="visually-hidden">Username</label>
            <input type="text" id="inputUsername" class="form-control" placeholder="Username" required autofocus name="username" value="<?= $username ?>">
            <label for="inputPassword" class="visually-hidden">Password</label>
            <input type="password" id="inputPassword" class="form-control m-0" placeholder="Password" required name="password">
            <label for="inputPasswordVerify" class="visually-hidden">Password Verify</label>
            <input type="password" id="inputPasswordVerify" class="form-control" placeholder="Password Verify" required name="passwordVerify">
            <?= displayError($errors) ?>
            <!-- <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div> -->
            <input class="w-100 btn btn-lg btn-primary" type="submit" value="Sign in" name="submit"></input>
            <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
        </form>
    </main>

</body>

</html>