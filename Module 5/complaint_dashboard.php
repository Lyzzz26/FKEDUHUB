<!DOCTYPE html>
<html>
<head>
    <title>Complaint Homepage</title>
</head>

<style>
body {
  font-family: Arial, sans-serif;
}
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
    width: 100%;
    clear: both;
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

.plain-form {
  max-width: 90%;
  margin: 0 auto;
  padding: 20px;
  background-color: #f4f4f4;
  margin-bottom: 90px;
  overflow-y: auto; 
}

label {
  display: block;
  margin-bottom: 10px;
}

input[type="text"],
input[type="Complaint_Type"],
textarea {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-bottom: 10px;
}

textarea {
    height: 150px;
}

input[type="submit"] {
  background-color: #4caf50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

input[type="reset"] {
  background-color: #4caf50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="reset"]:hover {
  background-color: #45a049;
}

select {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-bottom: 10px;
}
</style>

<body>

    <header>
        <h1>FK-Edu Research</h1>
    </header>

    <nav>
        <ul>
            <li><a href="#">HOME</a></li>
            <li>
            <a href="complaint_dashboard.php">Complaint</a>
            </li>
            <li><a href="#">Log out</a></li>
        </ul>
    </nav>


    <header class="header">
        <h1>COMPLAINT MANAGEMENT</h1>
      </header>


    <form class="plain-form" action="process_form.php" method="POST">
    <label for="user_ID">USER ID:</label>
    <input type="text" id="user_ID" name="user_ID" placeholder="Enter Your User ID">

    <label for="Complaint_Type">COMPLAINT TYPE:</label>
    <select id="Complaint_Type" name="Complaint_Type">
        <option value="unsatisfied">Unsatisfied Expert's Feedback</option>
        <option value="research-area">Assigned Research Area</option>
        <option value="academic-status">Wrong Academic Status</option>
        <option value="other">Others...</option>
      </select>
      <div id="other-Complaint_Type-container" style="display: none;">
        <label for="other-Complaint_Type">Please specify:</label>
        <input type="text" id="other-Complaint_Type" name="other-Complaint_Type" placeholder="Enter other complaint type">
      </div>
    

    <label for="Complaint_Description">COMPLAINT</label>
    <textarea id="Complaint_Description" name="Complaint_Description" placeholder="Enter your Complaint_Description"></textarea>
    <input type="submit" value="Submit">
    <input type="reset" value="Reset">
  </form>

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
        // JavaScript code here
        var complaintTypeSelect = document.getElementById('Complaint_Type');
        var otherContainer = document.getElementById('other-Complaint_Type-container');

        complaintTypeSelect.addEventListener('change', function() {
            if (complaintTypeSelect.value === 'other') {
                otherContainer.style.display = 'block';
            } else {
                otherContainer.style.display = 'none';
            }
        });
    </script>
</html>