<?php
     $file_errors=[];
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
            echo 'File must be the following type: '. implode(', ', $allow);
        } else if ($file_size > (1024*30)) {
            echo "File size should be more than 30KB";
        } else {
            $new_name = substr(md5(time()), 0, 10).'.'.$ext;
            $upload_directory = 'uploads/'.$new_name;

            if (move_uploaded_file($tmp_name, $upload_directory)) {
                echo "Uploaded successfully";
            }
        }
         if (!in_array($ext, $allow)){
             $errors['file_ext_error']= 'File type must be following type:'. implode(', ', $allow);
         }


         if ($file_size > (1024*30)) {
             $errors['file_size_error']="File size should be more than 30KB";
         }
         if (empty($file_errors)) {
            $new_name = substr(md5(time()), 0, 10).'.'.$ext;
            $upload_directory = 'uploads/'.$new_name;

            if (move_uploaded_file($tmp_name, $upload_directory)) {
                echo "Uploaded successfully";
            }


         } else {
             $_SESSION['file_errors']=$file_errors;
             header();
         }
      
    }

    ?>