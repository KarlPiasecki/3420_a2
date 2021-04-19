<!DOCTYPE html>
<html>
<head>
<title>Assignment 2</title>
</head>

<body>

<h2>Edit user</h2>

<form method="POST">
<input type="text" name="first" placeholder="New first name">
<br>
<input type="text" name="last" placeholder="New last name">
<br>
<input type="text" name="email" placeholder="New email">
<br>
<input type="text" name="age" placeholder="New age">
<br>
<input type="text" name="location" placeholder="New location">
<br>
<button type="submit" name="submat">Submit</button>
</form>
<br><br>
<a href="index.php">Back to home</a>


<?php
if (isset($_POST["submat"])) {
    include_once 'db_connection.php';
    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $location = $_POST['location'];
    $userID = mysqli_real_escape_string($conn, $_GET['userID']);
    $sql = "UPDATE users SET firstname='$first', lastname='$last', email='$email', age='$age', location='$location'  WHERE userID='$userID';";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: update.php");
}

?>

</body>

</html>