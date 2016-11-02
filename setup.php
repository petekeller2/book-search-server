<?php
function cors() {

    // Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
        // you want to allow, and if so:
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }

    //echo "You have CORS!";
}
cors();

$servername = "localhost";
$username = "root";
$password = "root";
$db = "books";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//check if db exists
$sqlCreateDB = "CREATE DATABASE IF NOT EXISTS books";
if ($conn->query($sqlCreateDB) === TRUE) {
    //echo "Database created successfully or it already exists" . " <br> ";
} else {
    echo "Error creating database: " . $conn->error . " <br> ";
}

$conn->close();

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . " <br> ");
}

// sql to create table, all varchar to make use of fulltext search
$sql = "CREATE TABLE IF NOT EXISTS books (
        ID int NOT NULL AUTO_INCREMENT,
        author varchar(255),
        title varchar(255) NOT NULL,
        isbn varchar(255) UNIQUE,
        price varchar(255),
        year_released varchar(255),
        PRIMARY KEY(ID),
        FULLTEXT (author,title,isbn,price,year_released)
) ENGINE=MyISAM";

if ($conn->query($sql) === TRUE) {
    //echo "Table books created successfully <br> ";
} else {
    echo "Error creating table: " . $conn->error . " <br> ";
}

?>