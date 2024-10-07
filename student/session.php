<?php
session_start(); 

if(!isset($_SESSION['id'])){
    error_reporting(0);
    ?>
    <script>
        window.location = "../index.php";
    </script>
    <?php
}else{

    $session_id=$_SESSION['id'];
    $query = "SELECT * FROM student_db WHERE student_id = '$session_id'";
    $result = mysqli_query($conn, $query);
    while($row_info = mysqli_fetch_assoc($result)) {
        $student_id = $row_info['student_id'];
        $_SESSION['student_id'] = $student_id;
    }
}
?>