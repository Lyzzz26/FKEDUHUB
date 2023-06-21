<?php
// Include the database connection file
require 'dbcon.php';

// Fetch user role data from the database, excluding the admin role
$userRoles = [];
$query = "SELECT role, COUNT(*) AS count FROM users WHERE role IN ('user', 'expert') GROUP BY role";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $role = $row['role'];
    $count = $row['count'];
    $userRoles[$role] = $count;
}

// Fetch vulnerability reports from the database
$reports = [];
$query = "SELECT id, report_type, report_description, created_at FROM reports";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $reports[] = $row;
}

// Calculate the total number of users and experts
$totalUsers = array_sum($userRoles);

// Close the database connection
mysqli_close($conn);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/stylesdb.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
        <nav>
            <!-- Navigation code -->
            <div class="nav-bar">
                <i class='bx bx-menu sidebarOpen'></i>
                <span class="logo navLogo"><a href="#">FK-EduSearch</a></span>
                <div class="menu">
                    <div class="logo-toggle">
                        <span class="logo"><a href="#">FK-Edu Search</a></span>
                        <i class='bx bx-x sidebarClose'></i>
                    </div>
                    <ul class="nav-links">
                        <li><a href="home.php">Home</a></li>
                        <li><a href="index2.php">Manage User</a></li>
                        <li><a href="dashboard.php">Report</a></li>
                        <li><a href="logout.php">Log Out</a></li> 
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
    <main>
        <div class="container">
            <h1>Admin Dashboard</h1>

            <h2>User Role Distribution</h2>
            <div class="chart">
                <canvas id="userRoleChart"></canvas>
            </div>
			<h2>Vulnerability Reports</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Report Type</th>
                        <th>Report Description</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reports as $report) : ?>
                        <tr>
                            <td><?php echo $report['id']; ?></td>
                            <td><?php echo $report['report_type']; ?></td>
                            <td><?php echo $report['report_description']; ?></td>
                            <td><?php echo $report['created_at']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
			<div class="print-button">
                <button onclick="window.print()">Print</button>
            </div>
        </div>
     </main>
         <footer>
         <div class="container">
          <div class="footer-links">
            <a href="#">Help</a>
            <a href="#">Privacy</a>
            <a href="#">Settings</a>
         </div>
         <p>&copy; 2023 Your Company. All rights reserved.</p>
        </div>
       </footer>


        <script>
// Create User Role Chart with users and experts only
    var totalUsers = <?= $totalUsers ?>;
    var userRoles = {
        labels: <?= json_encode(array_keys($userRoles)) ?>,
        datasets: [{
            data: <?= json_encode(array_values($userRoles)) ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1
        }]
    };

            var ctx = document.getElementById('userRoleChart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: userRoles,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                        },
                        tooltip: {
                            callbacks: {
                                label: function (context) {
                                    var label = context.label || '';
                                    var value = context.raw || '';
                                    var userCount = context.dataset.data[context.dataIndex];
                                    var userPercentage = ((userCount / totalUsers) * 100).toFixed(2);
                                    return label + ': ' + value + ' (' + userPercentage + '% of users)';
                                }
                            }
                        }
                    }
                }
            });

            const body = document.querySelector("body"),
                nav = document.querySelector("nav"),
                modeToggle = document.querySelector(".dark-light"),
                searchToggle = document.querySelector(".searchToggle"),
                sidebarOpen = document.querySelector(".sidebarOpen"),
                sidebarClose = document.querySelector(".sidebarClose");

            let getMode = localStorage.getItem("mode");
            if (getMode && getMode === "dark-mode") {
                body.classList.add("dark");
            }

            // js code to toggle dark and light mode
            modeToggle.addEventListener("click", () => {
                modeToggle.classList.toggle("active");
                body.classList.toggle("dark");
                // js code to keep user selected mode even page refresh or file reopen
                if (!body.classList.contains("dark")) {
                    localStorage.setItem("mode", "light-mode");
                } else {
                    localStorage.setItem("mode", "dark-mode");
                }
            });

            // js code to toggle search box
            searchToggle.addEventListener("click", () => {
                searchToggle.classList.toggle("active");
            });

            // js code to toggle sidebar
            sidebarOpen.addEventListener("click", () => {
                nav.classList.add("active");
            });
            body.addEventListener("click", e => {
                let clickedElm = e.target;
                if (!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")) {
                    nav.classList.remove("active");
                }
            });
			

        </script>
    </body>
</html>
