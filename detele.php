<?php 
    // Call the connection => $Conn
    include('../Model/connection.php');

    // Get id from button delete
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $query = "DELETE FROM `bangthongtin` WHERE id=$id";
        $query_run = mysqli_query($conn,$query);
        if($query_run)
        { 
            echo "<script> alert('Xóa thành công'); </script>";
            // Translate the page back to TrangChu.php after we detele data  
            header("Location:../View/TrangChu.php");
        }
        else
        {
            echo "<script> alert('Xóa thất bại'); </script>";
        }
    }














?>
