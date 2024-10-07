<?php
session_start();
include('../dbconn.php');

if (isset($_POST['forgot_pass'])){
    $email= mysqli_real_escape_string($conn,$_POST['email']);

    $user_user="SELECT*FROM user_db WHERE username = '$email'";
    $user_result = mysqli_query($conn, $user_user);
    $row_info = mysqli_fetch_assoc($user_result);
    $user_username = $row_info['username'];
    $user_id = $row_info['user_id'];


    // script for shuffled password
    $string = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890!@#$%^&*()";

    $newpassword = substr(str_shuffle($string), 0, 8);

    if(mysqli_num_rows($user_result) > 0){

        $emails = $user_username;
        $app_pass = "wjpgwalnnchhuzuv";
        $email_sender = "reiniellagman@gmail.com";

        require_once ("../phpmailer/class.phpmailer.php");
        $Correo = new PHPMailer();
        $Correo->IsSMTP();
        $Correo->SMTPAuth = true;
        $Correo->SMTPSecure = "tls";
        $Correo->Host = "smtp.gmail.com";
        $Correo->Port = 587;
        $Correo->Username = "$email_sender";
        $Correo->Password = "$app_pass";
        $Correo->SetFrom("$email_sender","De Yo");
        $Correo->FromName = "No-Reply";
        $Correo->AddAddress("$emails");
        $Correo->Subject = "New Password Request";
        $Correo->Body = "<P>Hi good day!</P>
                        <P>You request for new password. Your new password is ".$newpassword."</P>
                        <P>For more information, please visit our website and just login using your account.</P>
                        <P></P>
                        <P>Thank you!</P>
                        <P></P>
                        <P>Best regards,</P>
                        <P>Water Refilling System Administration</P>
                        <P></P>
                        <P></P>
                        <P></P>
                        <P></P>
                        <P></P>
                        <P></P>
                        <P>*** This is a system generated message. DO NOT REPLY TO THIS EMAIL.***</P>";

        $Correo->IsHTML (true);

        $sql = "UPDATE user_db SET password='".$newpassword."' WHERE user_id=".$user_id; 

        if ($conn->query($sql) === TRUE & $Correo->Send()) {
            $_SESSION['success'] = 'New Password has been sent to your email! !';
            ?>
            <script>
                window.location.href = "../login.php";
            </script>
            <?php
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            $_SESSION['error'] = 'Error!';
            ?>
            <script>
                window.location.href = "../login.php";
            </script>
            <?php
        }
    }else{
        $_SESSION['error'] = 'Email address is not registered!';
        ?>
        <script>
            window.location.href = "../login.php";
        </script>
        <?php
    }
}
?>