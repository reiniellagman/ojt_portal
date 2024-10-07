<?php
    error_reporting(0);
    include('../../dbconn.php');
    include('../session.php'); 
    if (isset($_POST['submit_picture'])){
        $emp_id= mysqli_real_escape_string($conn,$_POST['emp_id']);
        
        $files_image = $_FILES['file_image'];
        $file_name_image=$_FILES['file_image']['name'];
        $file_size_image=$_FILES['file_image']['size'];
        $file_error_image=$_FILES['file_image']['error'];
        $file_temp_loc_image=$_FILES['file_image']['tmp_name'];
        $file_store_image = "../../profile/".$file_name_image; // file directory for saving
        $file_directory = "../profile/".$file_name_image; // file directory for saving

        $fileActualExt_image = strtolower(substr($file_name_image, strpos($file_name_image,'.'), strlen($file_name_image)-1)); //get the extention in lower case

        $allow = array('.jpg', '.jpeg', '.gif', '.png'); // only allowed extention

        if (in_array($fileActualExt_image, $allow)){ // if the extention are within the allow extention, it will proceed on checking if there's error on file
            if($file_error_image === 0){ // if the file has no error it will proceed to uploading the file to the designated directory
                if(move_uploaded_file($file_temp_loc_image, $file_store_image)){ // if the file is successfully uploaded to the directory, data will save to DB
                    
                    $query_image = "UPDATE instructor_db SET
                    profile = '$file_directory'
                    WHERE emp_id = '$emp_id'";
                    if ($conn->query($query_image) === TRUE) {
                        $_SESSION['success'] = 'Successfully Change profile!';
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
                    $_SESSION['error'] = 'Unable to Upload Image!';
                    ?>
                    <script>
                        window.location = '../index.php';  
                    </script>
                    <?php
                }
            }else{
                $_SESSION['error'] = 'Unable to Upload Image!';
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