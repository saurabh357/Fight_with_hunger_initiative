<?php
    include dirname(__FILE__).'/../database/database.php';
    session_start();
    $db = new Database();

    $errors = [];

    if (isset($_POST['login_submit'])) {
        $email = htmlspecialchars(trim($_POST['email']));
        $password = htmlspecialchars(trim($_POST['password']));

        if ($email  && $password) {
            $password = ($password);
            // attempt login
            $query = "SELECT * FROM admins WHERE (email='$email' OR username='$email') AND password='$password'";
            $run  = $db->conn->query($query);
            
            if ($run->num_rows > 0) {
                $user = $run->fetch_assoc();
                $_SESSION['username'] = $user['username'];
                header('location:../index.php');
            } else {
                $errors['email'] = "Invalid email or password"; 
                $_SESSION['errors'] = $errors;
                header('location:../login.php');
            }
            
        } else {
            if (empty($email)) {
                $errors['email'] = "Email field can not be empty";            
            }

            if (empty($password)) {
                $errors['password'] = "Password field can not be empty";            
            }

            $_SESSION['errors'] = $errors;
            header('location:../login.php');
        }
        
    } else {
        header('location:../login.php');
    }