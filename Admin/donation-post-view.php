<?php
    $page_title = 'Posts list';
  
    include dirname(__FILE__). '/include/header.php';
  
   // session_start();
    $db = new Database();
    
    $query = "SELECT posts.*, categories.name as category_name, donners.name as donner_name FROM `posts`
            LEFT JOIN categories ON posts.category_id=categories.id 
            LEFT JOIN donners ON posts.donner_id=donners.id ORDER by id DESC";
    $posts = $db->getData($query);
    
    //var_dump($query) ; die();
?>

<div class="card">
        <div class="card-header">
            <h3 class="card-title">Post list</h3><br>
            <div class="card-header-action">
                <a href="report.php" class="btn btn-primary">Report</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($posts) {
                            while($post = $posts->fetch_assoc()) {
                                ?>
                                    <tr>
                                       <td><?php echo $post['id']; ?></td>
                                       <td><?php echo $post['title']; ?></td>
                                       <td><?php echo $post['category_name']; ?></td>
                                       <td><?php echo $post['content']; ?></td>
                                       
                                       <td><img src="../donner/uploads/<?php echo $post['photo']; ?>"></td>
                                       <td><?php $d=strtotime($post['created_at']); echo date("d M, Y",$d); ?></td>
                                      <td><a class="fa fa-trash" href="delete-post.php?delete=<?php echo $post['id']; ?>">Delete</a>
                                      </td>
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

    // footer include
    include dirname(__FILE__). '/include/footer.php';
?>