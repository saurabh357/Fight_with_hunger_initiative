 <?php
   $page_title = 'Home';
   // header include
   include 'include/header.php';
?>
<?php
    $conn = new mysqli('localhost', 'root', '', 'wastage-food-reduction-through-donation-system-master');

    if ($conn->connect_error) {
        die('database connection failed');
    }

    $query = "SELECT * FROM divisions ORDER BY name ASC";
    $run = $conn->query($query);

    if (isset($_SESSION['file_errors'])) {
        $file_err = $_SESSION['file_errors'];
        unset($_SESSION['file_errors']);
    }
?>



 <div class="container">
           <link rel="stylesheet" href="./assets/plugins/bootstrap/dist/css/bootstrap.min.css">
     <form action="submit/user2-register-submit.php" method="POST" enctype="multipart/form-data" style="padding-top:50px;">
     <div class="card-header text-center">
       <h4 class="pb-3"> Receiver Registration Form </h4>
             <hr style=" border: 1px solid lightgray; margin:0 15px 15px;">
      
       </div>

      
        <div class="card-body " style="background-color:#DCDCDC">
        
            
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
                        <input type="text" name="name" id="_name" class="demo-input-box" placeholder="Enter Name">
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
                        <input type="email" name="email" id="_email" class="demo-input-box" placeholder="Enter Email">
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
                        <input type="text" name="username" id="_username" class="demo-input-box" placeholder="Enter Username">
                        <span class="text-danger">
                            <?php 
                                if(isset($err['username'])) {
                                    echo $err['username'];
                                }
                            ?>
                        </span>
                    </div>
                    <div class="form-group col-lg-6">
                    <label>Password</label><br>
                        <input type="password" name="password" id="_pass" class="demo-input-box" placeholder="Enter Name">
                        <span class="text-danger">
                            <?php 
                                if(isset($err['password'])) {
                                    echo $err['password'];
                                }
                            ?>
                        </span>
                    </div>
                    </div>

                    <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="_phone">Phone</label><br>
                        <input type="text" name="phone" id="_phone" class="demo-input-box" placeholder="Enter Phone">
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
                        <input type="text" name="address" id="_address" class="demo-input-box" placeholder="Enter Address">
                        <span class="text-danger">
                            <?php 
                                if(isset($err['address'])) {
                                    echo $err['address'];
                                }
                            ?>
                        </span>
                    </div>

                    </div>

                    <div class="form-group col-lg-12">
                        <label for="">Upload Image</label><br>
                        <input type="file" name="image" class="form-control">
                        <span class="text-danger">
                            <?php 
                               if(isset($file_err)) {
                                echo implode(' | ', $file_err);
                            }
                            if(isset($err['file_error'])) {
                                $err['file_error'];
                            }
                            ?>
                        </span>
                    </div>

                     <div class="row">
                    <div class="form-group col-lg-6">
                    <div class="form-group">
                                <label for="">Division</label>
                                <select name="division"  class="form-control" id="division">
                                    <option value="">Select Division</option>
                                    <?php 
                                        if ($run->num_rows > 0) {
                                            while($division = $run->fetch_assoc()) {
                                                ?>
                                                    <option value="<?php echo $division['id']; ?>"><?php echo $division['name']; ?></option>
                                                <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        <span class="text-danger">
                         
                        </span>
                            </div>

                            <div class="form-group col-lg-6">
                            <div class="form-group">
                                <label for="">District</label>
                                <select name="district" id="district"  class="form-control">
                                    <option value="">Select District</option>
                                </select>
                            </div>
                        <span class="text-danger">
                          
                        </span>
                            </div>
                            </div>
                     
                            <div class="row">


                            <div class="form-group col-lg-6">
                            <div class="form-group">
                            <label for="">Upazilla</label>
                                <select name="upazilla"  id="upazilla" class="form-control">
                                    <option value="">Select Upazila</option>
                                </select>
                            </div>
                        <span class="text-danger">
                            <?php 
                                if(isset($err['upazilla'])) {
                                    echo $err['upazilla'];
                                }
                            ?>
                        </span>
                            </div>

                            
                            <div class="form-group col-lg-6">
                            <div class="form-group">
                            <label for="">Union</label>
                                <select name="union" id="union" class="form-control" >
                                    <option value="">Select Union</option>
                                </select>
                            </div>
                        <span class="text-danger">
                            <?php 
                                if(isset($err['union'])) {
                                    echo $err['union'];
                                }
                            ?>
                        </span>
                            </div>



                            </div>
                           


                          <div class="field-column">
                             <div class="row">
                              <div class= "form-group col-lg-6">
               
                                   <input type="submit"
                                       name="register_form" value="Register"
                                        class="btn btn-succeess";>
                               </div>
                            <div class= "form-group col-lg-6">
                                     <a href="index.php" class="btn btn-warning" style="float:right" >Home Page</a>
                             </div>
                           </div>
                         </div>
                  </div>
         </div>
    </form>
    </div>                 
<?php
    
    // header footer
    include 'include/footer.php';
?>