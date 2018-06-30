<?php
error_reporting(E_ALL ^ E_WARNING);
require_once "./Controller/Controller.php";


session_start();
$controller = new Controller();
$controller->processRequest();

?>
