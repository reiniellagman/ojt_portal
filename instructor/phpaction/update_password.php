<?php
    include('../../dbconn.php');
    include('../session.php'); 

    if (isset($_POST['update_pass_btn'])){
        $id= mysqli_real_escape_string($conn,$_POST['id']);
        $old_password= mysqli_real_escape_string($conn,$_POST['old_password']);
        $password= mysqli_real_escape_string($conn,$_POST['password']);
        $confirm_password= mysqli_real_escape_string($conn,$_POST['confirm_password']);
        
        $query = "SELECT * FROM instructor_db WHERE emp_id = '$id'";
        $result = mysqli_query($conn, $query);
        $row_info = mysqli_fetch_assoc($result);
        $user_password = $row_info['password'];

        if($old_password != $user_password){
            $_SESSION['error'] = 'Old Password are not match on the database';
            ?>
            <script>
                window.location = "../index.php";
            </script>
            <?php
        }else{
            if($password != $confirm_password){
                $_SESSION['error'] = 'Password and Confirm Password does not match!';
                ?>
                <script>
                    window.location = "../index.php";
                </script>
                <?php
            }else{
                $sql = "UPDATE instructor_db SET password='$password' WHERE emp_id ='$id'"; 

                if ($conn->query($sql)) {
                    $_SESSION['success'] = 'Password Changed Successfully';
                    ?>
                    <script>
                        window.location.href = "../index.php";
                    </script>
                    <?php
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                    $_SESSION['error'] = 'Error!';
                    ?>
                    <script>
                        window.location.href = "../index.php";
                    </script>
                    <?php
                }
            }
        }
    }

?>