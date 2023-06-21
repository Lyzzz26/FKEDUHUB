<?php
session_start();
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student Edit</title>
</head>
<body style="background-color:#dff8ef">
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User Edit 
                            <a href="index2.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM users WHERE id='$id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $users = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $users['id']; ?>">

                                    <div class="mb-3">
                                        <label>Username</label>
                                        <input type="text" name="username" value="<?=$users['username'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>User Full Name</label>
                                        <input type="name" name="name" value="<?=$users['name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>User Email</label>
                                        <input type="email" name="email" value="<?=$users['email'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                    <label for="role">Role</label>
                                        <select name="role" class="form-select" id="role" required>
                                            <option value="" disabled>Select Role</option>
                                            <option value="admin" <?= ($users['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                                            <option value="expert" <?= ($users['role'] == 'expert') ? 'selected' : ''; ?>>Expert</option>
                                            <option value="user" <?= ($users['role'] == 'user') ? 'selected' : ''; ?>>User</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_user" class="btn btn-primary">
                                            Update User
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>