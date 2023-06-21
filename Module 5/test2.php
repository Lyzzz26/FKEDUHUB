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

// Handle filter selection
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'day';

// Set the date range based on the filter selection
if ($filter === 'day') {
    $startDate = date('Y-m-d');
    $endDate = date('Y-m-d');
} elseif ($filter === 'week') {
    $startDate = date('Y-m-d', strtotime('-1 week'));
    $endDate = date('Y-m-d');
} elseif ($filter === 'month') {
    $startDate = date('Y-m-d', strtotime('-1 month'));
    $endDate = date('Y-m-d');
} else {
    $startDate = '';
    $endDate = '';
}

// Prepare the query to calculate the total complaints by type
$query = "SELECT Complaint_Type, COUNT(*) AS TotalComplaints FROM complaint 
          WHERE Complaint_Date >= '$startDate' AND Complaint_Date <= '$endDate'
          GROUP BY Complaint_Type";

// Execute the query
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Complaint Calculation</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
    transition: all 0.4s ease;;
}
/* ===== Colours ===== */
:root{
    --body-color: #dff8ef;
    --nav-color: #66CDAA;
    --side-nav: #010718;
    --text-color: #FFF;
    --search-bar: #F2F2F2;
    --search-text: #010718;
}
body{
    height: 100vh;
    background-color: var(--body-color);
	padding-top: 70px;
}
body.dark{
    --body-color: #272e2b;
    --nav-color: #242526;
    --side-nav: #242526;
    --text-color: #fff;
    --search-bar: #242526;
}
nav{
    position: fixed;
    top: 0;
    left: 0;
    height: 70px;
    width: 100%;
    background-color: var(--nav-color);
    z-index: 100;
}
body.dark nav{
    border: 1px solid #393838;
}
nav .nav-bar{
    position: relative;
    height: 100%;
    max-width: 1000px;
    width: 100%;
    background-color: var(--nav-color);
    margin: 0 auto;
    padding: 0 30px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
nav .nav-bar .sidebarOpen{
    color: var(--text-color);
    font-size: 25px;
    padding: 5px;
    cursor: pointer;
    display: none;
}
nav .nav-bar .logo a{
    font-size: 25px;
    font-weight: 500;
    color: var(--text-color);
    text-decoration: none;
}
.menu .logo-toggle{
    display: none;
}
.nav-bar .nav-links{
    display: flex;
    align-items: center;
}
.nav-bar .nav-links li{
    margin: 0 5px;
    list-style: none;
}
.nav-links li a{
    position: relative;
    font-size: 17px;
    font-weight: 400;
    color: var(--text-color);
    text-decoration: none;
    padding: 10px;
}
.nav-links li a::before{
    content: '';
    position: absolute;
    left: 50%;
    bottom: 0;
    transform: translateX(-50%);
    height: 6px;
    width: 6px;
    border-radius: 50%;
    background-color: var(--text-color);
    opacity: 0;
    transition: all 0.3s ease;
}
.nav-links li:hover a::before{
    opacity: 1;
}
.nav-bar .darkLight-searchBox{
    display: flex;
    align-items: center;
}
.darkLight-searchBox .dark-light,
.darkLight-searchBox .searchToggle{
    height: 40px;
    width: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 5px;
}
.dark-light i,
.searchToggle i{
    position: absolute;
    color: var(--text-color);
    font-size: 22px;
    cursor: pointer;
    transition: all 0.3s ease;
}
.dark-light i.sun{
    opacity: 0;
    pointer-events: none;
}
.dark-light.active i.sun{
    opacity: 1;
    pointer-events: auto;
}
.dark-light.active i.moon{
    opacity: 0;
    pointer-events: none;
}
.searchToggle i.cancel{
    opacity: 0;
    pointer-events: none;
}
.searchToggle.active i.cancel{
    opacity: 1;
    pointer-events: auto;
}
.searchToggle.active i.search{
    opacity: 0;
    pointer-events: none;
}
.searchBox{
    position: relative;
}
.searchBox .search-field{
    position: absolute;
    bottom: -85px;
    right: 5px;
    height: 50px;
    width: 300px;
    display: flex;
    align-items: center;
    background-color: var(--nav-color);
    padding: 3px;
    border-radius: 6px;
    box-shadow: 0 5px 5px rgba(0, 0, 0, 0.1);
    opacity: 0;
    pointer-events: none;
    transition: all 0.3s ease;
}
.searchToggle.active ~ .search-field{
    bottom: -74px;
    opacity: 1;
    pointer-events: auto;
}
.search-field::before{
    content: '';
    position: absolute;
    right: 14px;
    top: -4px;
    height: 12px;
    width: 12px;
    background-color: var(--nav-color);
    transform: rotate(-45deg);
    z-index: -1;
}
.search-field input{
    height: 100%;
    width: 100%;
    padding: 0 45px 0 15px;
    outline: none;
    border: none;
    border-radius: 4px;
    font-size: 14px;
    font-weight: 400;
    color: var(--search-text);
    background-color: var(--search-bar);
}
body.dark .search-field input{
    color: var(--text-color);
}
.search-field i{
    position: absolute;
    color: var(--nav-color);
    right: 15px;
    font-size: 22px;
    cursor: pointer;
}
body.dark .search-field i{
    color: var(--text-color);
}
@media (max-width: 790px) {
    nav .nav-bar .sidebarOpen{
        display: block;
    }
    .menu{
        position: fixed;
        height: 100%;
        width: 320px;
        left: -100%;
        top: 0;
        padding: 20px;
        background-color: var(--side-nav);
        z-index: 100;
        transition: all 0.4s ease;
    }
    nav.active .menu{
        left: -0%;
    }
    nav.active .nav-bar .navLogo a{
        opacity: 0;
        transition: all 0.3s ease;
    }
    .menu .logo-toggle{
        display: block;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .logo-toggle .siderbarClose{
        color: var(--text-color);
        font-size: 24px;
        cursor: pointer;
    }
    .nav-bar .nav-links{
        flex-direction: column;
        padding-top: 30px;
    }
    .nav-links li a{
        display: block;
        margin-top: 20px;
    }
}


.container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-start;
  padding: 0;
}

footer {
  background-color: var(--nav-color);
  color: var(--text-color);
  padding: 10px;
  bottom: 0;
  width: 100%;
  text-align: center;
  text-decoration: none;
}

footer.dark {
  background-color: var(--nav-color);
  color: var(--text-color);
}

footer a {
  text-decoration: none;
  color: var(--text-color);
}


.row {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 10px;
  margin: 20px 0;
}

.col-md-4 {
  flex-basis: 100%;
  max-width: 100%;
}

@media (min-width: 768px) {
  .col-md-4 {
    flex-basis: calc(50% - 10px);
    max-width: calc(50% - 10px);
  }
}

@media (min-width: 992px) {
  .col-md-4 {
    flex-basis: calc(25% - 10px);
    max-width: calc(25% - 10px);
  }
}
.col-md-4:nth-child(1) {
  background-color: #2962ff;
  border-radius: 5px;
}

.col-md-4:nth-child(2) {
  background-color: #ff6d00;
  border-radius: 5px;
}

.col-md-4:nth-child(3) {
  background-color: #2e7d32;
  border-radius: 5px;
}



.header {
  background-color: #66CDAA;
  padding: 20px;
  text-align: center;
  margin-bottom: 20px;
  margin-top: none;
  width: 100%;
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
</head>
<body>
<header class="header">
        <h1>COMPLAINT CALCULATION</h1>
      </header>

    <div class="filter-container">
        <label for="filter">Filter by:</label>
        <select id="filter" name="filter" onchange="updateFilter()">
            <option value="day" <?= $filter === 'day' ? 'selected' : '' ?>>Day</option>
            <option value="week" <?= $filter === 'week' ? 'selected' : '' ?>>Week</option>
            <option value="month" <?= $filter === 'month' ? 'selected' : '' ?>>Month</option>
        </select>
    </div>

    <table>
        <tr>
            <th>Complaint Type</th>
            <th>Total Complaints</th>
        </tr>
        <?php
        // Display the complaint calculation results
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $complaintType = $row['Complaint_Type'];
                $totalComplaints = $row['TotalComplaints'];
                echo "<tr>";
                echo "<td>$complaintType</td>";
                echo "<td>$totalComplaints</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No complaints found.</td></tr>";
        }
        ?>
    </table>

    <script>
        // Function to update the filter selection
        function updateFilter() {
            var filter = document.getElementById('filter').value;
            window.location.href = 'complaint_calc.php?filter=' + filter;
        }
    </script>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>