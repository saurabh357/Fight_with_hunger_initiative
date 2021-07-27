<?php 
   $page_title = 'donation list';
    include dirname(__FILE__). '/include/header.php';
    $db = new Database();
    $receiver_id = $_SESSION['receiver_id'];
  $query = "SELECT * FROM `donations` WHERE donations.receiver='$receiver_id' ORDER BY id DESC";
    $posts = $db->getData($query);
  // ver_dump(query);
  // die();
  include 'include/_sidebar.php';
?>


  <body>
  <div class= container>
<div class="col-md-8 offset-md-2">
    <div class="card">
        <div class="card-header">
        <center>
            <h3 class="card-title"text_align="center">Requested list</h3><br>
           
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Food Type</th>
                        <th>Amount(KG)</th>
                        <th>Donner Name</th>
                       
                        <th>Address</th>
                        <th>Message</th>
                        <th>Request Time</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($posts) {
                            while($post = $posts->fetch_assoc()) {
                                ?>
                                    <tr>
                                       <td><?php echo $post['id']; ?></td>
                                       <td><?php echo $post['food_type']; ?></td>
                                       <td><?php echo $post['food_amount']; ?></td>
                                       <td><?php echo $post['name']; ?></td>
                                       
                                       <td><?php echo $post['address']; ?></td>
                                       <td><?php echo $post['content']; ?></td>
                                       <td><?php echo $post['created_at']; ?></td>
                                      
                                    </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td>No Post found</td>
                            </tr>
                        <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
 
    
    
  </body>
  <?php
    $page_title = 'Home';
    // header footer
    include 'include/footer.php';
?>