<!-- navbar -->
<?php include '../Module 4/admin_nav.php'; ?>

<!-- content -->
<h1>Data Analyst & User Activity</h1>

<!-- Include the Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Create a canvas element for the pie chart -->
<canvas id="pieChart" width="400" height="400"></canvas>

<!-- Create a canvas element for the bar chart -->
<canvas id="barChart" width="400" height="400"></canvas>

<?php
// Include the database connection file
include 'db_conn.php';

// Query the database to retrieve the relevant data
$sql = "SELECT post, comments, likes, engagement_rate, retention_rate, user_satisfaction FROM your_table_name";
$result = mysqli_query($conn, $sql);

// Initialize arrays to store data for the charts
$posts = [];
$comments = [];
$likes = [];

// Loop through each row and retrieve data for the charts
while ($row = mysqli_fetch_assoc($result)) {
    $posts[] = $row['post'];
    $comments[] = $row['comments'];
    $likes[] = $row['likes'];
}

// Close the database connection
mysqli_close($conn);
?>

<script>
// Retrieve data from PHP variables
var postsData = <?php echo json_encode($posts); ?>;
var commentsData = <?php echo json_encode($comments); ?>;
var likesData = <?php echo json_encode($likes); ?>;

// Create a pie chart
var pieCtx = document.getElementById('pieChart').getContext('2d');
var pieChart = new Chart(pieCtx, {
    type: 'pie',
    data: {
        labels: ['Posts', 'Comments', 'Likes'],
        datasets: [{
            data: [postsData.length, commentsData.length, likesData.length],
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
            hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
        }]
    },
    options: {
        responsive: true
    }
});

// Create a bar chart
var barCtx = document.getElementById('barChart').getContext('2d');
var barChart = new Chart(barCtx, {
    type: 'bar',
    data: {
        labels: ['Posts', 'Comments', 'Likes'],
        datasets: [{
            label: 'Count',
            data: [postsData.length, commentsData.length, likesData.length],
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
            hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
