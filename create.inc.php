<?php

include_once 'db_connection.php';

$first = $_POST['first'];
$last = $_POST['last'];
$email = $_POST['email'];
$age = $_POST['age'];
$location = $_POST['location'];

$sql = "INSERT INTO users (firstname, lastname, email, age, location, date) VALUES ('$first', '$last', '$email', '$age', '$location', CURRENT_TIMESTAMP);";
mysqli_query($conn, $sql);

header("Location: index.php");
mysqli_close($conn);
?>