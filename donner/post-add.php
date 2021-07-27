<?php
    $page_title = 'Post Create';
    // header include
    include dirname(__FILE__). '/includes/header.php';

    if (isset($_SESSION['file_errors'])) {
        $file_err = $_SESSION['file_errors'];
        unset($_SESSION['file_errors']);
    }

    $query = "SELECT * FROM categories";
    $categories = $db->getData($query);
?>

    <div class="row">
        <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create Post</h3><br>
                <div class="card-header-action">
                    <a href="posts.php" class="btn btn-primary">Post List</a>
                </div>
            </div>
            <div class="card-body">

                <?php 
                    if (isset($message['success_message'])) {
                        echo '<div class="alert alert-success">'.$message['success_message'].'</div>';
                    }
                    if (isset($message['error_message'])) {
                        echo '<div class="alert alert-danger">'.$message['error_message'].'</div>';
                    }
                ?>
                <form action="submit/post-add-submit.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter post title">
                        <span class="text-danger">
                            <?php 
                                if(isset($err['title'])) {
                                    echo $err['title'];
                                }
                            ?>
                        </span>
                    </div>

                  <!--<div class="form-group">
                        <label for="">Created By</label>
                        <input type="text" name="donner_namr" class="form-control" placeholder="Enter Donner Name">
                        <span class="text-danger">
                            <?php 
                            /*  if(isset($file_err)) {
                                    echo implode(' | ', $file_err);
                                }
                               // if(isset($err['file_error'])) {
                                    $err['file_error'];
                                } */
                            ?>
                        </span>
                    </div>-->
                  
                    <div class="form-group">
                        <label for="">Upload Image</label><br>
                        <input type="file" name="image" class="form-control">
                        <span class="text-danger">
                            <?php 
                               if(isset($file_err)) {
                                echo implode(' | ', $file_err);
                            }
                            if(isset($err['file_error'])) {
                                $err['file_error'];
                            }
                            ?>
                        </span>
                    </div>




                    <div class="form-group">
                        <label for="">Content</label>
                        <textarea name="content" rows="5" class="form-control"></textarea>
                        <span class="text-danger">
                            <?php 
                                if(isset($err['content'])) {
                                    echo $err['content'];
                                }
                            ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category"  class="form-control">
                            <option value="">Select Category</option>
                            <?php
                                if ($categories) {
                                    while($category = $categories->fetch_assoc()) {
                                        ?>
                                            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                        <span class="text-danger">
                            <?php 
                                if(isset($err['category'])) {
                                    echo $err['category'];
                                }
                            ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success" type="submit" name="post_submit">Save Post</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>

<?php
    // footer include
    include dirname(__FILE__). '/includes/footer.php';
?>