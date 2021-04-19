<!DOCTYPE html>
<html>
<head>
<title>Assignment 2</title>
</head>

<body>

<h2>Delete users</h2>

<?php
include_once 'db_connection.php';
$sql = "SELECT * FROM users";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
  echo "SQL failure";
} else {
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  while ($row = mysqli_fetch_assoc($result)) {
    $id = $row["userID"];
    echo '<form action="delete.php?userID='.$row['userID'].'" method="POST">ID number: ' . $row["userID"]. ' | Name: ' 
    . $row["firstname"]. ' ' . $row["lastname"]. ' | Email: ' . $row["email"]. ' | Age: '
    . $row["age"]. ' | Location: ' . $row["location"]. ' ' 
    . '<button type="submit" name="delete">Delete</button></form><br>';
  }
}

if (isset($_POST["delete"])) {
  include_once 'db_connection.php';

  $userID = mysqli_real_escape_string($conn, $_GET['userID']);
  $sql = "DELETE FROM users WHERE userID='$userID';";
  mysqli_query($conn, $sql);
  mysqli_close($conn);
  header("Location: delete.php");
}

mysqli_close($conn);
?>

<a href="index.php">Back to home</a>
</body>

</html>

<?php
