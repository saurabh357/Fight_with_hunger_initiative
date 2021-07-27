<?php 
    
    //include database 
     include dirname(__FILE__).'../../database/database.php';
    session_start();

    $db = new Database();
    $errors = [];
    $success = [];

    $_SESSION['old_data'] = $_POST;
    
    if(isset($_POST['update_post']))
	{
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category = $_POST['category'];


        if(!empty($title) && !empty($content) && !empty($category))
        {
	        $sql = "UPDATE posts SET title='$title', content='$content',
            category_id='$category' where id='$id' ";
            $result = $db->conn->query($sql);

            if($result){
                $_SESSION['message'] = "Blog ID $id Data Updated Successfully!";
            	$_SESSION['msg_type'] = "warning";
            	header('location:posts.php');
            } 
            else{
                $_SESSION['message'] = "Blog Data Can not be Updated !!";
                $_SESSION['msg_type'] = "danger";
                header('location:posts.php');
            }
            
        }
        else
        {
            if (empty($title)) 
            {
                $errors['title'] = "Blog Title Field Can not be Empty";            
            }
            if (empty($content)) 
            {
                $errors['content'] = "Blog Content Field Can not be Empty";            
            }
            if (empty($category)) 
            {
                $errors['category'] = "Blog Category Field Can not be Empty";            
            }
            $_SESSION['errors'] = $errors;
            header('location:edit-post.php');
        }
         
    }
 
?>