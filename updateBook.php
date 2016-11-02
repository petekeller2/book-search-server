<?php
include 'setup.php';
$data = json_decode(file_get_contents("php://input"));

if ($data->ID) {
    $ID = $conn->real_escape_string($data->ID);
    if ($data->title) {
        $title = $conn->real_escape_string($data->title);

        $sql = "UPDATE books SET title='$title' WHERE ID='$ID'";
        if ($conn->query($sql) === TRUE) {

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else {

    }

    if ($data->author) {
        $author = $conn->real_escape_string($data->author);

        $sql = "UPDATE books SET author='$author' WHERE ID='$ID'";
        if ($conn->query($sql) === TRUE) {

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else {

    }

    if ($data->isbn) {
        $isbn = $conn->real_escape_string($data->isbn);

        $sql = "UPDATE books SET isbn='$isbn' WHERE ID='$ID'";
        if ($conn->query($sql) === TRUE) {

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else {

    }

    if ($data->price) {
        $price = $conn->real_escape_string($data->price);

        $sql = "UPDATE books SET price='$price' WHERE ID='$ID'";
        if ($conn->query($sql) === TRUE) {

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else {

    }

    if ($data->year_released) {
        $year_released = $conn->real_escape_string($data->year_released);

        if ($data->adOrbc) {
            $adOrbc = $conn->real_escape_string($data->adOrbc);
        }
        else {
            $adOrbc = null;
        }

        if ($adOrbc == "BC") {
         $year_released = "-" . $year_released;
        }

        $sql = "UPDATE books SET year_released='$year_released' WHERE ID='$ID'";
        if ($conn->query($sql) === TRUE) {

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else {

    }
}
else {
    echo "Error: ID missing";
}
?>