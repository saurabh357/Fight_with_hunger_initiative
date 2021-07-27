<?php 
   $page_title = 'donation  list';
    include dirname(__FILE__). '/include/header.php';
    $db = new Database();
    $query = "SELECT donations.*, receivers.name as receiver_name FROM donations LEFT JOIN receivers ON receivers.id=donations.receiver";
    $posts = $db->getData($query);
?>


  <body>
 
    <div class='col-md-6 offset-md-3' style= padding-top:50px;> 
    
        <table border ="1px" style="width:600px; line-height:35px; margin:20px;">
        <table id = "table" class = "table table-bordered">
            <tr>
                <th colspan="11" style="text-align:center; background: #9D0552; color:white;"><h2>Guest Donations</h2></th>
            </tr>
            <tr >
                <th style="text-align:center;color:#9D0552; border:2px solid #9D0552;background:white;padding: 7px;">ID</th>
                <th style="text-align:center;color:#9D0552; border:2px solid #9D0552;background:white;padding: 7px;">Food Type </th>
                <th style="text-align:center;color:#9D0552; border:2px solid #9D0552;background:white;padding: 7px;">Amount(Pound)</th>
               
                <th style="text-align:center;color:#9D0552; border:2px solid #9D0552;background:white;padding: 7px;">Chosen Receiver</th>
                <th style="text-align:center;color:#9D0552; border:2px solid #9D0552;background:white;padding: 7px;">Name</th>
               
               
            </tr>
            <?php
                        if ($posts) {
                            while($post = $posts->fetch_assoc()) {
                                ?>
                    <tr>
                        <td style="text-align:center;padding: 5px;"><?php echo $post['id']; ?></td>
                        <td style="text-align:center;padding: 5px;"><?php echo $post['food_type']; ?></td>
                        <td style="text-align:center;padding: 5px;"><?php echo $post['food_amount']; ?></td>

                        <td style="text-align:center;padding: 5px;"><?php echo $post['receiver_name']; ?></td>
                        <td style="text-align:center;padding: 5px;"><?php echo $post['name']; ?></td>
                       
                      
                    </tr>
                    
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td>No Data Found</td>
                            </tr>
                        <?php
                        }
                    ?>
           
        </table>
    </div>
    
  </body>
  <script src = "../js/jquery.js"></script>
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/dataTables.bootstrap.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$("#table").DataTable();
	});
</script>
  <?php
    $page_title = 'Home';
    // header footer
    include 'include/footer.php';
?>