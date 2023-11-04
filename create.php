<?php 
    // Call the connection => $Conn
    include('../Model/connection.php');
    
    // When user click on submit button on pop-up form 
    if(isset($_POST['submitdata']))
    {
        $name =  $_POST['website-name'];
        $link = $_POST['website-link'];
        $description = $_POST['website-description'];
        $picture = $_POST['website-image'];
        $query = "INSERT INTO `bangthongtin`(`name`, `link`, `description`,`picture`) VALUES ('$name','$link','$description','$picture')";
        $query_run = mysqli_query($conn,$query);

        // If we insert into DB success
        if($query_run)
        { 
            echo "<script> alert('Thêm mới thành công'); </script>";
            // Translate the page back to TrangChu.php after we insert data into DB 
            header("Location:../View/TrangChu.php");
        }
        else
        {
            echo "<script> alert('Thêm mới thất bại'); </script>";
        }

    }



?>
