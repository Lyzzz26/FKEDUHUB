<!DOCTYPE html>
<html>
<head>
    <title>Complaint List</title>     
</head>

<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}
header {
    background-color: #66CDAA;
    color: #fff;
    padding: 10px;
}
nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}
nav li {
    float: left;
}
nav li a, .dropdown-content a {
    display: inline-block;
    color: #fff;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}
nav li a:hover, .dropdown:hover .dropdown-content a {
    background-color: #4CAF50;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}
.dropdown:hover .dropdown-content {
    display: block;
}
.content {
    margin: 20px;
}

/* Updated styles for dropdown menu */
.dropdown-content a {
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    background-color: #f9f9f9;
    border-bottom: 1px solid #ddd;
}

.dropdown-content a:hover {
    background-color: #4CAF50;
    color: white;
}

/* Specific styles for menu items */
.dropdown-content a:nth-child(1):hover {
    background-color: #808080;
}

.dropdown-content a:nth-child(2):hover {
    background-color: #808080;
}

.dropdown-content a:nth-child(3):hover {
    background-color: #808080;
}

.dropdown-content a:nth-child(4):hover {
    background-color: #808080;
}

.header {
  background-color: #66CDAA;
  padding: 20px;
  text-align: center;
  margin-bottom: 20px;
}

.header h1 {
  color: black;
  margin: 0;
}

footer {
    background-color: #333;
    color: #fff;
    padding: 10px;
    width: 100%;
    clear: both;
}

table {
    border-collapse: collapse;
    width: 100%;
}
th, td {
    text-align: left;
    padding: 8px;
}
th {
    background-color: #f2f2f2;
    color: black;
}
tr:nth-child(even) {
    background-color: #f2f2f2;
}
.filter-buttons {
    text-align: center;
    margin-bottom: 20px;
}
.filter-buttons button {
    margin: 0 5px;
}

</style>

<body>
    <header>
        <h1>FK-Edu Research</h1>
    </header>

    <nav>
        <ul>
            <li><a href="#">HOME</a></li>
            <li class="dropdown">
                <a href="complaint_homepage.php" class="dropbtn">Complaint</a>
                <div class="dropdown-content">
                    <a href="complaint_list.php">Complaint List</a>
                    <a href="complaint_calc.php">Complaint Calc</a>
                    <a href="complaint_report.php">Complaint Report</a>
                </div>
            </li>
            <li><a href="#">Report</a></li>
            <li><a href="#">Log out</a></li>
        </ul>
    </nav>

    <header class="header">
        <h1>TOTAL COMPLAINT</h1>
      </header>

      <label for="filter-type">Filter By:</label>
    <select id="filter-type" onchange="filterReport()">
        <option value="day">Day</option>
        <option value="week">Week</option>
        <option value="month">Month</option>
    </select>

    <table id="report-table">
        <tr>
            <th>Complaint</th>
            <th>Total Reports</th>
        </tr>
        <?php
        include "db_conn.php";

        // Fetch the total report based on the selected filter
        $filter = isset($_GET['filter']) ? $_GET['filter'] : 'day'; // Default filter is day

        $sql = "";

        // Modify the SQL query based on the selected filter
        switch ($filter) {
            case 'day':
                $sql = "SELECT Complaint_Type, COUNT(*) as TotalReports FROM complaints WHERE DATE(Complaint_Date) = CURDATE() GROUP BY Complaint_Type";
                break;
            case 'week':
                $sql = "SELECT Complaint_Type, COUNT(*) as TotalReports FROM complaints WHERE YEARWEEK(Complaint_Date) = YEARWEEK(CURDATE()) GROUP BY Complaint_Type";
                break;
            case 'month':
                $sql = "SELECT Complaint_Type, COUNT(*) as TotalReports FROM complaints WHERE MONTH(Complaint_Date) = MONTH(CURDATE()) AND YEAR(Complaint_Date) = YEAR(CURDATE()) GROUP BY Complaint_Type";
                break;
        }

        $result = mysqli_query($conn, $sql);

        // Loop through the result and populate the table rows
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['Complaint_Type'] . "</td>";
            echo "<td>" . $row['TotalReports'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <footer>
        <ul>
            <li><a href="#">Help</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Setting</a></li>
        </ul>
        <p>&copy; <?php echo date('Y'); ?> FK-Edu Search. All rights reserved.</p>
    </footer>
</body>

<script>
    function filterReport() {
        var filterType = document.getElementById("filter-type").value;
        var url = window.location.href.split('?')[0] + "?filter=" + filterType;
        window.location.href = url;
    }
</script>
</html>