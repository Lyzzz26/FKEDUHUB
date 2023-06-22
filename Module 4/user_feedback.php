<!-- navbar -->
<?php include '../Module 4/admin_nav.php'; ?>

<!DOCTYPE html>
<html>

<head>
  <title>User Satisfaction Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .container {
      max-width: 500px;
      margin: 50px auto;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>User Satisfaction Form</h2>
    <p>Please take a moment to provide your feedback on your experience with our website.</p>
    <form action="submitFeedback.php" method="POST">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="User_Email" name="email" required>
      </div>
      <div class="form-group">
        <label for="satisfaction">Overall Satisfaction:</label>
        <select class="form-control" id="satisfaction" name="satisfaction">
          <option value="5">Excellent</option>
          <option value="4">Good</option>
          <option value="3">Neutral</option>
          <option value="2">Fair</option>
          <option value="1">Poor</option>
        </select>
      </div>
      <div class="form-group">
        <label for="additional">Additional Comments:</label>
        <textarea class="form-control" id="additional" name="additional" rows="5"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
