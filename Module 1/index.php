<?php 
   session_start();
   if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) {   ?>
<!DOCTYPE html>
<html>
<head>
	<title>multi-user role-based-login-system</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
      <div class="container">
	     <div id="login">
               <img src="Assets/login.png" >
         </div>
      	<form action="php/check-login.php" method="post" >
      	      <h1>FK-Edu Search</h1>
      	      <?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
			  </div>
			  <?php } ?>
			  
		  <div class="mb-3">
		    <label for="username" 
		           class="form-label">User name</label>
		    <input type="text" 
		           class="form-control" 
		           name="username" 
		           id="username">
		  </div>
		  <div class="mb-3">
		    <label for="password" 
		           class="form-label">Password</label>
		    <input type="password" 
		           name="password" 
		           class="form-control" 
		           id="password">
		  </div>
		  <div class="mb-1">
		    <label class="form-label">Select User Type:</label>
		  </div>
		  <select class="form-select mb-3"
		          name="role" 
		          aria-label="Default select example">
			  <option selected value="user">User</option>
			  <option value="admin">Admin</option>
			  <option value="expert">Expert</option>
		  </select>
		  <div class="button-container">
		     <button type="submit" >Login</button>		          
		  </div>
		</form>
		<div class="footer">
          <a href="#">Help</a>
          <a href="#">Privacy</a>
          <a href="#">Settings</a>
          <p>&copy; 2023 Debug Group. All rights reserved.</p>
        </div>
      </div>
</body>
</html>
<?php }else if($_SESSION['role'] == 'admin') {
       header("Location: home.php");
       exit();}
	   else if($_SESSION['role'] == 'user') {
       header("Location: user_home.php");
       exit();}
	   else if($_SESSION['role'] == 'expert') {
       header("Location: expert_home.php");
       exit();
} ?>