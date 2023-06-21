<!-- navbar -->
<?php include '../Module 4/admin_nav.php'; ?>

<!-- content -->
<h1>Report Total</h1>

<table>
  <tr>
    <th>Period</th>
    <th>Issue</th>
    <th>Total</th>
  </tr>
  <?php
    // Assuming you have already established a database connection
    
    // Example query to retrieve data from the database
    $query = "SELECT issue, COUNT(*) AS total FROM your_table_name GROUP BY issue";
    $result = mysqli_query($connection, $query);
    
    // Loop through the query results and populate the table rows
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row['period'] . "</td>";
      echo "<td>" . $row['issue'] . "</td>";
      echo "<td>" . $row['total'] . "</td>";
      echo "</tr>";
    }
    
    // Close the database connection
    mysqli_close($connection);
  ?>
</table>
