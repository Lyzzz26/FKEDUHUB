<?php
// Retrieve the report ID from the URL parameter
$Report_ID = $_GET['id'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fkedu";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Retrieve the existing data before deleting the record
$query = "SELECT r.Report_ID, r.Report_Name, r.Report_Time, r.Complaint_ID, c.Complaint_Type, r.Report_Detail, r.Report_Status
          FROM report r
          INNER JOIN type t ON r.Complaint_ID = c.Complaint_ID
          ORDER BY r.Report_ID ASC";

// Execute the select query
$result = mysqli_query($conn, $query);

// Check if the select operation was successful
if ($result) {
    // Update the report IDs to refresh sequentially
    $updateQuery = "SET @count = 0";
    mysqli_query($conn, $updateQuery);
    $updateQuery = "UPDATE report SET Report_ID = @count:= @count + 1";
    mysqli_query($conn, $updateQuery);

    // Create the delete query
    $deleteQuery = "DELETE FROM report WHERE Report_ID = $Report_ID";

    // Execute the delete query
    $deleteResult = mysqli_query($conn, $deleteQuery);

    // Check if the delete operation was successful
    if ($deleteResult) {
        // Redirect the user to a success page or display a success message
        header("Location: reportList.php");
        exit;
    } else {
        // Display an error message
        echo "Error deleting the report: " . mysqli_error($conn);
    }
} else {
    // Display an error message
    echo "Error retrieving data: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>