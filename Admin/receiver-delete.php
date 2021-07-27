<?php 
  include 'database/database.php';
  $db=new Database();
    if(isset($_GET['delete'])){

        $id=$_GET['delete'];
        
        $sql = "delete from receivers where id='$id'";
        $run=$db->conn->query($sql);
        if($run){
            header('Location:receiver-list.php');

        }
        //var_dump($data);
         
    }
?>