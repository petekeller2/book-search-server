<?php
include 'setup.php';

$sql = "SELECT * FROM books";

if ($result=$conn->query($sql)) {

    $json = array();

    while($row = $result->fetch_assoc()) {
        $json[] = $row;
    }
    echo json_encode($json);

    $result->close();
} else {
 echo "Search Error: " . $conn->error;
}