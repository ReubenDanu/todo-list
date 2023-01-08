<?php 
    require_once("modal.php");
    $config = array(
        "host" => "localhost",
        "port" => 3308, //home
        // "port" => 3306, school
        "username" => "root",
        "password" => "",
        "database" => "todolist"
    );

    
    $database = new database($config["host"], $config["username"], $config["password"], $config["database"], $config["port"]);

    $database->setup();
?>