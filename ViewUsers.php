<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "m778b860", "AeVee3io","m778b860");
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    $selectQuery = "SELECT * FROM Users;";
    if ($result = $mysqli->query($selectQuery)) {
        while($row = $result->fetch_assoc()){
            echo $row['user_id'];
            echo "<br><br>";
        }
        // free result set 
        $result->free();
    }
?>