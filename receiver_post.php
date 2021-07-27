<?php
    $page_title = 'Posts list';

    include 'include/header.php';
    $db = new Database();
    $query = "SELECT posts.*, categories.name as category_name, donners.name as donner_name FROM `posts`
            LEFT JOIN categories ON posts.category_id=categories.id 
            LEFT JOIN donners ON posts.donner_id=donners.id";
    $posts = $db->getData($query);
   /// $_SESSION['donner_id']
   // $donner_id = $_SESSION['id'];
    //var_dump($query) ; die();
    include 'include/_sidebar.php';
?>

<div class= container>
<div class="col-md-8 offset-md-2">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Post list</h3><br>
           
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
                                       
                                       <td><img src="donner/uploads/<?php echo $post['photo']; ?>"></td>
                                       <td><?php $d=strtotime($post['created_at']); echo date("d M, Y",$d); ?></td>
                                      
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