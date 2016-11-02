<?php
include 'setup.php';

$data = json_decode(file_get_contents("php://input"));

if ($data->ID) {
    $ID = $conn->real_escape_string($data->ID);
}
else {
    $ID = null;
}

$sql = "DELETE FROM books WHERE ID = '$ID'";

if ($conn->query($sql) === TRUE) {
    echo "Book deleted!";
} else {
 echo "Search Error: " . $conn->error;
}

?>