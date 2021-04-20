<?php

/** Index
 *  -------
 *  @file
 *  @copyright Copyright (c) 2021 Recherche Graphique, MIT License, See the LICENSE file for copying permissions.
 *  @brief Page for paramater of the account
 *  @author ludovic.rx@eduge.ch
 */

require_once(__DIR__ . DIRECTORY_SEPARATOR . "res" . DIRECTORY_SEPARATOR . "php" . DIRECTORY_SEPARATOR . "all.inc.php");
$session = new LSession();
/**> User (null if not connected)) */
$user = $session->getUserSession();

?>
<!DOCTYPE html>
<html lang="fr" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="res/css/main.css">

    <title>Account</title>
</head>

<body class="d-flex flex-column h-100">
    <?php include_once(HEADER_PATH); ?>
    <div class="container-md mt-lg-5 mt-md-3 mt-3 bg-light py-4">
        <h2>Account Settings</h2>
        <hr>
        <div class="container py-3">
            <h3>General Setting</h3>
            <form class="row row-cols-lg-auto g-3 align-items-center mb-3" method="POST" action="#">
                <div class="col-12">
                    <label class="visually-hidden" for="inlineFormInputGroupEmail">Email</label>
                    <div class="input-group">
                        <div class="input-group-text">@</i></div>
                        <input type="text" class="form-control" id="inlineFormInputGroupEmail" placeholder="Email" name="email">
                    </div>
                </div>
                <div class="col-12">
                    <label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label>
                    <div class="input-group">
                        <div class="input-group-text"><i class="bi bi-person"></i></div>
                        <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username" name="username">
                    </div>
                </div>
                <div class="col-12">
                    <input type="submit" class="btn btn-dark" name="generalSettings" value="Update" />
                </div>
            </form>
        </div>

        <div class="container py-3">
            <fieldset>
                <legend>
                    <h3>Change Password</h3>
                </legend>
                <form class="col">
                    <div class="col-lg-6 form-floating mb-3">
                        <input type="password" class="form-control" id="inputOldPassword" placeholder="Old Password">
                        <label for="inputOldPassword" class="form-label">Old Password</label>
                    </div>
                    <div class="col-lg-6 form-floating mb-3">
                        <input type="password" class="form-control" id="inputNewPassword" placeholder="New password">
                        <label for="inputNewPassword" class="form-label">New Password</label>
                    </div>
                    <div class="col-lg-6 form-floating mb-3">
                        <input type="password" class="form-control" id="inputNewPasswordVerify" placeholder="Verify Password">
                        <label for="inputNewPasswordVerify" class="form-label" name="inputNewPasswordVerify">Verify Password</label>
                    </div>
                    <div class="col-12">
                        <input type="submit" class="btn btn-dark" value="Update Password" />
                    </div>
                </form>
            </fieldset>
        </div>
    </div>

    <?php include_once(FOOTER_PATH) ?>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>