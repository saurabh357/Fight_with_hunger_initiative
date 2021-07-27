<?php

    // header include
    include 'include/header.php';
?>

<head>

<link href="layout/styles/form.css" rel="stylesheet" type="text/css" />
</head>
<body>
<form action="submit/contact-submit.php" method="POST" style="padding-top:50px;">
        <div class="demo-table">
        <div class="form-head">Contact Us</div>
      
            
<?php 
            if (isset($message['success_message'])) {
                echo '<div class="alert alert-success">'.$message['success_message'].'</div>';
            }
            if (isset($message['error_message'])) {
                echo '<div class="alert alert-danger">'.$message['error_message'].'</div>';
            }
            
            ?>


                      <div class="form-group">
                        <label for="_name">Name</label>
                        <input type="text" name="name" id="_name" class="demo-input-box" placeholder="Enter Name">
                        <span class="text-danger">
                            <?php 
                                if(isset($err['name'])) {
                                    echo $err['name'];
                                }
                            ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="_username">Company/Agency</label>
                        <input type="text" name="username" id="_username" class="demo-input-box" placeholder="Enter your company/agency">
                        <span class="text-danger">
                            <?php 
                                if(isset($err['username'])) {
                                    echo $err['username'];
                                }
                            ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="_email">Email</label>
                        <input type="email" name="email" id="_email" class="demo-input-box" placeholder="Enter your  Email">
                        <span class="text-danger">
                            <?php 
                                if(isset($err['email'])) {
                                    echo $err['email'];
                                }
                            ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="_phone">Phone</label>
                        <input type="text" name="phone" id="_phone" class="demo-input-box" placeholder="Enter your Phone">
                        <span class="text-danger">
                            <?php 
                                if(isset($err['phone'])) {
                                    echo $err['phone'];
                                }
                            ?>
                        </span>
                    </div>
                    <div class="textarea">
                        <label for="_address">Message</label>
                      
                        <input type="textarea" name="message" id="_message" class="demo-input-box" placeholder="Enter  your message">
                        <span class="text-danger">
                            <?php 
                                if(isset($err['message'])) {
                                    echo $err['message'];
                                }
                            ?>
                        </span>
                    </div>



                  <div>
                  <br>
                  </div> 
                <div>
                    <input type="submit"
                        name="contact_form" value="Submit"
                        class="btnRegister">
                </div>
            </div>
        </div>
       
    </form>
    
</body>


<?php
   
    // header footer
    include 'include/footer.php';
?>