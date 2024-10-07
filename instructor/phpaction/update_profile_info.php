<?php
    include('../../dbconn.php');
    include('../session.php'); 
    if (isset($_POST['submit_info'])){

        $emp_id= mysqli_real_escape_string($conn,$_POST['emp_id']);
        $fname = mysqli_real_escape_string($conn,$_POST['fname']);
        $mname = mysqli_real_escape_string($conn,$_POST['mname']);
        $lname = mysqli_real_escape_string($conn,$_POST['lname']);
        $contact_no = mysqli_real_escape_string($conn,$_POST['contact_no']);
        $address = mysqli_real_escape_string($conn,$_POST['address']);
        $dob = mysqli_real_escape_string($conn,$_POST['dob']);
        $sex = mysqli_real_escape_string($conn,$_POST['sex']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);

        $query = "UPDATE instructor_db SET
                f_name = '".$fname."',
                m_name = '".$mname."',
                l_name = '".$lname."',
                contact_no = '".$contact_no."',
                address = '".$address."',
                dob = '".$dob."',
                email = '".$email."',
                sex = '".$sex."'
                WHERE emp_id  = '$emp_id'";

        if ($conn->query($query) === TRUE) {
        $_SESSION['success'] = 'Information Update Sucessfully!';
        ?>
        <script>
            window.location.href = "../index.php";
        </script>
        <?php
        } else {
        echo "Error: " . $query . "<br>" . $conn->error;
        $_SESSION['success'] = 'Error!';
        ?>
        <script>
            window.location.href = "../index.php";
        </script>
        <?php
        }

    }
?>