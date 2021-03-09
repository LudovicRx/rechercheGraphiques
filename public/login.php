<?php

/** Login
 *  -------
 *  @file
 *  @copyright Copyright (c) 2020 Recherche Graphique, MIT License, See the LICENSE file for copying permissions.
 *  @brief Login page
 *  @author ludovic.rx@eduge.ch
 */

session_start();
require_once(__DIR__ . DIRECTORY_SEPARATOR . "res" . DIRECTORY_SEPARATOR . "php" . DIRECTORY_SEPARATOR . "all.inc.php");

/**> Error message when a user can't connect */
define("ERROR_MESSAGE", "The email or the pasword is wrong ;-;");

/**> Email that is entered by the user */
$email = "";

/**> Password that is entered by the user */
$password = "";

/**> Error that we can display */
$error = "";

if (filter_input(INPUT_POST, "submit", FILTER_SANITIZE_STRING)) {
    $tmpEmail = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    if (filter_var($tmpEmail, FILTER_VALIDATE_EMAIL)) {
        $email = $tmpEmail;
    }
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // If email and password are valid
    if (strlen($email) > 0 && strlen($password) > 0) {
        $user = LUserDB::getUserByEmail($email);
        if ($user) {
            if (LUserDB::verifyPassword($user->Id, $password)) {
                $_SESSION["idUser"] = $user->Id;
                header("Location: index.php");
                exit();
            }
        }
    }
    $error = ERROR_MESSAGE;
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
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="email">
            <label for="inputPassword" class="visually-hidden">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
            <?= displayError($error) ?>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <input class="w-100 btn btn-lg btn-primary" type="submit" value="Sign in" name="submit"></input>
            <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
        </form>
    </main>

</body>

</html>