<?php 
  include 'database/database.php';
  $db=new Database();
    if(isset($_GET['delete'])){

        $id=$_GET['delete'];
        
        $sql = "delete from donners where id='$id'";
        $run=$db->conn->query($sql);
        if($run){
            header('Location:donner-list.php');

        }
        //var_dump($data);
         
    }
?>