<?php 

    include dirname(__FILE__). '/includes/header.php';
    $db = new Database();     
    $donner_id = $_SESSION['donner_id'];
   
    $query = "SELECT received_post.*, posts.*, receivers.name as receiver_name FROM received_post 
                LEFT JOIN posts on posts.id=received_post.post_id 
                LEFT JOIN receivers ON receivers.id=received_post.receiver_id 
                WHERE posts.donner_id='$donner_id'";
        
    $posts = $db->getData($query);
  

?>

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
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Receiver</th>
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
                                       
                                       <td><img src="uploads/<?php echo $post['photo']; ?>"></td>
                                       <td><?php $d=strtotime($post['created_at']); echo date("d M, Y",$d); ?></td>
                                       <td><?php echo $post['receiver_name']; ?></td>
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
  <?php
   
    include 'includes/footer.php';
?>