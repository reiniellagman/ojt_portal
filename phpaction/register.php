<?php
session_start();
include('../dbconn.php');
if (isset($_POST['register_btn'])){

    $fname= mysqli_real_escape_string($conn,$_POST['fname']);
    $mname= mysqli_real_escape_string($conn,$_POST['mname']);
    $lname= mysqli_real_escape_string($conn,$_POST['lname']);
    $contact_no= mysqli_real_escape_string($conn,$_POST['contact_no']);
    $address= mysqli_real_escape_string($conn,$_POST['address']);
    $email_add= mysqli_real_escape_string($conn,$_POST['email_add']);
    $password= mysqli_real_escape_string($conn,$_POST['password']);
    $confirm_password= mysqli_real_escape_string($conn,$_POST['confirm_password']);

    $user_duplicate="SELECT * FROM user_db WHERE username = '$email_add'";
    $user_result = mysqli_query($conn, $user_duplicate);

    $profile = "profile/user.png";
    $date_registered = date("Y-m-d");

    if(mysqli_num_rows($user_result) > 0){
        $_SESSION['error'] = 'Email has already taken!';
        ?>
        <script>
            window.location = "../register.php";
        </script>
        <?php
    }else{
        if($password != $confirm_password){
            $_SESSION['error'] = 'Password does not match!';
            ?>
            <script>
                window.location = "../register.php";
            </script>
            <?php
        }
        else
        {
            $query = "INSERT
            INTO user_db (
                username,
                password,
                fname,
                mname,
                lname,
                address,
                contact_no,
                profile,
                date_registered) VALUES (
                    '$email_add',
                    '$password',
                    '$fname',
                    '$mname',
                    '$lname',
                    '$address',
                    '$contact_no',
                    '$profile',
                    '$date_registered')";

            if ($conn->query($query) === TRUE) {
                $_SESSION['success'] = 'Registered Sucessfully!';
                ?>
                <script>
                    window.location.href = "../register.php";
                </script>
                <?php
            } else {
                echo "Error: " . $query . "<br>" . $conn->error;
                $_SESSION['success'] = 'Error!';
                ?>
                <script>
                    window.location.href = "../register.php";
                </script>
                <?php
            }
        }
    }
}
?>