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

   if (isset($_SESSION['username']) && isset($_SESSION['id']) && $_SESSION['role'] == 'admin') {   ?>
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
      <body>
         <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
            <nav>
               <div class="nav-bar">
                  <i class='bx bx-menu sidebarOpen'></i>
                  <span class="logo navLogo"><a href="#">FK-EduSearch</a></span>
                  <div class="menu">
                     <div class="logo-toggle">
                        <span class="logo"><a href="#">FK-Edu Search</a></span>
                        <i class='bx bx-x sidebarClose'></i>
                     </div>
                     <ul class="nav-links">
                        <li><a href="#">Home</a></li>
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

            <!-- For Admin -->
            <div class="card" style="width: 14rem;">
               <img src="img/admin-default.png" class="card-img-top" alt="admin image">
               <div class="card-body text-center">
                  <h5 class="card-title">
                     <?=$_SESSION['name']?>
                  </h5>
                  <a href="logout.php" class="btn btn-dark">Logout</a>
               </div>
            </div>
            <div class="p-3">
               <?php 
               $totalAdmins = getTotalUsersByRole($conn, 'admin');
               $totalUsers = getTotalUsersByRole($conn, 'user');
               $totalExperts = getTotalUsersByRole($conn, 'expert');
               ?>
               <div class="row">
                  <div class="col-md-4">
                     <div class="user-box">
                        <h4>Total Admins</h4>
                        <p><?=$totalAdmins?></p>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="user-box">
                        <h4>Total Users</h4>
                        <p><?=$totalUsers?></p>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="user-box">
                        <h4>Total Experts</h4>
                        <p><?=$totalExperts?></p>
                     </div>
                  </div>
               </div>
               <?php 
               $query = "SELECT * FROM users";
               $res = mysqli_query($conn, $query);
               if (mysqli_num_rows($res) > 0) {?>
                  <table class="table" style="width: 32rem;">
                     <thead>
                        <tr>
                           <th scope="col">#</th>
                           <th scope="col">Name</th>
                           <th scope="col">User name</th>
                           <th scope="col">Role</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php 
                        $i = 1;
                        while ($rows = mysqli_fetch_assoc($res)) {?>
                           <tr>
                              <th scope="row"><?=$i?></th>
                              <td><?=$rows['name']?></td>
                              <td><?=$rows['username']?></td>
                              <td><?=$rows['role']?></td>
                           </tr>
                           <?php $i++; }?>
                     </tbody>
                  </table>
               <?php }?>
            </div>
         </div>
      <script>
      const body = document.querySelector("body"),
      nav = document.querySelector("nav"),
      modeToggle = document.querySelector(".dark-light"),
      searchToggle = document.querySelector(".searchToggle"),
      sidebarOpen = document.querySelector(".sidebarOpen"),
      siderbarClose = document.querySelector(".siderbarClose");
      let getMode = localStorage.getItem("mode");
          if(getMode && getMode === "dark-mode"){
            body.classList.add("dark");
          }
    // js code to toggle dark and light mode
      modeToggle.addEventListener("click" , () =>{
        modeToggle.classList.toggle("active");
        body.classList.toggle("dark");
        // js code to keep user selected mode even page refresh or file reopen
        if(!body.classList.contains("dark")){
            localStorage.setItem("mode" , "light-mode");
        }else{
            localStorage.setItem("mode" , "dark-mode");
        }
      });
     // js code to toggle search box
        searchToggle.addEventListener("click" , () =>{
        searchToggle.classList.toggle("active");
      });
 
      
    //   js code to toggle sidebar
      sidebarOpen.addEventListener("click" , () =>{
      nav.classList.add("active");
       });
      body.addEventListener("click" , e =>{
      let clickedElm = e.target;
      if(!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")){
      nav.classList.remove("active");
      }
    });
       </script>        
		 <footer class="footer">
            <a href="#">Help</a>
            <a href="#">Privacy</a>
            <a href="#">Settings</a>
            <p>&copy; 2023 Debug Group. All rights reserved.</p>
         </footer>
      </body>
      </html>
   <?php } else {
      header("Location: index.php");
      exit();
   }
?>
