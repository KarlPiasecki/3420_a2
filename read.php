<!DOCTYPE html>
<html>
<head>
<title>Assignment 2</title>
</head>

<body>

<h2>Search for a user based on location</h2>

<form action ="read.php" method="POST">
<input type="text" name="location" placeholder="Enter location">
<br>
<button type="submit" name="submit">Search</button>
</form>
<?php
error_reporting(E_ALL ^ E_WARNING);
include_once 'db_connection.php';


$location = $_POST['location'];


$sql = "SELECT * FROM users WHERE location = '$location';";
$result = mysqli_query($conn, $sql);
mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<h1>Search Results:</h1>";
    while($row = mysqli_fetch_assoc($result)) {
      echo "ID number: " . $row["id"]. " | Name: " . $row["firstname"]. " " . $row["lastname"]. " | Email: " . $row["email"]. " | Age: "
       . $row["age"]. " | Location: " . $row["location"]. "<br><br>";
    }
  }


mysqli_close($conn);
?>



<a href="index.php">Back to home</a>
</body>

</html>
