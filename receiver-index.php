<?php
    $page_title = 'Home';
    // header include
    include 'include/header.php';
    if (isset($_SESSION['user_id'])) {
      $id = $_SESSION['user_id'];
    }
    // header include
    include 'include/_sidebar.php';
?>
<div class=container>
<div style="background-image: url('/images/receiver.jpg');"></div>
</div>
<?php
    
    // header footer
    include 'include/footer.php';
?>