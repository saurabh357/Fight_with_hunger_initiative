<?php 
   $page_title = '';
    include dirname(__FILE__). '/include/header.php';
    $db = new Database();
  $query = "SELECT id,name,coment,created_at FROM comments";
    $posts = $db->getData($query);
  // ver_dump(query);
  // die();
?>

<div class="card">
        <div class="card-header">
            <h3 class="card-title">Contacted list</h3><br>
            <div class="card-header-action">
    
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Comment</th>
                        <th>Comment Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($posts) {
                            while($post = $posts->fetch_assoc()) {
                                ?>
                                    <tr>
                                       <td><?php echo $post['id']; ?></td>
                                       <td><?php echo $post['name']; ?></td>
                                       <td><?php echo $post['coment']; ?></td>
                                       <td><?php echo $post['created_at']; ?></td>
                                    </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td>No Comment found</td>
                            </tr>
                        <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
   
    // header footer
    include 'include/footer.php';
?>