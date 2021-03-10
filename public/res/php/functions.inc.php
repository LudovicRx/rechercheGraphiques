<?php

/** Functions for the project
 *  -------
 *  @file
 *  @copyright Copyright (c) 2020 Recherche graphiques, MIT License, See the LICENSE file for copying permissions.
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
