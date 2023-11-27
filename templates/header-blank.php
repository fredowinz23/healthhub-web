<?php
session_start();
include_once($ROOT_DIR . "config/database.php");
include_once($ROOT_DIR . "config/Models.php");
?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Health Hub</title>
  <link rel="shortcut icon" type="image/png" href="<?=$ROOT_DIR;?>templates/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="<?=$ROOT_DIR;?>templates/assets/css/styles.min.css" />
</head>

<body>
