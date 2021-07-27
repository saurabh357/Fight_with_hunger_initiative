<?php 
  include dirname(__FILE__).'/../database/database.php';
  $db=new Database();
    if(isset($_GET['delete'])){

        $id=$_GET['delete'];
        
        $sql = "delete from posts where id='$id'";
        $run=$db->conn->query($sql);
        if($run){
            header('Location:donation-post-view.php');

        }
        //var_dump($data);
         
    }
?>