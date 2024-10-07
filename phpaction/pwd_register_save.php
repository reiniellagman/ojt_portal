<?php
include('../dbconn.php');
if (isset($_POST['register'])){
    $fname= mysqli_real_escape_string($conn, $_POST['fname']);
    $mname= mysqli_real_escape_string($conn,$_POST['mname']);
    $lname= mysqli_real_escape_string($conn,$_POST['lname']);
    $dob= mysqli_real_escape_string($conn, $_POST['dob']);
    $b_place= mysqli_real_escape_string($conn, $_POST['b_place']);
    $age= mysqli_real_escape_string($conn,$_POST['age']);
    $sex= mysqli_real_escape_string($conn,$_POST['sex']);
    $contact_no= mysqli_real_escape_string($conn, $_POST['contact_no']);
    $address_blk= mysqli_real_escape_string($conn,$_POST['address_blk']);
    $address_municipality= mysqli_real_escape_string($conn, $_POST['address_municipality']);
    $address_province= mysqli_real_escape_string($conn,$_POST['address_province']);
    $civil_stats= mysqli_real_escape_string($conn,$_POST['civil_stats']);
    $religion= mysqli_real_escape_string($conn, $_POST['religion']);
    $blood_type= mysqli_real_escape_string($conn,$_POST['blood_type']);
    $ph_id= mysqli_real_escape_string($conn,$_POST['ph_id']);
    $tin_id= mysqli_real_escape_string($conn,$_POST['tin_id']);
    $emp_stats= mysqli_real_escape_string($conn,$_POST['emp_stats']);
    $educ_attainment= mysqli_real_escape_string($conn,$_POST['educ_attainment']);
    $emergency_contact_person= mysqli_real_escape_string($conn,$_POST['emergency_contact_person']);
    $emergency_contact_no= mysqli_real_escape_string($conn,$_POST['emergency_contact_no']);
    $valid_id= mysqli_real_escape_string($conn,$_POST['valid_id']);
    $id_number= mysqli_real_escape_string($conn,$_POST['id_number']);
    $email_add= mysqli_real_escape_string($conn,$_POST['email_add']);
    $disabality= mysqli_real_escape_string($conn,$_POST['disabality']);
    $username= mysqli_real_escape_string($conn,$_POST['username']);
    $password= mysqli_real_escape_string($conn,$_POST['password']);
    $confirm_password= mysqli_real_escape_string($conn,$_POST['confirm_password']);

    $pwd_duplicate="SELECT*FROM pwd_db WHERE username = '$username' OR email_address = ' $email_add'";
    $pwd_result = mysqli_query($conn, $pwd_duplicate);

    $sc_duplicate="SELECT*FROM sc_db WHERE username = '$username' OR email_address = ' $email_add'";
    $sc_result = mysqli_query($conn, $sc_duplicate);

    $admin_duplicate="SELECT*FROM admin_db WHERE username = '$username'";
    $admin_result = mysqli_query($conn, $admin_duplicate);
    
    $files_image = $_FILES['file_image'];
    $file_name_image=$_FILES['file_image']['name'];
    $file_size_image=$_FILES['file_image']['size'];
    $file_error_image=$_FILES['file_image']['error'];
    $file_temp_loc_image=$_FILES['file_image']['tmp_name'];
    $file_store_image = "../uploaded_file/Profile/".$file_name_image; // file directory for saving

    $fileActualExt_image = strtolower(substr($file_name_image, strpos($file_name_image,'.'), strlen($file_name_image)-1)); //get the extention in lower case

    $files_mc = $_FILES['file_mc'];
    $file_name_mc=$_FILES['file_mc']['name'];
    $file_size_mc=$_FILES['file_mc']['size'];
    $file_error_mc=$_FILES['file_mc']['error'];
    $file_temp_loc_mc=$_FILES['file_mc']['tmp_name'];
    $file_store_mc = "../uploaded_file/File/".$file_name_mc; // file directory for saving

    $fileActualExt_mc = strtolower(substr($file_name_mc, strpos($file_name_mc,'.'), strlen($file_name_mc)-1)); //get the extention in lower case

    $allow = array('.jpg', '.jpeg', '.gif', '.png'); // only allowed extention

    $allow_mc = array('.pdf'); // only allowed extention

    if (in_array($fileActualExt_image, $allow)){ // if the extention are within the allow extention, it will proceed on checking if there's error on file
        if($file_error_image === 0){ // if the file has no error it will proceed to uploading the file to the designated directory
            if(move_uploaded_file($file_temp_loc_image, $file_store_image)){ // if the file is successfully uploaded to the directory, data will save to DB
                $query_image = "INSERT
                INTO uploaded_file (
                    username,
                    file_name,
                    file_directory,
                    file_type) VALUES (
                        '$username',
                        '$file_name_image',
                        '$file_store_image',
                        '1')";
                $conn->query($query_image);
            }
            else{
                ?>
                <script>
                    alert('Unable to Upload Image');
                    // window.location = '../register_pwd.php';  
                </script>
                <?php
            }
        }else{
            ?>
            <script>
                alert('Unable to Upload Image');
                // window.location = '../register_pwd.php.php';  
            </script>
            <?php
        }
    }else{
        ?>
        <script>
            alert('File type is not supported');
            // window.location = '../register.php';  
        </script>
        <?php
    }

    if (in_array($fileActualExt_mc, $allow_mc)){ // if the extention are within the allow extention, it will proceed on checking if there's error on file
        if($file_error_mc === 0){ // if the file has no error it will proceed to uploading the file to the designated directory
            if(move_uploaded_file($file_temp_loc_mc, $file_store_mc)){ // if the file is successfully uploaded to the directory, data will save to DB

                $query_mc = "INSERT
                INTO uploaded_file (
                    username,
                    file_name,
                    file_directory,
                    file_type) VALUES (
                        '$username',
                        '$file_name_mc',
                        '$file_store_mc',
                        '2')";
                $conn->query($query_mc);
            }
            else{
                ?>
                <script>
                    alert('Unable to Upload Image');
                    // window.location = '../register_pwd.php';  
                </script>
                <?php
            }
        }else{
            ?>
            <script>
                alert('Unable to Upload Image');
                // window.location = '../register_pwd.php';  
            </script>
            <?php
        }
    }else{
        ?>
        <script>
            alert('File type is not supported');
            window.location = '../register_pwd.php';  
        </script>
        <?php
    }


    if(mysqli_num_rows($pwd_result)>0 || mysqli_num_rows($sc_result)>0 || mysqli_num_rows($admin_result)>0){
        ?>
        <script>
            alert('username or email has already taken!');
            window.location = "../register_pwd.php";
        </script>
        <?php
    }
    else{
        if($password != $confirm_password){
            ?>
            <script>
                alert('password does not match!');
                window.location = "../register_pwd.php";
            </script>
            <?php
        }
        else
        {
            $query = "INSERT
            INTO pwd_db (
                first_name,
                middle_name,
                last_name,
                dob,
                age,
                gender,
                birth_place,
                civil_status,
                blood_type,
                ph_id,
                tin_id,
                religion,
                contact_number,
                email_address,
                province,
                city_town,
                address,
                educational_attainment,
                employment_status,
                contact_person,
                contact_person_no,
                valid_id,
                id_number,
                disability,
                username,
                password,
                status) VALUES (
                    '$fname',
                    '$mname',
                    '$lname',
                    '$dob',
                    '$age',
                    '$sex',
                    '$b_place',
                    '$civil_stats',
                    '$blood_type',
                    '$ph_id',
                    '$tin_id',
                    '$religion',
                    '$contact_no',
                    '$email_add',
                    '$address_province',
                    '$address_municipality',
                    '$address_blk',
                    '$educ_attainment',
                    '$emp_stats',
                    '$emergency_contact_person',
                    '$emergency_contact_no',
                    '$valid_id',
                    '$id_number',
                    '$disabality',
                    '$username',
                    '$password',
                    'Pending')";
            if ($conn->query($query) === TRUE) {

                $emails = $email_add;
                $app_pass = "hbxrrhvidjepkgvr";
                $email_sender = "ehap@nha.gov.ph";

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
                $Correo->Subject = "PWD IDENTIFICATION CARD APPLICATION REQUEST COMPLETED";
                $Correo->Body = "<P>Hi good day!</P>
                                <P>You have successfully registered for application for PWD Identification Assistance. Bellow are your details for login on your account</P>
                                <P>Username: <B>".$username."</B></P>
                                <P>Full Name: <B>".$fname." ".$mname." ".$lname."</B></P>
                                <P>Access Type: <B>PWD</B></P>
                                <P>Current Status: <B>Pending</B></P>
                                <P></P>
                                <P>If you want to update your personal information, please visit 'https://pwdsc.000webhostapp.com/' and just login using your account.</P>
                                <P></P>
                                <P>Thank you!</P>
                                <P></P>
                                <P>Best regards,</P>
                                <P>PWD SC IDentification Card Administration</P>
                                <P></P>
                                <P></P>
                                <P></P>
                                <P></P>
                                <P></P>
                                <P></P>
                                <P>*** This is a system generated message. DO NOT REPLY TO THIS EMAIL.***</P>";

                $Correo->IsHTML (true);

                if ($Correo->Send()) {
                    ?>
                    <script>
                        alert('Sucessfully Registered! You may check your registered email for status update!');
                        window.location = "../register_pwd.php";
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        alert('Error in saving!');
                        window.location = "../register_pwd.php";
                    </script>
                    <?php
                }
            } else {
                echo "Error: " . $query . "<br>" . $conn->error;
                ?>
                <script>
                    alert('Error in saving!');
                </script>
                <?php
            }
        }
    }
}
?>