<?php
    
      session_start();
    if (isset($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];
        unset($_SESSION['errors']);
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="assets/css/login.css" rel="stylesheet">
  <link href="layout/styles/form.css" rel="stylesheet" type="text/css" />
  
</head>
<body>
    <div class="login-wrapper">
        <div class="table">
            <div class="table-cell">
                <div class="login-box">
                    <div class="login-header">
                        <h2>DONNER LOGIN</h2>
                    </div>
                    <div class="login-body">
                        <form action="submit/donner-login-submit.php" method="POST">

                        <?php 
                                if (isset($message['success_message'])) {
                                    echo '<div class="alert alert-success " role="alert">'.$message['success_message'].'</div>';
                                }
                                if (isset($message['error_message'])) {
                                    echo '<div class="alert alert-danger">'.$message['error_message'].'</div>';
                                }
                                ?>
                              
                            <div class="form-group">
                                <label for="">Email or Username</label>
                                <input type="text" name="email" class="form-control" placeholder="Enter email or username">
                                <span class="text-danger">
                                    <?php 
                                        if(isset($errors['username'])) {
                                            echo $errors['username'];
                                        }
                                    ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter password">
                                <span class="text-danger">
                                    <?php                                        
                                        if(isset($errors['password'])) {
                                            echo $errors['password'];
                                        }
                                    ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="login_submit" class="login-btn" value="LOGIN">
                            </div>
                            <div class="form-group"  >
                                
                                <a href="user-register.php" class="btn btn-primary" >New Donner Registration</a>
                                <a href="index.php" class="btn btn-warning" style="float:right" >Home Page</a>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


</html>