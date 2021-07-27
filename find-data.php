<?php
    $conn = new mysqli('localhost', 'root', '', 'project');
    
    // get disrtict by division id
    if (isset($_POST['division_id'])) {
        $id = $_POST['division_id'];
        
        $run  = $conn->query("SELECT * FROM districts WHERE division_id='$id'");
        $output  = '';

        if ($run->num_rows > 0) {            
            $output .= '<option value="">Select Districts</option>';

            while($dist = $run->fetch_assoc()){
                $output .= '<option value="'.$dist['id'].'">'.$dist['name'].'</option>';
            }
        } else {
            $output .= '<option value="">No Districts Found</option>';
        }

        echo $output;
    }

    // get upazilla by district id
    if (isset($_POST['district_id'])) {
        $id = $_POST['district_id'];
        
        $run  = $conn->query("SELECT * FROM upazilas WHERE district_id='$id'");
        $output  = '';

        if ($run->num_rows > 0) {            
            $output .= '<option value="">Select Upazilla</option>';

            while($upazila = $run->fetch_assoc()){
                $output .= '<option value="'.$upazila['id'].'">'.$upazila['name'].'</option>';
            }
        } else {
            $output .= '<option value="">No Upazilla Found</option>';
        }

        echo $output;
    }
      // get uion by upazila id
      if (isset($_POST['upazilla_id'])) {
        $id = $_POST['upazilla_id'];
        
        $run  = $conn->query("SELECT * FROM unions WHERE upazilla_id='$id'");
        $output  = '';

        if ($run->num_rows > 0) {            
            $output .= '<option value="">Select Union</option>';

            while($union = $run->fetch_assoc()){
                $output .= '<option value="'.$union['id'].'">'.$union['name'].'</option>';
            }
        } else {
            $output .= '<option value="">No Union Found</option>';
        }

        echo $output;
    }
?>