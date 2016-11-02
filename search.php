<?php
include 'setup.php';
$data = json_decode(file_get_contents("php://input"));

if ($data->search) {
    $search = $conn->real_escape_string($data->search);
    $search = (string)$search;
}
else {
    $search = null;
}

$sql = "SELECT * FROM books WHERE MATCH (title, author, isbn, price, year_released)
     AGAINST ('$search*' IN BOOLEAN MODE)";

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
?>