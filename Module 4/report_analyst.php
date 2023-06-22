<!-- navbar -->
<?php include '../Module 4/admin_nav.php'; ?>

<?php
// Step 1: Fetch the metrics data from the database
function fetchMetricsData() {
    // Fetch the necessary metrics data from the database
    // Store the data in $metricsData variable
    // You can customize this function based on your database structure and query methods
    // Here, we assume the metrics data is stored in an array with appropriate keys
    $metricsData = [
        'posts' => 250,
        'comments' => 500,
        'likes' => 1000,
        'engagement_rate' => 0.75,
        'retention_rate' => 0.85,
        'user_satisfaction' => 4.5,
    ];

    return $metricsData;
}

// Step 2: Display the metrics data using appropriate visual representations
function displayMetricsData() {
    // Fetch the metrics data
    $metricsData = fetchMetricsData();

    // Display the metrics using HTML and appropriate visual representations
    echo '<h2>Key Metrics</h2>';

    // Display numerical statistics
    echo '<div>';
    echo 'Number of Posts: ' . $metricsData['posts'] . '<br>';
    echo 'Number of Comments: ' . $metricsData['comments'] . '<br>';
    echo 'Number of Likes: ' . $metricsData['likes'] . '<br>';
    echo '</div>';

    // Display line chart for engagement rate
    echo '<div>';
    echo '<h3>Engagement Rate</h3>';
    echo '<canvas id="engagementRateChart"></canvas>';
    echo '</div>';

    // Display bar graph for retention rate
    echo '<div>';
    echo '<h3>Retention Rate</h3>';
    echo '<canvas id="retentionRateChart"></canvas>';
    echo '</div>';

    // Display numerical statistics for user satisfaction
    echo '<div>';
    echo '<h3>User Satisfaction</h3>';
    echo 'Average User Satisfaction: ' . $metricsData['user_satisfaction'] . '<br>';
    echo '</div>';

    // Include the JavaScript code for Chart.js
    echo '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';

    // JavaScript code to populate the chart data
    echo '<script>';
    echo 'var engagementRateData = {';
    echo 'labels: ["Week 1", "Week 2", "Week 3", "Week 4"],';
    echo 'datasets: [{';
    echo 'label: "Engagement Rate",';
    echo 'data: [0.6, 0.65, 0.72, 0.8],';
    echo 'backgroundColor: "rgba(75, 192, 192, 0.2)",';
    echo 'borderColor: "rgba(75, 192, 192, 1)",';
    echo 'borderWidth: 1';
    echo '}]};';

    echo 'var engagementRateCtx = document.getElementById("engagementRateChart").getContext("2d");';
    echo 'new Chart(engagementRateCtx, {';
    echo 'type: "line",';
    echo 'data: engagementRateData';
    echo '});';

    echo 'var retentionRateData = {';
    echo 'labels: ["Month 1", "Month 2", "Month 3"],';
    echo 'datasets: [{';
    echo 'label: "Retention Rate",';
    echo 'data: [0.9, 0.87, 0.82],';
    echo 'backgroundColor: "rgba(255, 99, 132, 0.2)",';
    echo 'borderColor: "rgba(255, 99, 132, 1)",';
    echo 'borderWidth: 1';
    echo '}]};';

    echo 'var retentionRateCtx = document.getElementById("retentionRateChart").getContext("2d");';
    echo 'new Chart(retentionRateCtx, {';
    echo 'type: "bar",';
    echo 'data: retentionRateData';
    echo '});';
    echo '</script>';
}

// Display the metrics data
displayMetricsData();
?>
