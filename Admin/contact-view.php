<?php 
   $page_title = '';
    include dirname(__FILE__). '/include/header.php';
    $db = new Database();
  $query = "SELECT id,name,username,email,phone,message,created_at FROM contact";
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
                        <th>Company/Agency Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Message</th>
                        <th>Message Time</th>
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
                                       <td><?php echo $post['username']; ?></td>
                                       <td><?php echo $post['email']; ?></td>
                                       
                                      
                                       <td><?php echo $post['phone']; ?> </td>
                                       <td><?php echo $post['message']; ?></td>
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
    <?php
   
    // header footer
    include 'include/footer.php';
?>