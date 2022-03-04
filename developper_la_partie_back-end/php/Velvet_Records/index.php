<?php
session_start();
include('config.php');
include('include/route.php');
$route = new route();
$route->index();