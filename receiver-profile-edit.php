<?php
    
    //include 'database/database.php';
    include 'include/header.php';
     $db = new Database();

     if(isset($_SESSION['id'])){
        $receiver_id = $_SESSION['id'];
        
        $sql = "SELECT * FROM receivers WHERE id='$receiver_id'";
        $run  = $db->getData($sql);
        $data = $run->fetch_assoc();
    }
    
    if (isset($_SESSION['old_data'])) 
    {
        $data = $_SESSION['old_data'];
        unset($_SESSION['old_data']);
    }
?>
<div class=container>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Receiver Information</h3>
            </div>
            <form action="receiver-profile-update.php" method="POST">
            <input type="hidden" name="receiver_id" value='<?php  echo $receiver_id; ?>' ></input>
                <div class="card-body">
                    <?php 
                        if (isset($message['success_message'])) {
                            echo '<div class="alert alert-success">'.$message['success_message'].'</div>';
                        }
                        if (isset($message['error_message'])) {
                            echo '<div class="alert alert-danger">'.$message['error_message'].'</div>';
                        }
                    ?>
                    
                    <div class="row">
                      <div class="form-group col-lg-6">
                        <label for="_name">Name</label><br>
                        <input type="text" name="name" id="_name" class="form-control demo-input-box" value="<?php 
                                    if(isset($data['name'])) 
                                    {
                                        echo $data['name'];
                                    }
                                ?>"
                         placeholder="Enter Name">
                        <span class="text-danger">
                            <?php 
                                if(isset($err['name'])) {
                                    echo $err['name'];
                                }
                            ?>
                        </span>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="_email">Email</label><br>
                        <input type="email" name="email" id="_email" class="form-control demo-input-box"  value="<?php 
                                    if(isset($data['email'])) 
                                    {
                                        echo $data['email'];
                                    }
                                ?>" placeholder="Enter Email">
                        <span class="text-danger">
                            <?php 
                                if(isset($err['email'])) {
                                    echo $err['email'];
                                }
                            ?>
                        </span>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-lg-6"  >

                        <label for="_username">Username</label><br>
                        <input type="text" name="username" id="_username" class="form-control demo-input-box"   value="<?php 
                                    if(isset($data['username'])) 
                                    {
                                        echo $data['username'];
                                    }
                                ?>" placeholder="Enter Username">
                        <span class="text-danger">
                            <?php 
                                if(isset($err['username'])) {
                                    echo $err['username'];
                                }
                            ?>
                        </span>
                    </div>
                   
                    </div>
                    <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="_phone">Phone</label><br>
                        <input type="text" name="phone" id="_phone" class="form-control demo-input-box"  value="<?php 
                                    if(isset($data['phone'])) 
                                    {
                                        echo $data['phone'];
                                    }
                                ?>" placeholder="Enter Phone">
                        <span class="text-danger">
                            <?php 
                                if(isset($err['phone'])) {
                                    echo $err['phone'];
                                }
                            ?>
                        </span>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="_address">Address</label><br>
                        <input type="text" name="address" id="_address" class="form-control demo-input-box"  value="<?php 
                                    if(isset($data['address'])) 
                                    {
                                        echo $data['address'];
                                    }
                                ?>" placeholder="Enter Address">
                        <span class="text-danger">
                            <?php 
                                if(isset($err['address'])) {
                                    echo $err['address'];
                                }
                            ?>
                        </span>
                    </div>

                    </div>
                    
                    
                    
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-secondary btn-lg btn-block" name="update_profile">UPDATE</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<?php 
  
    include 'include/footer.php';
?>
