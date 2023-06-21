<?php
session_start();
include "db_conn.php";

// Function to get the total number of users based on user types
function getTotalUsersByRole($conn, $role)
{
   $query = "SELECT COUNT(*) AS total FROM users WHERE role = '$role'";
   $result = mysqli_query($conn, $query);
   $row = mysqli_fetch_assoc($result);
   return $row['total'];
}

if (isset($_SESSION['username']) && isset($_SESSION['id']) && $_SESSION['role'] == 'expert') {
   $expert_id = $_SESSION['id'];

   // Establish a database connection
   $host = "localhost"; // Hostname
   $username = "root"; // Database username
   $password = "p@ssw0rd"; // Database password
   $database = "my-db"; // Database name
   $connection = mysqli_connect($host, $username, $password, $database);

   // Check if the connection was successful
   if (!$connection) {
      die("Connection failed: " . mysqli_connect_error());
   }

   // Retrieve the expert's profile from the database
   $sql = "SELECT * FROM `experts` WHERE `expert_id` = $expert_id";
   $result = mysqli_query($connection, $sql);
?>

   <!DOCTYPE html>
   <html>
   <head>
      <title>FK-EduSearch Expertise - Profile</title>
      <style>
         @import url('css/display_profile_style.css');
      </style>
   </head>
   <body>
      <div class="container">
         <h1>FK-EduSearch Expertise - Profile</h1>
         <div class="navigation">
            <ul>
               <li><a href="dashboard.php">Home</a></li>
               <li><a href="display_profile.php">Display Profile</a></li>
               <li><a href="search.php">Assigned Posts</a></li>
               <li><a href="search.php">Status</a></li>
               <li><a href="search.php">Calculation</a></li>
               <li><a href="search.php">Report</a></li>
            </ul>
         </div>

         <?php
         if (mysqli_num_rows($result) > 0) {
            while ($profile = mysqli_fetch_assoc($result)) {
         ?>
               <h2><?php echo $profile['name']; ?></h2>
               <p><strong>Email:</strong> <?php echo $profile['email']; ?></p>
               <p><strong>Phone:</strong> <?php echo $profile['phone']; ?></p>
               <p><strong>Biography:</strong> <?php echo $profile['biography']; ?></p>
               <p><strong>Research Areas:</strong> <?php echo $profile['research_areas']; ?></p>
               <p><strong>Publications:</strong> <?php echo $profile['publications']; ?></p>
               <p><strong>Academic Status:</strong> <?php echo $profile['academic_status']; ?></p>
               <p><strong>CV:</strong> <a href="<?php echo $profile['cv_file']; ?>" target="_blank">Download CV</a></p>
               <p><strong>Social Media Accounts:</strong> <?php echo $profile['social_media_accounts']; ?></p>
               <p><a href="manage_profile.php?expert_id=<?php echo $profile['expert_id']; ?>" class="edit-button">Edit</a></p>
         <?php
            }
         } else {
            echo "Profile not found.";
         }

         // Close the database connection
         mysqli_close($connection);
         ?>
      </div>
   </body>
   </html>
<?php
} else {
   header("Location: index.php");
   exit();
}
?>
