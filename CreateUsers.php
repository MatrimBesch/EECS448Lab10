<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    /* check connection */
    $mysqli = new mysqli("mysql.eecs.ku.edu", "m778b860", "AeVee3io","m778b860");
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    $userId = $_POST["userId"];
    if(strlen($userId) == 0){
        echo "The user name must not be null";
    }
    else{
        $selectQuery = "SELECT * FROM Users WHERE user_id = '$userId';";
        if ($result = $mysqli->query($selectQuery)) {
            if($result->num_rows == 0){
                $insertQuery = "insert into Users (user_id) values ('$userId');";
                $mysqli->query($insertQuery);
                echo "User $userId successfully created";
            }
            else{
                echo "That user already exists.";
            }
            // free result set 
            $result->free();
        }
    }
    // close connection
    $mysqli->close();
?>