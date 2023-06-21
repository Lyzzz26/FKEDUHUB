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

footer {
    background-color: #333;
    color: #fff;
    padding: 10px;
    position: fixed;
    bottom: 0;
    width: 100%;
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

table {
    width: 100%;
    max-height: 500px;
    border-collapse: collapse;
    overflow-y: auto; 
}

th, td {
    padding: 10px 20px; 
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #f5f5f5;
}

td:last-child {
    text-align: center;
}

footer {
    background-color: #333;
    color: #fff;
    padding: 10px;
    width: 100%;
    clear: both;
}

.filter-dropdown {
    margin-bottom: 10px;
    margin-left: 10px;
}

.filter-dropdown select {
    background-color: #ccc; /* Light grey color */
    border: none;
    color: black;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    cursor: pointer;
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
                <a href="#" class="dropbtn">Complaint</a>
                <div class="dropdown-content">
                    <a href="complaint_list.php">Complaint List</a>
                    <a href="complaint_form.php">Complaint Dash</a>
                    <a href="complaint_calc.php">Complaint Calc</a>
                    <a href="complaint_report.php">Complaint Report</a>
                </div>
            </li>
            <li><a href="#">Log out</a></li>
        </ul>
    </nav>

    <header class="header">
        <h1>COMPLAINT DASHBOARD</h1>
      </header>
      <body>
    <h1>Complaint Dashboard</h1>

    <div class="complaint-container">
        <?php
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'fkedu';

        $conn = mysqli_connect($host, $username, $password, $database);
        if (!$conn) {
            die('Database connection error: ' . mysqli_connect_error());
        }

        $query = "SELECT * FROM complaint";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $userID = $row['User_ID'];
                $complaintType = $row['Complaint_Type'];
                $complaintDescription = $row['Complaint_Description'];

                echo "<p><strong>User ID:</strong> $userID</p>";
                echo "<p><strong>Complaint Type:</strong> $complaintType</p>";
                echo "<p><strong>Complaint Description:</strong> $complaintDescription</p>";
                echo "<hr>";
            }
        } else {
            echo "No complaints found.";
        }

        mysqli_close($conn);
        ?>
    </div>

    <h2>View Submitted Data</h2>
    <form action="complaint_dashboard.php" method="POST">
        <label for="user_ID">User ID:</label>
        <input type="text" id="user_ID" name="user_ID" placeholder="Enter User ID" required>
        <input type="submit" value="View">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $userID = $_POST['user_ID'];

        $conn = mysqli_connect($host, $username, $password, $database);
        if (!$conn) {
            die('Database connection error: ' . mysqli_connect_error());
        }

        $query = "SELECT * FROM complaint WHERE User_ID = '$userID'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<h2>Submitted Data</h2>";
            echo "<div class='complaint-container'>";
            while ($row = mysqli_fetch_assoc($result)) {
                $complaintType = $row['Complaint_Type'];
                $complaintDescription = $row['Complaint_Description'];

                echo "<p><strong>User ID:</strong> $userID</p>";
                echo "<p><strong>Complaint Type:</strong> $complaintType</p>";
                echo "<p><strong>Complaint Description:</strong> $complaintDescription</p>";
                echo "<hr>";
            }
            echo "</div>";
        } else {
            echo "<p>No complaints found for User ID: $userID.</p>";
        }

        mysqli_close($conn);
    }
    ?>
</body>
</html>