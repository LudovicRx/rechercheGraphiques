<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "all.inc.php");
$session = new LSession();
$session->destroySession();

header("Location: ../../../index.php");
exit();