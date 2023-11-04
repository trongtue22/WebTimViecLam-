<?php 
    // Call the connection => $Conn
    include('../Model/connection.php');

    // Get id from button delete
    if(isset($_POST['updatedata']))
    {
        $id = $_POST['website-id'];
        $name =  $_POST['website-name'];
        $link = $_POST['website-link'];
        $description = $_POST['website-description'];
        $query = "UPDATE `bangthongtin` SET `name`='$name',`link`='$link',`description`='$description' WHERE id=$id";
        $query_run = mysqli_query($conn,$query);
        if($query_run)
        { 
            echo "<script> alert('Cập nhật thành công'); </script>";
            // Translate the page back to TrangChu.php after we detele data  
            header("Location:../View/TrangChu.php");
        }
        else
        {
            echo "<script> alert('Cập nhật thất bại'); </script>";
        }
    }

?>
