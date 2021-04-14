<?php

/** Functions for the project
 *  -------
 *  @file
 *  @copyright Copyright (c) 2021 Recherche graphiques, MIT License, See the LICENSE file for copying permissions.
 *  @brief All the general functions for the project
 *  @author ludovic.rx@eduge.ch
 */

/**
 * Display an error 
 *
 * @param array $error content of the error
 * @return string the error as HTML
 */
function displayError(array $errors): string
{
  $result = "";
  foreach ($errors as $error) {
    $result .= '<div class="invalid-feedback d-block">';
    $result .= $error;
    $result .= "</div>";
  }

  return $result;
}


/**
 * Displays the login if not connected, else page for parameter
 *
 * @param LUser $user user 
 * @return string result as HTML 
 */
function displayLogin($user)
{
  $href = "";
  $text = "";
  if ($user === null) {
    $href = "login.php";
    $text = "Login";
  } else {
    $href = "account.php";
    $text = $user->Username;
  }
  return "<a class=\"nav-link btn btn-outline-dark\" href=\"$href\">$text</a>";
}
