<?php
$name = filter_input(INPUT_POST, 'contactName');
$last = filter_input(INPUT_POST, 'contactLast');
$email = filter_input(INPUT_POST, 'contactEmail');
if (!empty($email)) {
    if (!empty($name)) {
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "myweb";

// Create connection
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
        } else {
            $sql = "INSERT INTO account (name, last, email)
values ('$name','$last','$email')";
            if ($conn->query($sql)) {
                echo "New record is inserted sucessfully";
            } else {
                echo "Error: " . $sql . "
" . $conn->error;
            }
            $conn->close();
        }
    } else {
        echo "Email should not be empty";
        die();
    }
} else {
    echo "Name should not be empty";
    die();
}
