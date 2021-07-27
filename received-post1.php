<?php 

    include dirname(__FILE__). '/include/header.php';
    $db = new Database();     
    $receiver_id = $_SESSION['receiver_id'];
   
    $query = "SELECT posts.*, categories.name as category_name, donners.name as donner_name FROM `posts`
    LEFT JOIN categories ON posts.category_id=categories.id 
    LEFT JOIN donners ON posts.donner_id=donners.id WHERE `status`='1' ORDER by id DESC";
        
    $posts = $db->getData($query);
    include 'include/_sidebar.php';

?>
<div class= container>
<div class="col-md-8 offset-md-2">
<div class="card">
        <div class="card-header">
            <h3 class="card-title">Received Post list</h3><br>
            
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Post ID</th>
                        <th>Title</th>
                        <th>Content</th>
                        
                        <th>Created At</th>
                        <th>Donner</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                         
                        if($posts){
                            while($post = $posts->fetch_assoc()) {
                                
                                ?>
                                    <tr>
                                       <td><?php echo $post['id']; ?></td>
                                       <td><?php echo $post['title']; ?></td>
                                       <td><?php echo $post['content']; ?></td>
                                       
                                      
                                       <td><?php $d=strtotime($post['created_at']); echo date("d M, Y",$d); ?></td>
                                       <td><?php echo $post['donner_name']; ?></td>
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
  <?php
   
    include 'include/footer.php';
?>