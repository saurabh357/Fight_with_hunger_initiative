<?php 
   $page_title = '';
    include dirname(__FILE__). '/include/header.php';
    $db = new Database();
  $query = "SELECT id,name,email,phone,address FROM receivers";
    $posts = $db->getData($query);
  // ver_dump(query);
  // die();
?>


<div class="card">
        <div class="card-header">
            <h3 class="card-title">Registered Receiver list</h3><br>
            
        </div>
        <div class="card-header-action">
                <a href="receiver-list-print.php" class="btn btn-primary">Print Receiver List Report</a>
            </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Address</th>
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
                                       <td><?php echo $post['name']; ?></td>
                                       <td><?php echo $post['email']; ?></td>
                                       <td><?php echo $post['phone']; ?></td>
                                       <td><?php echo $post['address']; ?></td>
                                       <td>
                                           
                                           <a class="fa fa-trash" href="receiver-delete.php?delete=<?php echo $post['id']; ?>">Remove</a>
                                           
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
    $page_title = 'Home';
    // header footer
    include 'include/footer.php';
?>