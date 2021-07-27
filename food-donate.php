<?php 
   $page_title = 'Donations';
    include dirname(__FILE__). '/include/header.php';
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
<div class= container>
<form action="submit/food-donate-submit.php" method="POST" enctype="multipart/form-data" style="padding-top:50px;">

   <div class="card">

         <div class="card-header text-center">
             <h4 class="pb-3">FOOD AID</h4>
             <hr style=" border: 1px solid lightgray; margin:0 15px 15px;">
          </div>

        <div class ="card-body">

        <?php 
            if (isset($message['success_message'])) {
                echo '<div class="alert alert-success">'.$message['success_message'].'</div>';
            }
            if (isset($message['error_message'])) {
                echo '<div class="alert alert-danger">'.$message['error_message'].'</div>';
            }
            
            ?>

        <div class="form-row">
         <div class="form-group col-md-6">
           <label for="">Food Amount(KG)</label>
           <input type="number" required min="1kg" class="form-control add-amount" name="food_amount" placeholder="Enter Amount In English" value="" max="500kg">
           <span class="text-danger">
                            <?php 
                                if(isset($err['food_amount'])) {
                                    echo $err['food_amount'];
                                }
                            ?>
                        </span>
          </div>
          <div class="form-group col-md-6">
           <label for="">Food Type</label>
           <select class="form-control" name="food_type" id="" required>
                <option selected>
                   Rice Type
                </option>
                <option >
                    Snacks Type
                 </option>
                 <option >
                    Fruits
                 </option>
                 <option>
                    Others
                 </option>
            </select>

            <span class="text-danger">
                            <?php 
                                if(isset($err['food_type'])) {
                                    echo $err['food_type'];
                                }
                            ?>
                        </span>
          </div>


          </div>

          <div class="form-row">
         <div class="form-group col-md-6">
           <label for="_name">Name</label>
           <input type="text" class="form-control" name="name" placeholder="Enter Your Name" value="">
           <span class="text-danger">
                            <?php 
                                if(isset($err['name'])) {
                                    echo $err['name'];
                                }
                            ?>
                        </span>
          </div>



        <div class="form-group col-md-6">
        <div class="form-group col-lg-12">
                        <label for="">Upload Image</label>
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
            <span style="color:#e83e8c; font-size: 13px; width: auto; float: left; "><i class="fa fa-hand-o-right" aria-hidden="true">
          </i> File Type: jpg,jpeg,png,pdf,Max Size:1MB </span>
         </div>
        </div>
       
      <div class="row">
                    <div class="form-group col-lg-6">
                    <div class="form-group">
                                <label for="division">Division</label>
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

                                <span class="text-danger">
                            <?php 
                                if(isset($err['division'])) {
                                    echo $err['division'];
                                }
                            ?>
                        </span>
                            </div>
        
                            </div>

                            <div class="form-group col-lg-6">
                            <div class="form-group">
                                <label for="district">District</label>
                                <select name="district" id="district"  class="form-control">
                                    <option value="">Select District</option>
                                </select>
                            </div>
                        <span class="text-danger">
                        <?php 
                                if(isset($err['district'])) {
                                    echo $err['district'];
                                }
                            ?>
                        </span>
                            </div>
                            </div>
                     
                            <div class="row">


                            <div class="form-group col-lg-6">
                            <div class="form-group">
                            <label for="upazilla">Upazilla</label>
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
                            <label for="union">Union</label>
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
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="receiverList">Choose Receiver</label>
                                <select name="receiver" id="receiverList" class="form-control" >
                                    <option value="">Select Receiver</option>
                                </select>
                                <span class="text-danger">
                            <?php 
                                if(isset($err['receiver'])) {
                                    echo $err['receiver'];
                                }
                            ?>
                        </span>
                            </div>
                        </div>



                            </div>
                           
                            <div class="row">
                            
                            <div class="form-group col-lg-6 ">
                             <label for="">Content</label>
                              <input type="textarea" class="form-control" name="content" placeholder="Enter Your Description" value="">
                             <span class="text-danger">
                            <?php 
                                if(isset($err['content'])) {
                                    echo $err['content'];
                                }
                            ?>
                        </span>
                     </div>
                        <div class="form-group col-lg-6 ">
                             <label for="_address">Address</label>
                              <input type="text" class="form-control" name="address"id="_address" placeholder="Enter Your address Detail" value="">
                             <span class="text-danger">
                            <?php 
                                if(isset($err['content'])) {
                                    echo $err['content'];
                                }
                            ?>
                            </span>
                         </div>
                     </div>

        
                               <div class= "form-group col-lg-6">
               
                                   <input type="submit"
                                       name="donate_form" value="Submit"
                                        class="btn btn-succeess";>
                               </div>

                 </div>
                  <div class="card-footer">
                 </div>
</form>
   </div>

</div>




<?php
   
    include 'include/footer.php';
?>