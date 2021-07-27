<?php
    include dirname(__FILE__).'/../database/database.php';
    
   session_start();
   $db = new Database();

    $errors = [];
    $success = [];

    if (isset($_POST['contact_form'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
       
        $phone = $_POST['phone'];
        $message = $_POST['message'];
       

       
       }

                $insert_query = "INSERT INTO contact (name,username, email, phone, message) VALUES('$name','$username', '$email', '$phone', '$message')";
                $run = $db->store($insert_query);
    
                if ($run) {
                    $success['success_message'] = " Submit successfully";
                } else {
                    $success['error_message'] = "Submit failed ".$db->error;
                }

                
                $_SESSION['success'] = $success;
                header('location:../user-register.php');


           {
            if (empty($name)) {
                $errors['name'] = "Name field can not be empty";
            }
            
            if (empty($email)) {
                $errors['email'] = "Agency field can not be empty";
            }

            if (empty($username)) {
                $errors['username'] = "Username field can not be empty";
            }
            if (empty($phone)) {
                $errors['phone'] = "Phone field can not be empty";
            }
            if (empty($address)) {
                $errors['address'] = "text field can not be empty";
            }


            $_SESSION['errors'] = $errors;
            header('location:../contact.php');
        }
?>