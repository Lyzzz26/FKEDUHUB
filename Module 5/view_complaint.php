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

        // Display the complaint details
        echo "<h2>Complaint Details</h2>";
        echo "<p><strong>User ID:</strong> $userID</p>";
        echo "<p><strong>Complaint Type:</strong> $complaintType</p>";
        echo "<p><strong>Complaint Description:</strong> $complaintDescription</p>";

        echo "<button onclick=\"window.history.back()\">Back</button>";

    } else {
        echo "Complaint not found.";
    }

    mysqli_close($conn);
}
?>