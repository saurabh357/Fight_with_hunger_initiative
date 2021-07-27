<?php
    include dirname(__FILE__).'/../database/database.php';
    
   session_start();
   $db = new Database();

    $errors = [];
    $success = [];

    if (isset($_POST['coment_form'])) {
        $name = $_POST['name'];
        
        $coment = $_POST['coment'];
       

       
       }

                $insert_query = "INSERT INTO comments (name,coment) VALUES('$name','$coment')";
                $run = $db->store($insert_query);
    
                if ($run) {
                    $success['success_message'] = " Submit successfully";
                } else {
                    $success['error_message'] = "Submit failed ".$db->error;
                }

                
                $_SESSION['success'] = $success;
                header('location:../index.php');


        
           
?>