<?php
    include dirname(__FILE__).'/../database/database.php';
    session_start();
    $db = new Database();

    $errors = [];

    if (isset($_POST['category_submit'])) {
        $name = htmlspecialchars(trim($_POST['name']));

        if ($name) {
            // check exists category
            $category_exists_query = "SELECT * FROM categories WHERE name='$name'";
            $category_exists = $db->getData($category_exists_query);

            if ($category_exists) {
                $errors['name'] = "$name already taken";

                $_SESSION['errors'] = $errors;
                header('location:../category-add.php');
            } else {
                // store category
                $query = "INSERT INTO categories(name) VALUES('$name')";
                $run = $db->store($query);
                
                if ($run) {
                    $success['success_message'] = "Category added successfully";
                } else {
                    $success['error_message'] = "Failed to add category ".$db->error;
                }

                $_SESSION['success'] = $success;
                header('location:../category-add.php');
            }
            
            
        } else {
            if (empty($name)) {
                $errors['name'] = "Name field can not be empty";            
            }


            $_SESSION['errors'] = $errors;
            header('location:../category-add.php');
        }
        
    } else {
        header('location:../category-add.php');
    }