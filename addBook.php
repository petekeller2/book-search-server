<?php
include 'setup.php';
$data = json_decode(file_get_contents("php://input"));

//switch from null to value to set a default value
if ($data->title) {
    $title = $conn->real_escape_string($data->title);
}
else {
    $title = null;
}
if ($data->author) {
    $author = $conn->real_escape_string($data->author);
}
else {
    $author = null;
}
if ($data->isbn) {
    $isbn = $conn->real_escape_string($data->isbn);
}
else {
    $isbn = null;
}
if ($data->price) {
    $price = $conn->real_escape_string($data->price);
}
else {
    $price = null;
}
if ($data->year_released) {
    $year_released = $conn->real_escape_string($data->year_released);
}
else {
    $year_released = null;
}
if ($data->adOrbc) {
    $adOrbc = $conn->real_escape_string($data->adOrbc);
}
else {
    $adOrbc = null;
}
if ($adOrbc == "BC") {
 $year_released = "-" . $year_released;
}

$sql = "INSERT INTO books (title, author, isbn, price, year_released)
VALUES ('$title', '$author', '$isbn', '$price', '$year_released')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>