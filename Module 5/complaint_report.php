<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
   <meta charset="utf-8">
   <title>FK-Edu Research</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
   <link rel="stylesheet" href="css/stylehome1.css">
   <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>

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


    /* Dropdown menu styles */
    .dropdown {
        position: relative;
    }

    .dropdown .toggle {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .dropdown .toggle i {
        margin-left: 5px;
    }

    .dropdown .sub-menu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: #ffffff;
        padding: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        z-index: 10;
    }

    .dropdown:hover .sub-menu {
        display: block;
    }

    .dropdown .sub-menu li {
        list-style: none;
        padding: 5px 0;
    }

    .dropdown .sub-menu li a {
        display: block;
        color: #333333;
        text-decoration: none;
    }

    .dropdown .sub-menu li a:hover {
        color: #000000;
        background-color: #f0f0f0;
    }
</style>

<body>
   <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
      <nav>
        <div class="nav-bar">
            <i class='bx bx-menu sidebarOpen' ></i>
            <span class="logo navLogo"><a href="#">FK-EduSearch</a></span>
            <div class="menu">
                <div class="logo-toggle">
                    <span class="logo"><a href="#">FK-Edu Search</a></span>
                    <i class='bx bx-x siderbarClose'></i>
                </div>
                <ul class="nav-links">
                    <li><a href="#">Home</a></li>
                    <li class="dropdown">
                    <a href="#" class="toggle">Complaint <i class='bx bx-chevron-down'></i></a>
                    <ul class="sub-menu">
                        <li><a href="complaint_data.php">Complaint Data</a></li>
                        <li><a href="complaint_calc.php">Complaint Calc</a></li>
                        <li><a href="complaint_report.php">Complaint Report</a></li>
                    </ul>
                </li>
                    <li><a href="#">Report</a></li>
                    <li><a href="#">Log Out</a></li> 
                </ul>
            </div>
            <div class="darkLight-searchBox">
                <div class="dark-light">
                    <i class='bx bx-moon moon'></i>
                    <i class='bx bx-sun sun'></i>
                </div>
                <div class="searchBox">
                   <div class="searchToggle">
                    <i class='bx bx-x cancel'></i>
                    <i class='bx bx-search search'></i>
                   </div>
                    <div class="search-field">
                        <input type="text" placeholder="Search...">
                        <i class='bx bx-search'></i>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <header class="header">
        <h1>COMPLAINT REPORT</h1>
      </header>

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

// Query to calculate the total complaints for each complaint type
$query = "SELECT Complaint_Type, COUNT(*) AS Total_Complaints FROM complaint GROUP BY Complaint_Type";
$result = mysqli_query($conn, $query);

$complaintData = array();
while ($row = mysqli_fetch_assoc($result)) {
    $complaintType = $row['Complaint_Type'];
    $totalComplaints = $row['Total_Complaints'];
    $complaintData[$complaintType] = $totalComplaints;
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pie Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="complaintChart"></canvas>

    <footer class="footer">
         <a href="#">Help</a>
         <a href="#">Privacy</a>
         <a href="#">Settings</a>
         <p>&copy; 2023 Debug Group. All rights reserved.</p>
      </footer>
   </div>

    <script>
        // Retrieve the complaint data from PHP
        var complaintData = <?php echo json_encode($complaintData); ?>;

        // Get the labels and data for the chart
        var labels = Object.keys(complaintData);
        var data = Object.values(complaintData);

// Generate the chart
var ctx = document.getElementById('complaintChart').getContext('2d');
new Chart(ctx, {
    type: 'pie',
    data: {
        labels: labels,
        datasets: [{
            data: data,
            backgroundColor: [
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(153, 102, 255, 0.7)',
            ],
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        legend: {
            display: true,
            position: 'bottom',
        },
        layout: {
            padding: {
                left: 400,
                right: 400,
                top: 50,
                bottom: 500
            }
        }
    }
});
    </script>
</body>
</html>