<?php

/** Functions for the project
 *  -------
 *  @file
 *  @copyright Copyright (c) 2021 Recherche graphiques, MIT License, See the LICENSE file for copying permissions.
 *  @brief All the general functions for the project
 *  @author ludovic.rx@eduge.ch
 */

/**
 * Class that has only static functions
 * These are the functions for the project
 */
class LTools
{
  /**
   * Display an error 
   *
   * @param array $error content of the error
   * @return string the error as HTML
   */
  public static function displayError(array $errors): string
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
  public static function displayLogin($user)
  {
    $result = "";
    if ($user === null) {
      $result = "<a class=\"nav-link btn btn-outline-dark\" href=\"login.php\">Login</a>";
    } else {
      $result .= "<div class=\"dropdown\">";
      $result .= "  <button class=\"btn btn-dark dropdown-toggle\" type=\"button\" id=\"dropdownUser\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" data-bs-toggle=\"dropdown\">";
      $result .=      "Hello, $user->Username";
      $result .= "  </button>";
      $result .= "  <div class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"dropdownUser\">";
      $result .= "    <a class=\"dropdown-item\" href=\"account.php\">Account</a>";
      $result .= "    <div class=\"dropdown-divider\"></div>";
      $result .= "    <a class=\"dropdown-item\" href=\"res/php/api/signout.php\">Signout</a>";
      $result .= "  </div>";
      $result .= "</div>";
    }
    return $result;
  }
}
