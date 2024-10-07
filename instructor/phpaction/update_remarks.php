<?php
    include('../../dbconn.php');
    include('../session.php'); 
    if (isset($_POST['submit_remarks'])){

        $file_id= mysqli_real_escape_string($conn,$_POST['file_id']);
        $student_id = mysqli_real_escape_string($conn,$_POST['student_id']);
        $remarks = mysqli_real_escape_string($conn,$_POST['remarks']);

        $query = "UPDATE file_db SET
                remarks = '".$remarks."'
                WHERE file_id  = '$file_id'";

        if ($conn->query($query) === TRUE) {
        $_SESSION['success'] = 'Remarks Update Sucessfully!';
        ?>
        <script>
            window.location.href = "../student_info.php?id=<?php echo $student_id; ?>";
        </script>
        <?php
        } else {
        echo "Error: " . $query . "<br>" . $conn->error;
        $_SESSION['success'] = 'Error!';
        ?>
        <script>
            window.location.href = "../student_info.php?id=<?php echo $student_id; ?>";
        </script>
        <?php
        }

    }
?>