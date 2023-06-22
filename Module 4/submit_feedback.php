<!-- navbar -->
<?php include '../Module 4/admin_nav.php'; ?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fkedu";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the submitted data
  $User_Email = $_POST['User_Email'];
  $satisfaction = $_POST['satisfaction'];
  $additional = $_POST['additional'];

  // Retrieve the user ID based on the provided User_Email
  $query = "SELECT User_ID FROM user WHERE User_Email = '$User_Email'";
  $result = mysqli_query($link, $query);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['user_id'];

    // Insert the feedback data into the satisfaction table
    $insertQuery = "INSERT INTO satisfaction (User_ID, satisfaction, additional) VALUES ('$User_ID', '$satisfaction', '$additional')";
    $insertResult = mysqli_query($link, $insertQuery);

    if ($insertResult) {
      echo "Feedback submitted successfully!<br>";
    } else {
      echo "Error submitting feedback: " . mysqli_error($link);
    }
  } else {
    echo "User not found.";
  }

  // Close the database connection
  mysqli_close($link);

  // Print the submitted data
  echo "Thank you for your feedback, $User_Email!<br>";
  echo "Rating: $satisfaction<br>";
  echo "Comments: $additional<br>";
}
?>
