<?php
    $page_title = 'Posts list';
  
    include dirname(__FILE__). '/include/header.php';
  
   // session_start();
    $db = new Database();
    
    $query = "SELECT posts.*, categories.name as category_name, donners.name as donner_name FROM `posts`
            LEFT JOIN categories ON posts.category_id=categories.id 
            LEFT JOIN donners ON posts.donner_id=donners.id WHERE `status`='0' ORDER by id DESC";
    $posts = $db->getData($query);
    
    //var_dump($query) ; die();
?>

<div class="container">
       
         
      
        <div class="card-columns">
        
           <?php
               if ($posts) {
              while($post = $posts->fetch_assoc()) {
            ?>


                              <div class="card">
                                
                                 <div class="card-body">
                                 <img class="img-fluid rounded-circle w-50 mb-3" src="donner/uploads/<?php echo $post['photo']; ?>"alt="Card image cap"></img> 
                                    <h5 class="card-title"><?php echo $post['title']; ?></h5>
                                    <h6 class="card-text"><?php echo $post['category_name']; ?></h6>
                                    <p class="card-text"><?php echo $post['content']?></p>
                                    <p class="card-text"><small class="text-muted"><?php $d=strtotime($post['created_at']); echo date("d M, Y",$d); ?></small></p>
                                    <a href="post-view.php?post_id=<?php echo $post['id']; ?>" class="btn btn-primary">See more</a>
                                 </div>
                                </div>
                                  
                                <?php
                            }
                        } else {
                            ?>
                            <div>
                                <td>No Post found</td>
                            </div>
                        <?php
                        }
                    ?>
                
        </div>
    </div>

<?php
    // footer include
    include dirname(__FILE__). '/include/footer.php';
?>