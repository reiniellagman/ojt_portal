<?php
session_start();
include('../dbconn.php');

if (isset($_POST['login_btn'])){
    $username= mysqli_real_escape_string($conn,$_POST['username']);
    $password= mysqli_real_escape_string($conn,$_POST['password']);

    $user_query="SELECT*FROM student_db WHERE student_id = '$username'";
    $user_result = mysqli_query($conn, $user_query);
    while($row_info = mysqli_fetch_assoc($user_result)) {
        $user_password = $row_info['password'];
        $user_id = $row_info['student_id'];
    }

    $admin_user="SELECT*FROM instructor_db WHERE emp_id = '$username'";
    $admin_result = mysqli_query($conn, $admin_user);
    while($row_info = mysqli_fetch_assoc($admin_result)) {
        $instructor_password = $row_info['password'];
        $emp_id = $row_info['emp_id'];
    }

    $_SESSION['username']=$username;
    $_SESSION['password']=$password;

    if(mysqli_num_rows($user_result) > 0){
        if($user_password != $password){
            $_SESSION['error'] = 'Incorrect Password!';
            ?>
            <script>
                window.location = "../index.php";
            </script>
            <?php
        }else{
            $_SESSION['success'] = 'Welcome Back!';
            $_SESSION['id'] = $user_id;
            ?>
            <script>
                window.location = "../student/index.php";
            </script>
            <?php
        }
    }elseif(mysqli_num_rows($admin_result) > 0){
        if($instructor_password != $password){
            $_SESSION['error'] = 'Incorrect Password!';
            ?>
            <script>
                window.location = "../index.php";
            </script>
            <?php
        }else{
            $_SESSION['success'] = 'Welcome Back!';
            $_SESSION['id'] = $emp_id;
            ?>
                <script>
                    window.location = "../instructor/index.php";
                </script>
            <?php
        }
    }else{
        $_SESSION['error'] = 'User is not registered';
        ?>
        <script>
            window.location = "../index.php";
        </script>
        <?php
    }
}
?>