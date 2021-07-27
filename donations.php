<?php 
   $page_title = 'Donations';
    include dirname(__FILE__). '/include/header.php';
?>

<div class=container>
<form action="submit/user2-register-submit.php" method="POST" enctype="multipart/form-data" style="padding-top:50px;">

   <div class="card">

         <div class="card-header text-center">
             <h4 class="pb-3">Donation Clearification Form</h4>
             <hr style=" border: 1px solid lightgray; margin:0 15px 15px;">
          </div>

        <div class ="card-body">
          
        <div class="form-row">
         <div class="form-group col-md-6">
           <label for="inputEmail4">Amount</label>
           <input type="number" required min="1" class="form-control add-amount" name="amount" id="amount" placeholder="Enter Amount In English" value="" max="10000000">
          </div>
        <div class="form-group col-md-6">
           <label for="inputPassword4">Currency</label>
           <select class="form-control select2" name="currency_id" id="currency_id" required>
                <option value="2" selected>Taka
                   (BDT)
                </option>
                <option value="1">Dollar
                    (USD)
                 </option>
            </select>
         </div>
        </div>


        <div class="form-row">
         <div class="form-group col-md-6">
           <label for="inputEmail4">Email</label>
           <input type="email" class="form-control" name="donor_email" placeholder="Enter Your Email" required value="">
          </div>
        <div class="form-group col-md-6">
           <label for="inputPassword4">Date</label>
            <input type="date" class="form-control" id="inputPassword4">
         </div>
        </div>

        <div class="form-row">
         <div class="form-group col-md-6">
           <label for="inputEmail4">Payment Channel</label>
           <select class="form-control select2" name="payment_method_id" id="payment_method_id">
              <option value="5" selected>Bkash</option>
              <option value="7">Bank Transfer</option>
            </select>
          </div>
        <div class="form-group col-md-6">
           <label for="inputPassword4">Donation Reasion</label>
           <select class="form-control select2" name="sector_id" id="sector_id" required>
            <option value="38">Health and Treatment</option>
            <option value="39">Zakat Money</option>
            <option value="40">Qurbani Program</option>
            <option value="42">Food Program</option>
</select>
         </div>
        </div>


        <div class="form-row">
         <div class="form-group col-md-6">
           <label for="inputEmail4">Name</label>
           <input type="text" class="form-control" name="donor_name" id="donor_name" placeholder="Enter Your Name" value="">
          </div>
        <div class="form-group col-md-6">
           <label for="inputPassword4">Attachment</label>
           <input type="file" id="attachment" class="form-control" name="attachment">

            <span style="color:#e83e8c; font-size: 13px; width: auto; float: left; "><i class="fa fa-hand-o-right" aria-hidden="true">
          </i> File Type: jpg,jpeg,png,pdf,Max Size:1MB </span>
         </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-12">
              <p class="lable" style="">Message </p>
                <textarea class="form-control" name="donor_message" id="donor_message" placeholder="Enter Your Message"></textarea>
            </div>
         </div>

         <div class="card-footer">

         <div class="col-md-12 text-center">
            <div class="g-recaptcha" data-sitekey="6LfCe44UAAAAAB32FmpzgPkZuh7PZhS1N-p6OGXl"></div>
             <div style="margin-top: 10px" class="submit-button">
                <a href="#" id="save_button" onclick="if (!window.__cfRLUnblockHandlers) return false; add_verifcation()" class="bnt theme-btn btn-block" data-cf-modified-dc7b68afde3abdf0ccb5d72e-="">Send</a>
            </div>
          </div>
         </div>
     



         </div>



    </div>
    </form>
</div>

<?php
   
    include 'include/footer.php';
?>