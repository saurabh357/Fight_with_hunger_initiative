<?php
    $conn = new mysqli('localhost', 'root', '', 'project');
    
    // get disrtict by division id
    if (isset($_POST['division_id'])) {
        $id = $_POST['division_id'];
        
        $run  = $conn->query("SELECT * FROM receivers WHERE division_id='$id'");
        $output  = '';

        if ($run->num_rows > 0) {            
            $output .= '<option value="">Select Receiver</option>';

            while($recv = $run->fetch_assoc()){
                $output .= '<option value="'.$recv['id'].'">'.$recv['name'].'</option>';
            }
        } else {
            $output .= '<option value="">No Receiver Found</option>';
        }

        echo $output;
    }

    // get upazilla by district id
    if (isset($_POST['district_id'])) {
        $id = $_POST['district_id'];
        
        $run  = $conn->query("SELECT * FROM receivers WHERE district_id='$id'");
        $output  = '';

        if ($run->num_rows > 0) {            
            $output .= '<option value="">Select Receiver</option>';

            while($recv = $run->fetch_assoc()){
                $output .= '<option value="'.$recv['id'].'">'.$recv['name'].'</option>';
            }
        } else {
            $output .= '<option value="">No Receiver Found</option>';
        }

        echo $output;
    }
      // get uion by upazila id
      if (isset($_POST['upazilla_id'])) {
        $id = $_POST['upazilla_id'];
        
        $run  = $conn->query("SELECT * FROM receivers WHERE upazilla_id='$id'");
        $output  = '';

        if ($run->num_rows > 0) {            
            $output .= '<option value="">Select Receiver</option>';

            while($recv = $run->fetch_assoc()){
                $output .= '<option value="'.$recv['id'].'">'.$recv['name'].'</option>';
            }
        } else {
            $output .= '<option value="">No Receiver Found</option>';
        }

        echo $output;
    }
?>