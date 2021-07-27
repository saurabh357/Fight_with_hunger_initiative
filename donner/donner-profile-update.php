<?php 
    
    //include database 
    include dirname(__FILE__).'../../database/database.php';
    session_start();

    $db = new Database();
    $errors = [];
    $success = [];

    $_SESSION['old_data'] = $_POST;
    
    if (isset($_POST['update_profile'])) {
        //var_dump($_POST['update_profile']) ; die();
   
        $donner_id = $_POST['donner_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
      
       if(!empty($name) && !empty($email) && !empty($username) && !empty($phone) && 
            !empty($address))
        {

	      $sql = "UPDATE donners SET `name`='$name',`email`='$email',`username`='$username',
                `phone`='$phone',`address`='$address' where `id`='$donner_id' ";
            $result = $db->conn->query($sql);

            if($result){
                $success['success_message'] = "donners ID $donner_id Data Updated Successfully!";
            	$_SESSION['success'] = $success;
            	header('location:donner-profile-edit.php');
            } 
            else{
                $success['error_message'] = " Data Can not be Updated !!";
                $_SESSION['success'] = $success;
                header('location:donner-profile-edit.php');
            }
            
        }
        else
        {
            if (empty($name)) 
            {
                $errors['name'] = " Name Field Can not be Empty";            
            }
            
            $_SESSION['errors'] = $errors;
            header('location:donner-profile-edit.php');
        }
         
    }
 
?>