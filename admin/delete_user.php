<?php
require_once('../system/controller/UsersController.php');
if($_GET["id"]){
    // echo $_GET["id"];
    $usersController = new UsersController();
    $usersController->deleteUsers($_GET["id"]);
}