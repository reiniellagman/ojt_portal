<?php
include('../../dbconn.php');
include('../session.php'); 

if (isset($_POST['upload_file'])){
    $student_id= mysqli_real_escape_string($conn,$_POST['student_id']);

    $files_files = $_FILES['file'];
    $file_name_files=$_FILES['file']['name'];
    $file_size_files=$_FILES['file']['size'];
    $file_error_files=$_FILES['file']['error'];
    $file_temp_loc_files=$_FILES['file']['tmp_name'];
    $file_store_files = "../../uploaded_files/".$file_name_files; // file directory for saving
    $file_directory = "../uploaded_files/".$file_name_files; // file directory for saving

    $fileActualExt_file = strtolower(substr($file_name_files, strpos($file_name_files,'.'), strlen($file_name_files)-1)); //get the extention in lower case

    $allow = array('.pdf'); // only allowed extention

    if (in_array($fileActualExt_file, $allow)){ // if the extention are within the allow extention, it will proceed on checking if there's error on file
        if($file_error_files === 0){ // if the file has no error it will proceed to uploading the file to the designated directory
            if(move_uploaded_file($file_temp_loc_files, $file_store_files)){ // if the file is successfully uploaded to the directory, data will save to DB
                
                $query = "INSERT
                INTO file_db (
                    file_name,
                    file_directory,
                    student_id) 
                VALUES (
                        '$file_name_files',
                        '$file_directory',
                        '$student_id')";

                if ($conn->query($query) === TRUE) {
                    $_SESSION['success'] = 'File uploaded successfully';
                    ?>
                    <script>
                        window.location = "../index.php";
                    </script>
                    <?php
                } else {
                    $_SESSION['error'] = 'Error adding on database';
                    ?>
                    <script>
                        window.location = "../index.php";
                    </script>
                    <?php
                }
            }
            else{
                $_SESSION['error'] = 'Unable to Upload File!';
                ?>
                <script>
                    window.location = '../index.php';  
                </script>
                <?php
            }
        }else{
            $_SESSION['error'] = 'Unable to Upload File!';
            ?>
            <script>
                window.location = '../index.php.php';  
            </script>
            <?php
        }
    }else{
        $_SESSION['error'] = 'File type is not supported!';
        ?>
        <script>
            window.location = '../index.php';  
        </script>
        <?php
    }
}
?>