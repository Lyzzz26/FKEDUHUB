<?php
if (isset($_GET['id'])) {
    $complaintID = $_GET['id'];

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'fkedu';

    // Fetch the complaint data from the database based on the complaint ID
    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
        die('Database connection error: ' . mysqli_connect_error());
    }

    $query = "SELECT * FROM complaint WHERE Complaint_ID = '$complaintID'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $userID = $row['User_ID'];
        $complaintType = $row['Complaint_Type'];
        $complaintDescription = $row['Complaint_Description'];

        // Display the edit form with pre-filled data
        echo "<h2>Edit Complaint</h2>";
        echo "<form action='update_complaint.php' method='POST'>";
        echo "<input type='hidden' name='complaintID' value='$complaintID'>";
        echo "<label for='user_ID'>User ID:</label>";
        echo "<input type='text' id='user_ID' name='user_ID' value='$userID' required>";
        echo "<label for='complaint_type'>Complaint Type:</label>";
        echo "<input type='text' id='complaint_type' name='complaint_type' value='$complaintType' required>";
        echo "<label for='complaint_description'>Complaint Description:</label>";
        echo "<input type='text' id='complaint_description' name='complaint_description' value='$complaintDescription' required>";
        echo "<input type='submit' value='Update'>";
        echo "</form>";
    } else {
        echo "Complaint not found.";
    }

    mysqli_close($conn);
}
?>