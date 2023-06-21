<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fkedu";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$userID = $_POST['user_ID'];
$complaintType = $_POST['Complaint_Type'];
$complaintDescription = $_POST['Complaint_Description'];

// Check if the selected complaint type is "other"
if ($_POST['Complaint_Type'] === 'other') {
    $otherComplaintType = $_POST['other-Complaint_Type'];
    // Use the user input from the "other complaint type" container
    $complaintType = $otherComplaintType;
}


// Define the initial complaint status as "In Investigation"
$complaintStatus = "In Investigation";

// Prepare and execute the SQL query
$stmt = $conn->prepare("INSERT INTO complaint (Complaint_ID, Complaint_Date, Complaint_Description, Complaint_Type, Complaint_Status, Complaint_Feedback, User_ID) VALUES (?, NOW(), ?, ?, 'In Investigation', '', ?)");
$stmt->bind_param("ssss", $complaintID, $complaintDescription, $complaintType, $userID);
$complaintID = uniqid(); // Generate a unique ID for the complaint
$stmt->execute();

// Check if the insertion was successful
if ($stmt->affected_rows > 0) {
    $message = "Complaint submitted successfully!";
} else {
    $message = "Error submitting the complaint.";
}

// Close the database connection
$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Complaint Submission</title>
    <script>
        window.onload = function() {
            alert("<?php echo $message; ?>");
            window.location.href = "complaint_homepage.php";
        };
    </script>
</head>
<body>
</body>
</html>