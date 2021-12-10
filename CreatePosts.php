<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    /* check connection */
    $mysqli = new mysqli("mysql.eecs.ku.edu", "m778b860", "AeVee3io","m778b860");
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    $content = $_POST["content"];
    $userId = $_POST["userId"];
    if(strlen($content) == 0){
        echo "The content must not be null";
    }
    else{
        $selectQuery = "SELECT * FROM Users WHERE user_id = '$userId';";
        if ($result = $mysqli->query($selectQuery)) {
            if($result->num_rows == 1){
                $insertQuery = "insert into Posts (user_id, content) values ('$userId', '$content');";
                $mysqli->query($insertQuery);
                echo "Post successfully created";
            }
            else{
                echo "That user does not exist.";
            }
            // free result set 
            $result->free();
        }
    }
    // close connection
    $mysqli->close();
?>