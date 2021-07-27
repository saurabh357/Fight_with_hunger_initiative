<?php
    include dirname(__FILE__).'/../database/database.php';
    
   session_start();
   $db = new Database();

    $errors = [];
    $success = [];


if (isset($_POST['donate_form'])) {
          $food_amount = $_POST['food_amount'];
       
           $food_type = $_POST['food_type'];
           $name = $_POST['name'];
           $division = $_POST['division'];
           $district = $_POST['district'];
           $upazilla = $_POST['upazilla'];
           $union = $_POST['union'];
           $receiver = $_POST['receiver'];
           $content = $_POST['content'];
           $address = $_POST['address'];
        
        if($food_amount &&  $food_type && $name && $division && $district && $upazilla && $union && $receiver && $content && $address){
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
                
                if ($file_size > (1024*1024*30)) {
                    $file_errors[] = "File size should be more than 10KB";
                } 
                
                if (empty($file_errors)) {
                    $file_rename = substr(md5(time()), 0, 10).'.'.$ext;
                    $upload_directory = '../uploads/'. $file_rename;

                    if (!move_uploaded_file($tmp_name, $upload_directory)) {
                        $_SESSION['file_errors'] = ['Faled to upload file'];
                        header('location:../food-donate.php');
                    }
                } else {
                    $_SESSION['file_errors'] = $file_errors;
                    header('location:../food-donate.php');
                }
            }
          
                // store register
                // $insert_query = "INSERT INTO donations (food_amount, food_type,name,photo,division,district,upazilla,union,receiver) VALUES('$food_amount', '$food_type', '$name', '$file_rename','$division','$district','$upazilla','$union')";
                $insert_query = "INSERT INTO `donations`( `food_amount`, `food_type`, `name`, `photo`, `division`, `district`, `upazilla`, `union`, `receiver`, `content`, `address`) VALUES ('$food_amount','$food_type','$name', '$file_rename','$division','$district','$upazilla','$union','$receiver','$content','$address')";


                $run = $db->store($insert_query);

                if ($run) {
                    $success['success_message'] = "Data Inserted successfully";
                } else {
                    $success['error_message'] = "Data Inserted failed ".$db->error;
                }

                
                $_SESSION['success'] = $success;
                header('location:../food-donate.php');
            }

        } else {
            if (empty($food_amount)) {
                $errors['food_amount'] = "Amount field can not be empty";
            }
            if (empty($food_type)) {
                $errors['food_type'] = "Type field can not be empty";
            }
            
            if (empty($name)) {
                $errors['name'] = "Name field can not be empty";
            }

            if (empty($division)) {
                $errors['division'] = "Division field can not be empty";
            }

            if (empty($district)) {
                $errors['district'] = "District field can not be empty";
            }
            if (empty($upazilla)) {
                $errors['upazilla'] = "upazilla field can not be empty";
            }
            if (empty($receiver)) {
                $errors['receiver'] = "Receiver field can not be empty";
            }
            if (empty($_FILES['image']['name'])) {
                $errors['file_error'] = "Please select an image"; 
            }
   


            $_SESSION['errors'] = $errors;
            header('location:../food-donate.php');
        }

    