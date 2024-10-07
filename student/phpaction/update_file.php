<?php
include('../../dbconn.php');
include('../session.php'); 

if (isset($_POST['update_file'])){
    $file_id= mysqli_real_escape_string($conn,$_POST['file_id']);

    $files_files = $_FILES['file_edit'];
    $file_name_files=$_FILES['file_edit']['name'];
    $file_size_files=$_FILES['file_edit']['size'];
    $file_error_files=$_FILES['file_edit']['error'];
    $file_temp_loc_files=$_FILES['file_edit']['tmp_name'];
    $file_store_files = "../../uploaded_files/".$file_name_files; // file directory for saving
    $file_directory = "../uploaded_files/".$file_name_files; // file directory for saving

    $fileActualExt_file = strtolower(substr($file_name_files, strpos($file_name_files,'.'), strlen($file_name_files)-1)); //get the extention in lower case

    $allow = array('.pdf'); // only allowed extention

    if (in_array($fileActualExt_file, $allow)){ // if the extention are within the allow extention, it will proceed on checking if there's error on file
        if($file_error_files === 0){ // if the file has no error it will proceed to uploading the file to the designated directory
            if(move_uploaded_file($file_temp_loc_files, $file_store_files)){ // if the file is successfully uploaded to the directory, data will save to DB
                
                $query_image = "UPDATE file_db SET
                    file_name = '$file_name_files',
                    file_directory = '$file_directory'
                    WHERE file_id  = '$file_id'";
                    if ($conn->query($query_image) === TRUE) {
                        $_SESSION['success'] = 'Successfully Updated the File!';
                        ?>
                        <script>
                            window.location = "../index.php";
                        </script>
                        <?php
                    } else {
                        echo "Error: " . $query . "<br>" . $conn->error;
                        ?>
                        <script>
                            alert('Error in saving!');
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