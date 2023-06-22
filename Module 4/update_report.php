<!-- navbar -->
<?php include '../Module 4/admin_nav.php'; ?>

<?php
// Check if the Report_ID and Report_Status parameters are provided
if (isset($_GET['Report_ID']) && isset($_GET['Report_Status'])) {
    // Get the Report_ID and Report_Status from the URL parameters
    $Report_ID = $_GET['Report_ID'];
    $Report_Status = $_GET['Report_Status'];


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fkedu";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update the Report_Status in the report table
    $updateQuery = "UPDATE report SET Report_Status = '$Report_Status' WHERE Report_ID = $Report_ID";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        // Report_Status updated successfully
        echo "Report_Report_Status updated successfully.";
    } else {
        // Error updating Report_Status
        echo "Error updating Report_Status: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Invalid parameters provided
    echo "Invalid parameters.";
}
?>
