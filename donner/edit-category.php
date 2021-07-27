<?php
    $page_title = 'Update Category Information';
    // include header file
    include dirname(__FILE__). '/includes/header.php';
   $db = new Database();

    if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        
        $sql = "SELECT * from categories where id='$id'";
        $run  = $db->conn->query($sql);
        $data = $run->fetch_assoc();   
    }
    if (isset($_SESSION['old_data'])) 
    {
        $data = $_SESSION['old_data'];
        unset($_SESSION['old_data']);
    }
?>

<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Category Information</h3>
            </div>
            <form action="update-category.php" method="POST">
            <input type="hidden" name="id" value='<?php  echo $data['id']; ?>' ></input>
                <div class="card-body">
                    <?php 
                        if (isset($message['success_message'])) {
                            echo '<div class="alert alert-success">'.$message['success_message'].'</div>';
                        }
                        if (isset($message['error_message'])) {
                            echo '<div class="alert alert-danger">'.$message['error_message'].'</div>';
                        }
                    ?>
                    
                   <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" value='<?php  echo $data['name']; ?>' placeholder="Update Category Name">
                        <span class="text-danger">
                        <?php 
                            if(isset($err['name'])) {
                                echo $err['name'];
                            }
                            ?>
                        </span>
                    </div>
                    
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-secondary btn-lg btn-block" name="update_category">UPDATE</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
    // include footer file
    include dirname(__FILE__). '/includes/footer.php';
?>