<!-- navbar -->
<?php include '../Module 4/admin_nav.php'; ?>

<!-- content -->
<h1>REPORT LIST</h1>

<!-- Search label, input, and button -->
<div style="display: flex;">
  <div style="flex-grow: 1;">
    <label for="search-input" style="display: inline-block; margin-right: 5px;">Find:</label>
    <input type="text" id="search-input" placeholder="Search by User/Report ID" style="display: inline-block; margin-right: 5px;">
    <button id="search-button" style="display: inline-block; background-color: #f8c1c1; color: white; border: none; padding: 8px 16px; font-size: 16px; border-radius: 20px; cursor: pointer; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); transition: background-color 0.3s ease;">Search</button>
  </div>
  <div>
    <label for="sort-select" style="display: inline-block; margin-left: 400px;">Sort by:</label>
    <select id="sort-select" style="display: inline-block;">
      <option value="day">Day</option>
      <option value="week">Week</option>
      <option value="month">Month</option>
    </select>
  </div>
</div>

<table id="report-table">
  <thead>
    <tr>
      <th>No.</th>
      <th>Report ID</th>
      <th>User ID</th>
      <th>Name</th>
      <th>Date and Time</th>
      <th>Issue</th>
      <th>Action</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // Include the database connection code
    include 'db_conn.php';

    // Fetch report data from the database
    $sql = "SELECT * FROM reports";
    $result = mysqli_query($conn, $sql);

    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
      // Loop through each row and display the data in the table
      $row_number = 1;
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row_number . "</td>";
        echo "<td>" . $row['report_id'] . "</td>";
        echo "<td>" . $row['user_id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['date_and_time'] . "</td>";
        echo "<td>" . $row['issue'] . "</td>";
        echo "<td>";
        echo "<button class='action-btn warning' title='Give Warning'><i class='fas fa-exclamation-triangle'></i></button>";
        echo "<button class='action-btn remove' title='Remove'><i class='fas fa-trash'></i></button>";
        echo "</td>";
        echo "<td>";
        echo "<select class='status-select'>";
        echo "<option value='investigation'>In Investigation</option>";
        echo "<option value='hold'>On Hold</option>";
        echo "<option value='Done'>Done</option>";
        echo "</select>";
        echo "</td>";
        echo "</tr>";
        $row_number++;
      }
    } else {
      // If no rows were returned, display a message
      echo "<tr><td colspan='8'>No reports found.</td></tr>";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
  </tbody>
</table>

<!-- CSS -->
<style>
  /* Add your custom CSS styles here */
  #report-table {
    width: 100%;
    border-collapse: collapse;
  }

  #report-table th,
  #report-table td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  #report-table th {
    background-color: #f2f2f2;
    font-weight: bold;
  }

  .action-btn {
    padding: 4px;
    border: none;
    background: none;
    cursor: pointer;
  }

  .action-btn.warning {
    color: orange;
  }

  .action-btn.remove {
    color: red;
  }

  .status-select {
    padding: 4px;
  }

  #search-button {
    background-color: #a4d8d8;
    color: black;
    border: none;
    padding: 8px 16px;
    font-size: 16px;
    border-radius: 20px;
    cursor: pointer;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease;
  }

  #search-button:hover {
    background-color: #ff8989;
  }
</style>

<!-- JavaScript -->
<script>
  // Add your custom JavaScript code here
  const searchInput = document.getElementById('search-input');
  const reportTable = document.getElementById('report-table');
  const searchButton = document.getElementById('search-button');
  const sortSelect = document.getElementById('sort-select');

  searchButton.addEventListener('click', function() {
    performSearch();
  });

  searchInput.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
      performSearch();
    }
  });

  sortSelect.addEventListener('change', function() {
    const sortValue = this.value.toLowerCase();
    // Perform sorting based on the selected value (day, week, month)
    sortReports(sortValue);
  });

  function performSearch() {
    const searchValue = searchInput.value.toLowerCase();

    // Loop through each row and hide/show based on search value
    for (let i = 1; i < reportTable.rows.length; i++) {
      const row = reportTable.rows[i];
      const userId = row.cells[2].innerText.toLowerCase();
      const reportId = row.cells[1].innerText.toLowerCase();

      if (userId.includes(searchValue) || reportId.includes(searchValue)) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    }
  }

  function sortReports(sortValue) {
    // Logic for sorting the reports based on the selected value
    // Implementation depends on your requirements and data structure
    // You can modify this function to perform the appropriate sorting operation
    console.log('Sorting reports by:', sortValue);
  }
</script>
