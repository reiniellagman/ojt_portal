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
    $query = "SELECT * FROM instructor_db WHERE emp_id = '$session_id'";
    $result = mysqli_query($conn, $query);
    while($row_info = mysqli_fetch_assoc($result)) {
        $emp_id = $row_info['emp_id'];
        $_SESSION['emp_id'] = $emp_id;
    }
}
?>