<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $complaintID = $_POST['complaintID'];
    $userID = $_POST['user_ID'];
    $complaintType = $_POST['complaint_type'];
    $complaintDescription = $_POST['complaint_description'];

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'fkedu';

    // Update the complaint data in the database
    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
        die('Database connection error: ' . mysqli_connect_error());
    }

    $query = "UPDATE complaint SET User_ID = '$userID', Complaint_Type = '$complaintType', Complaint_Description = '$complaintDescription' WHERE Complaint_ID = '$complaintID'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Complaint updated successfully.";
        $redirect = isset($_GET['redirect']) ? $_GET['redirect'] : 'complaint_form.php';
        echo "<script>";
        echo "alert('Complaint updated successfully.');";
        echo "window.location.href = '$redirect';";
        echo "</script>";
        exit;
    } else {
        echo "Error updating complaint: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>