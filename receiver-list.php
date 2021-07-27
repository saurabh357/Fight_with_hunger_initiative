<?php 
   $page_title = 'Receivers list';
    include dirname(__FILE__). '/include/header.php';
    $db = new Database();
  $query = "SELECT id,name,email,phone,address,photo FROM receivers";
    $posts = $db->getData($query);
  // ver_dump(query);
  // die();
?>
<div class="container">
       
      

<div class="card-columns">
  
   <?php
               if ($posts) {
              while($post = $posts->fetch_assoc()) {
            ?>



              

                             
                                  <div class= "card">
                                    <div class="card-body center">
                                    <img class="img-fluid rounded-circle w-90 mb-3" src="uploads/<?php echo $post['photo']; ?>"alt="Card image cap">
                                  
                                    <h6 class="card-text"><?php echo $post['name']; ?></h6>
                                    <p class="card-text center"><?php echo $post['email']?></p>
                                    <p class="card-text center"><?php echo $post['phone']?></p>
                                    <p class="card-text center"><?php echo $post['address']?></p>
                                 </div>
                                </div>
                    <?php
                            }
                        } else {
                     ?>
                            <div>
                                <td>No Data found</td>
                            </div>
                        <?php
                        }
                        ?>
                    
         
                  </div>
                  
</div>
  <?php
    $page_title = 'Home';
    // header footer
    include 'include/footer.php';
?>