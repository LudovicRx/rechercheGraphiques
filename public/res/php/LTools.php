<?php

/** LTools
 *  -------
 *  @file
 *  @copyright Copyright (c) 2021 Recherche graphiques, MIT License, See the LICENSE file for copying permissions.
 *  @brief Class for all the general functions of the project
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

  /**
   * Sanitize an input
   *
   * @param int $inputType type of the input
   * @param string $name name of the input
   * @param int $filterSanitize filter to apply to the input
   * @return string sanitized value
   */
  public static function filterInput($inputType, $name, $filterSanitize)
  {
    return filter_input($inputType, $name, $filterSanitize);
  }

  /**
   * Validate a var
   *
   * @param mixed $var the var to validate
   * @param int $filterValidate filter to apply
   * @param array $errors errors that are stored
   * @param string $textError text of the error
   * @return bool true if var is validated else false
   */
  public static function validateVar($var, $filterValidate, &$errors, $textError)
  {
    return self::verifyError(filter_var($var, $filterValidate), $errors, $textError);
  }

  public static function defineLanguage()
  {
  }

  // /**
  //  * Write a bool value as a string
  //  *
  //  * @param bool $value bool value to evaluate
  //  * @return string bool as a string
  //  */
  // public static function writeBool($value)
  // {
  //   return $value ? "true" : "false";
  // }

  /**
   * Verify an expression and fill an array is there is an error
   *
   * @param bool $expression expression to verify
   * @param array $errors array that contains errors
   * @param string $textError text of the error
   * @return bool
   */
  public static function verifyError($expression, &$errors, $textError)
  {
    if (!$expression) {
      array_push($errors, $textError);
    }
    return $expression;
  }
}
