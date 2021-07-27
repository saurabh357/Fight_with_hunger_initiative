<?php
    $page_title = 'Posts Detail';
  
    include dirname(__FILE__). '/include/header.php';
  
   // session_start();
    $db = new Database();

    if (isset($_GET['post_id'])) {
        $post_id = $_GET['post_id'];
    } else {
        header('location:post.php');
    }
    
    $query = "SELECT posts.*, categories.name as category_name, donners.name as donner_name FROM `posts`
            LEFT JOIN categories ON posts.category_id=categories.id 
            LEFT JOIN donners ON posts.donner_id=donners.id WHERE posts.id='$post_id'";

    $posts = $db->getData($query);
    $post = $posts->fetch_assoc();
    
    //var_dump($query) ; die();
    
    if(isset($_POST['receive_food']))
	{
       
        $status = $_POST['status'];

            $sql = "UPDATE posts SET status='$status' where posts.id='$post_id'";
            $result = $db->conn->query($sql);
    //var_dump($sql) ; die();

            if($result){
                $_SESSION['message'] = "Food Received Successfully!";
            	$_SESSION['msg_type'] = "warning";
            	header('location:post.php');
            } 
            else{
                $_SESSION['message'] = "Food Can not be Received !!";
                $_SESSION['msg_type'] = "danger";
                header('location:post.php');
            }
            $receiver_id = $_SESSION['receiver_id'];
            $insert_query = "INSERT INTO received_post (post_id,receiver_id) VALUES('$post_id', '$receiver_id')";
            $run = $db->store($insert_query);

        
         
    }
?>

<div class="container">
       
         
        
        <div class="card">                                
            <div class="card-body">
                <img class="w-100" src="donner/uploads/<?php echo $post['photo']; ?>"alt="Card image cap"></img> 
                <h5 class="card-title"><?php echo $post['title']; ?></h5>
                <h6 class="card-text"><?php echo $post['category_name']; ?></h6>
                <p class="card-text"><?php echo $post['content']?></p>
                <p class="card-text"><small class="text-muted"><?php $d=strtotime($post['created_at']); echo date("d M, Y",$d); ?></small></p>
                <form action="" method="POST">
                    <!-- <button type="submit" class="btn btn-primary" value="1"><spam>Receive</spam></button>--> 
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Want To Receive</label>
                        </div>
                        <select class="custom-select" name='status' id="inputGroupSelect01" >
                        
                        
                            
                            <option value="1">YES</option>
                            <option value="0">NO</option>
                        </select>
                        
                    </div>
                    <?php 
                  if (isset($_SESSION['id'])) {
                     ?>
                    <button type="submit" class="btn btn-primary" name="receive_food"><spam>Confirm</spam></button>
                    <?php
                  } else {
                    ?>
                    <li><a href="receiver-login.php">For Receive You Have To Login First</a></li>
                    <?php
                      }
                      ?>
                </form>
                          
                            
                        
            </div>
        </div>
    
    </div>

<?php
    // footer include
    include dirname(__FILE__). '/include/footer.php';
?>