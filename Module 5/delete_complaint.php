<?php
if (isset($_GET['id'])) {
    $complaintID = $_GET['id'];

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'fkedu';

    // Delete the complaint from the database
    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
        die('Database connection error: ' . mysqli_connect_error());
    }

    $query = "DELETE FROM complaint WHERE Complaint_ID = '$complaintID'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $redirect = isset($_GET['redirect']) ? $_GET['redirect'] : 'complaint_data.php';

        echo "<script>";
        echo "alert('Complaint deleted successfully.');";
        echo "window.location.href = '$redirect';";
        echo "</script>";
        exit;
        
    } else {
        echo "Error deleting complaint: " . mysqli_error($conn);
        
    }

    mysqli_close($conn);
}
?>