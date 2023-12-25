<?php
session_start();
require '../vendor/autoload.php';
require "../src/config/constants.php";

// route handling
$router = require '../src/routes.php';
