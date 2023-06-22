<!-- navbar -->
<?php include '../Module 4/admin_nav.php'; ?>

<!DOCTYPE html>
<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    tr:hover {
      background-color: #f5f5f5;
    }

    .update-btn,
    .delete-btn {
      padding: 4px 8px;
      border: none;
      cursor: pointer;
      font-size: 14px;
    }

    .update-btn {
      background-color: #4CAF50;
      color: white;
    }

    .delete-btn {
      background-color: #f44336;
      color: white;
    }

    .sidebar .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
    }

    .openbtn {
      font-size: 20px;
      cursor: pointer;
      background-color: #69C9C4;
      color: white;
      padding: 10px 15px;
      border: none;
      width: 100%;
      text-align: left;
    }

    .openbtn:hover {
      background-color: #9FDDDA;
    }

    #main {
      transition: margin-left .5s;
      padding: 16px;
      background-color: ;
    }

    /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
    @media screen and (max-height: 450px) {
      .sidebar {
        padding-top: 15px;
      }

      .sidebar a {
        font-size: 18px;
      }
    }

    .custom-container {
      background-color: black;
      color: black;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    }

    /* Pagination */
    .dataTables_wrapper .dataTables_paginate {
      margin-top: 10px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
      padding: 5px;
      margin-left: 5px;
      display: inline-block;
      border: ;
      background-color: ;
      cursor: pointer;
      text-decoration: none;
      color: #A6A6A6;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
      background-color: ;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
      background-color: #9FDDDA;
      color: black;
    }

    /* Show entries dropdown */
    .dataTables_wrapper .dataTables_length {
      margin-top: 10px;
      text-align: right;
      /* Align to the right */
    }

    .dataTables_wrapper .dataTables_length .custom-select {
      display: inline-block;
      vertical-align: middle;
      margin-left: 5px;
      width: auto;
    }

    /* Search input */
    #search-input {
      width: 200px;
      margin-left: 5px;
    }

    .dataTables_wrapper .dataTables_filter label {
      display: inline-block;
      vertical-align: middle;
      margin-left: 5px;
    }

    .dataTables_wrapper .dataTables_filter input[type="search"] {
      display: inline-block;
      vertical-align: middle;
      margin-left: 5px;
      width: auto;
    }

    /* Show entries dropdown */
    .dataTables_wrapper .dataTables_length {
      margin-top: 10px;
      text-align: right;
      /* Align to the right */
    }

    /* Full-width input fields */
    input[type=text],
    input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }


    /* Extra styles for the cancel button */
    .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
    }

    /* Center the image and position the close button */
    .imgcontainer {
      text-align: center;
      margin: 24px 0 12px 0;
      position: relative;
    }

    img.avatar {
      width: 40%;
      border-radius: 50%;
    }

    .container {
      padding: 16px;
    }

    span.psw {
      float: right;
      padding-top: 16px;
    }

    /* The Modal (background) */
    .modal {
      display: none;
      /* Hidden by default */
      position: fixed;
      /* Stay in place */
      z-index: 1;
      /* Sit on top */
      left: 0;
      top: 0;
      width: 100%;
      /* Full width */
      height: 100%;
      /* Full height */
      overflow: auto;
      /* Enable scroll if needed */
      background-color: rgb(0, 0, 0);
      /* Fallback color */
      background-color: rgba(0, 0, 0, 0.4);
      /* Black w/ opacity */
      padding-top: 60px;
    }

    /* Modal Content/Box */
    .modal-content {
      background-color: #fefefe;
      margin: 5% auto 15% auto;
      /* 5% from the top, 15% from the bottom and centered */
      border: 1px solid #888;
      width: 80%;
      /* Could be more or less, depending on screen size */
    }

    /* The Close Button (x) */
    .close {
      position: absolute;
      right: 25px;
      top: 0;
      color: #000;
      font-size: 35px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: red;
      cursor: pointer;
    }

    /* Add Zoom Animation */
    .animate {
      -webkit-animation: animatezoom 0.6s;
      animation: animatezoom 0.6s
    }

    @-webkit-keyframes animatezoom {
      from {
        -webkit-transform: scale(0)
      }

      to {
        -webkit-transform: scale(1)
      }
    }

    @keyframes animatezoom {
      from {
        transform: scale(0)
      }

      to {
        transform: scale(1)
      }
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
      span.psw {
        display: block;
        float: none;
      }

      .cancelbtn {
        width: 100%;
      }
    }

    canvas {
      width: 200px;
      height: 200px;
    }
  </style>
</head>

<body>

  <h2 align='center'>Report List</h2>
  <br>

  <!-- Filter -->
  <div style="margin-bottom: 10px; margin-top: 10px">
    <label for="filter">Filter by Complaint Type:</label>

    <select name="report_types" onchange="filterTable()" id="filter-report-types" class="form-control">
      <option value="all">All</option>
      <option value="Unsatisfied Expert's Feedback">Informational Report</option>
      <option value="Wrongly Assigned Research Area">Operational Report</option>
      <option value="Others">Others</option>
    </select>


  </div>

  <!-- Sort -->
  <div style="margin-bottom: 10px;">
    <label for="sort">Sort by:</label>
    <select name="sort" onchange="sortTable()" id="sort-complaint-date" class="form-control">
      <option value="default">Default</option>
      <option value="day">Particular Day</option>
      <option value="week">Week</option>
      <option value="month">Month</option>
    </select>
  </div>

  <?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'fkedu';

// Connect to the database
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die('Database connection error: ' . mysqli_connect_error());
}


  $query = "SELECT r.Report_ID, r.Report_Name, r.Report_Time, r.Complaint_Type, r.Report_Detail, r.Report_Status
          FROM report r
          INNER JOIN type t ON r.Complaint_ID = t.Complaint_ID";

  // Execute the query
  $result = mysqli_query($conn, $query);
  if ($result) {
    if (mysqli_num_rows($result) > 0) {
      echo '
        <table border="1" class="table table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Name of Reporter</th>
              <th>Date</th>
              <th>Report Type</th>
              <th>Report Detail</th>
              <th>Actions</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>';

      $rowNumber = 1;

      // Output data of each row
      while ($row = mysqli_fetch_assoc($result)) {
        $Report_ID = $row["report_id"];
        $Report_Name = $row["reporter_name"];
        $Report_Time = $row["time"];
        $Complaint_Type = $row["complaintType"];
        $Report_Detail = $row["reportDetails"];
        $Report_Status = $row["status"];

        echo "<tr>
                <td>$rowNumber</td>
                <td>$reporter_name</td>
                <td>$time</td>
                <td>$complaintType</td>
                <td>$reportDetails</td>
                <td>
                  <a href='deleteReport.php?id=$report_id'>
                    <img src='../public/delete.png' alt='Delete Icon' style='height: 20px; width: 20px;'>
                  </a>
                </td>
                <td class='report-status'>
                  <form method='POST' action=''>
                    <input type='hidden' name='report_id' value='$report_id'>
                    <select name='status'>
                      <option value='Investigation' " . ($status == 'Investigation' ? 'selected' : '') . ">Investigation</option>
                      <option value='On Hold' " . ($status == 'On Hold' ? 'selected' : '') . ">On Hold</option>
                      <option value='Resolved' " . ($status == 'Resolved' ? 'selected' : '') . ">Resolved</option>
                    </select>
                    <input type='submit' class='btn btn-primary' style='background-color: #69C9C4; border: none;' value='Update'>
                  </form>
                </td>
              </tr>";

        $rowNumber++;
      }

      echo '</tbody>
        </table>';
    } else {
      echo "0 results";
    }
  } else {
    echo "Error executing the query: " . mysqli_error($link);
  }


  ?>
  <?php

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $report_id = $_POST["report_id"];
    $status = $_POST["status"];

    // Update the status in the database
    $updateQuery = "UPDATE report SET status = '$status' WHERE report_id = $report_id";
    $updateResult = mysqli_query($link, $updateQuery);

    if ($updateResult) {
      echo "<script>alert('Status updated successfully.');</script>";
    } else {
      echo "Error updating the status: " . mysqli_error($link);
    }
  }


  ?>

  <div class="right">
    <button type="submit" class="btn btn-primary"
      style="background-color: #69C9C4; border: none; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);"
      onclick="document.getElementById('id01').style.display='block'" style="width:auto;">REPORT BY REPORT TYPES
    </button><br><br><br>

    <div id="id01" class="modal">

      <form class="modal-content animate" action="/action_page.php" method="post">
        <div class="imgcontainer">
          <span onclick="document.getElementById('id01').style.display='none'" class="close"
            title="Close Modal">&times;</span>
        </div>

        <div class="container">
          <canvas id="reportChart" style="max-height:10%, max-width:10%"></canvas>

          <?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'fkedu';

// Connect to the database
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die('Database connection error: ' . mysqli_connect_error());
}

          // SQL query
          $query = "SELECT t.type_type, COUNT(r.Complaint_ID) AS type_count
                  FROM report r
                  INNER JOIN type t ON r.Complaint_ID = t.Complaint_ID
                  GROUP BY r.Complaint_ID";

          // Execute the query
          $result = mysqli_query($conn, $query);

          if ($result) {
            // Initialize an empty array to store the report type counts
            $reportTypeCounts = array();

            // Iterate over the result set and store the report type counts
            while ($row = mysqli_fetch_assoc($result)) {
              $type_type = $row["type_type"];
              $type_count = $row["type_count"];

              $reportTypeCounts[$type_type] = $type_count;
            }

            // Extract the report types and counts as separate arrays
            $reportTypes = array_keys($reportTypeCounts);
            $reportCounts = array_values($reportTypeCounts);
          }
          ?>

          <script>
            // Retrieve the report types and counts from PHP
            var reportTypes = <?php echo isset($reportTypes) ? json_encode($reportTypes) : '[]'; ?>;
            var reportCounts = <?php echo isset($reportCounts) ? json_encode($reportCounts) : '[]'; ?>;

            // Define an array of colors for differentiating report types
            var colors = ['rgba(75, 192, 192, 0.6)', 'rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)', 'rgba(255, 206, 86, 0.6)', 'rgba(153, 102, 255, 0.6)'];

            // Get the canvas element
            var ctx = document.getElementById('reportChart').getContext('2d');

            // Create the chart using Chart.js
            new Chart(ctx, {
              type: 'pie',
              data: {
                labels: reportTypes,
                datasets: [{
                  data: reportCounts,
                  backgroundColor: colors,
                  borderColor: 'rgba(255, 255, 255, 1)',
                  borderWidth: 1,
                }]
              },
              options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                  display: true,
                  position: 'right'
                },
                elements: {
                  arc: {
                    borderWidth: 0 // Remove border from chart slices
                  }
                },
                plugins: {
                  legend: {
                    labels: {
                      font: {
                        size: 10 // Adjust font size of legend labels
                      }
                    }
                  },
                  tooltip: {
                    bodyFont: {
                      size: 10 // Adjust font size of tooltip text
                    }
                  }
                }
              }
            });
          </script>
        </div>
      </form>
    </div>

    <script>
      function toggleNav() {
        var sidebar = document.getElementById("mySidebar");
        var main = document.getElementById("main");

        if (sidebar.style.width === "250px") {
          sidebar.style.width = "0";
          main.style.marginLeft = "0";
        } else {
          sidebar.style.width = "250px";
          main.style.marginLeft = "250px";
        }
      }

      function filterTable() {
        var filter = document.getElementById("filter-complaint-types").value; // Get the selected report type filter
        var table = document.getElementById("complaint-table"); // Get the table element

        for (var i = 1; i < table.rows.length; i++) {
          var reportTypeCell = table.rows[i].querySelector(".report-types"); // Get the cell containing the report type
          var reportTypeId = reportTypeCell.getAttribute("id").replace("report-type-", ""); // Extract the report ID

          if (filter === "all" || reportTypeCell.textContent === filter) {
            table.rows[i].style.display = ""; // Show the row
          } else {
            table.rows[i].style.display = "none"; // Hide the row
          }
        }
      }

      // Get the modal
      var modal = document.getElementById('id01');

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function (event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
    </script>



  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pzj7d/SvHLRN+RASnxlZ+p9bZI2n6sR9SNL9YI7g9uIhFxS1qBBtA3pQUijvIya/"
    crossorigin="anonymous"></script>

</body>

</html>