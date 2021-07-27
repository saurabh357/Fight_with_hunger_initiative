<?php
    include dirname(__FILE__).'/../database/database.php';
    
   session_start();
   $db = new Database();

    $errors = [];
    $success = [];

    if (isset($_POST['register_form'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $division = $_POST['division'];
        $district = $_POST['district'];
        $upazilla = $_POST['upazilla'];
        $union = $_POST['union'];

        if (isset($_FILES['image'])) {
            $file_name = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $file_size = $_FILES['image']['size'];
            $allow = ['jpg', 'png', 'jpeg', 'gif'];

             //extension
             $div = explode('.', $file_name);
             $ext = strtolower(end($div));

              //check extension
              if (!in_array($ext, $allow)) {
               $file_errors[] = 'File must be the following type: '. implode(', ', $allow);
           }
           
           if ($file_size > (1024*30)) {
               $file_errors[] = "File size should be more than 30KB";
           } 
           
           if (empty($file_errors)) {
               $file_rename = substr(md5(time()), 0, 10).'.'.$ext;
               $upload_directory = '../uploads/'. $file_rename;

               if (!move_uploaded_file($tmp_name, $upload_directory)) {
                   $_SESSION['file_errors'] = ['Faled to upload file'];
                   header('location:../user-register.php');
               }
           } else {
               $_SESSION['file_errors'] = $file_errors;
               header('location:../user-register.php');
           }
       }



        if ($name && $email && $username && $password) {
            // unique validation
            $email_exists_query = "SELECT * FROM donners WHERE email='$email'";
            $email_exists = $db->getData($email_exists_query);

            if ($email_exists) {
                $errors['email'] = "Email already taken";
            }

            $username_exists_query = "SELECT * FROM donners WHERE username='$username'";
            $username_exists = $db->getData($username_exists_query);

            if ($username_exists) {
                $errors['username'] = "Username already taken";
            }

            if ($email_exists || $username_exists) {
                $_SESSION['errors'] = $errors;
                header('location:../user-register.php');
            } else {
                $pass = sha1($password);
                 // store register

                $insert_query = "INSERT INTO donners (name, email, username, password, phone, address,photo,division_id,district_id,upazilla_id,union_id) VALUES('$name', '$email', '$username', '$pass', '$phone', '$address','$file_rename','$division','$district','$upazilla','$union')";
                $run = $db->store($insert_query);
    
                if ($run) {
                    $success['success_message'] = "Donner registered successfully";
                } else {
                    $success['error_message'] = "Donner register failed ".$db->error;
                }

                
                $_SESSION['success'] = $success;
                header('location:../user-register.php');
            }

        } else {
            if (empty($name)) {
                $errors['name'] = "Name field can not be empty";
            }
            
            if (empty($email)) {
                $errors['email'] = "Email field can not be empty";
            }

            if (empty($username)) {
                $errors['username'] = "Username field can not be empty";
            }

            if (empty($password)) {
                $errors['password'] = "Password field can not be empty";
            }
            if (empty($phone)) {
                $errors['phone'] = "Phone field can not be empty";
            }
            if (empty($address)) {
                $errors['address'] = "address field can not be empty";
            }


            $_SESSION['errors'] = $errors;
            header('location:../user-register.php');
        }


    }