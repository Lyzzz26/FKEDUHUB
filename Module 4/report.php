<!-- navbar -->
<?php include '../Module 4/admin_nav.php'; ?>

<!DOCTYPE html>
<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    .report-form {
      background-color: #f9f9f9;
      border: 1px solid #ddd;
      border-radius: 4px;
      padding: 30px;
      width: 400px;
      margin: 0 auto;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    select,
    textarea {
      width: 100%;
      padding: 8px;
      border: 1px solid #ddd;
      border-radius: 4px;
      margin-bottom: 10px;
    }

    textarea {
      height: 120px;
    }

    .button-container {
      text-align: center;
    }

    .submit-button,
    .cancel-button {
      padding: 8px 16px;
      background-color: #4CAF50;
      color: black;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-right: 10px;
    }

    .cancel-button {
      background-color: #ccc;

    }
  </style>
</head>

<body>

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
    // Retrieve form data
    $Complaint_ID = $_POST["complaint_id"];
    $Report_Name = $_POST["Report_Name"];
    $Report_Time = $_POST["time"];
    $Report_Detail = $_POST["Report_Detail"];

    if (empty($Complaint_ID) || empty($Report_Name) || empty($Report_Time) || empty($Report_Detail)) {
      echo '<script>alert("Please fill in all the fields!!");</script>';
    } else {
      // Retrieve the maximum report ID from the database
      $maxReportIdQuery = "SELECT MAX(Report_ID) AS max_id FROM report";
      $maxReportIdResult = mysqli_query($conn, $maxReportIdQuery);
      $maxReportIdRow = mysqli_fetch_assoc($maxReportIdResult);
      $maxReportId = $maxReportIdRow['max_id'];

      // Calculate the new report ID by adding 1 to the maximum ID
      $newReportId = $maxReportId + 1;

      // Construct INSERT query with the manually specified report ID
      $insertQuery = "INSERT INTO report (Report_ID, Complaint_ID, Report_Name, Report_Time, Report_Detail) VALUES ('$newReportId', '$Complaint_ID', '$Report_Name', '$Report_Time', '$Report_Detail')";

      // Execute INSERT query
      if (mysqli_query($conn, $insertQuery)) {
        header("Location: report_page.php"); // Redirect to view.php
        exit();
      } else {
        echo "Error inserting record: " . mysqli_error($conn);
      }
    }
  }

  // SQL query with INNER JOIN
  $typeQuery = "SELECT * FROM type";
  $typeResult = mysqli_query($conn, $typeQuery);

  // If no rows found, initialize variables with empty values
  $Complaint_ID = "";
  $Report_Name = "";
  $Report_TIme = "";
  $Report_Detail = "";
  ?>

  <title>Report</title>

  <div class="report">
    <div style="margin-top: 30px; margin-left: 10px;">
      <form class="row g-3" method="POST" action="" onsubmit="return validateForm();">
        <h6 align="left"><b>MAKE A REPORT</b></h6><br><br>
        <div class="mb-3 row">
          <label for="Report_Name" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="Report_Name" name="Report_Name"
              value="<?php echo $Report_Name; ?>">
          </div>
        </div>

        <div class="mb-3 row" style="margin-top: 10px;">
          <label for="Complaint_ID" class="col-sm-2 col-form-label">Report Type</label>
          <div class="col-sm-10">
            <select class="form-select" id="Complaint_ID" name="Complaint_ID" aria-label="Default select example">
              <option value="">Select report type</option>
              <?php
              while ($typeRow = mysqli_fetch_assoc($typeResult)) {
                $Complaint_ID = $typeRow['Complaint_ID'];
                $type_type = $typeRow['type_type'];
                echo "<option value='$Complaint_ID'>$type_type</option>";
              }
              ?>
            </select>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="Report_TIme" class="col-sm-2 col-form-label">Time</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="Report_TIme" name="Report_TIme" value="<?php echo $Report_TIme; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="" class="col-sm-2 col-form-label">Report Detail</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="Report_Detail" name="Report_Detail"
              rows="5"><?php echo $Report_Detail; ?></textarea>
          </div>
        </div>
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-primary">SUBMIT</button>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <button type="button" class="cancel-button" onclick="cancelReport()">Cancel</button>
        </div>
      </form>
      <br><br><br>
    </div>
  </div>
  </div>

  <script>
    function cancelReport() {
      // Redirect to the previous page or perform any desired action
      window.history.back();
    }

    function validateForm() {
      var type = document.getElementById("$Complaint_ID").value;
      var Report_Name = document.getElementById("Report_Name").value;
      var Report_TIme = document.getElementById("Report_TIme").value;
      var Report_Detail = document.getElementById("Report_Detail").value;

      if (type === "" || Report_Name === "" || Report_TIme === "" || Report_Detail === "") {
        alert("Please fill in all the fields!!");
        return false;
      }

      return true;
    }
  </script>
</body>

</html>