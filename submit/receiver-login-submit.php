<?php
    include dirname(__FILE__).'/../database/database.php';
    session_start();
    $db = new Database();

    $errors = [];

    if (isset($_POST['login_submit'])) {
        $email = htmlspecialchars(trim($_POST['email']));
        $password = htmlspecialchars(trim($_POST['password']));

        if ($email  && $password) {
            $password = sha1($password);
            // attempt login
            $query = "SELECT * FROM receivers WHERE (email='$email' OR username='$email') AND password='$password'";
            $run  = $db->conn->query($query);
            
            if ($run->num_rows > 0) {
                $user = $run->fetch_assoc();
                $_SESSION['username'] = $user['username'];
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['receiver_id'] = $user['id'];
                $_SESSION['id'] = $user['id'];
                header('location:../receiver-index.php');
            } else {
                $errors['username'] = "Invalid email or password"; 
                $_SESSION['errors'] = $errors;
                header('location:../receiver-login.php');
            }
            
        } else {
            if (empty($email)) {
                $errors['email'] = "Email field can not be empty";            
            }

            if (empty($password)) {
                $errors['password'] = "Password field can not be empty";            
            }

            $_SESSION['errors'] = $errors;
            header('location:../receiver-login.php');
        }
        
    } else {
        header('location:../receiver-login.php');
    }