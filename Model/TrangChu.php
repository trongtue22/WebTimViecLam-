<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tìm Việc</title>
    <!-- Link connect to bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Here is java code to help pop-up form to run up -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"> </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script> 
  </head>

  <body>
  <!-- Navbar start here -->
    <nav class="navbar navbar-light" style="background-color: #ccc;">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Tổng hợp WEB tìm việc làm</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <!-- Item for Navbar menu -->
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <!-- End of navbar -->
    
  <h2 h2 style="text-align: center;">Danh sách trang web tìm việc </h2> 
    
  <!-- Update for data Pop-up button  -->
  <div class="container my-3">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
            Thêm mới
        </button>
  </div> 
  
  <!-- The start of table data -->
    <!-- Set up the table position-->
  <div class="container my-4">
  
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col" style="border-bottom: 1px solid black;">STT</th>
          <th scope="col" style="border-bottom: 1px solid black;">Tên</th>
          <th scope="col" style="border-bottom: 1px solid black;">Link</th>
          <th scope="col" style="border-bottom: 1px solid black;">Mô Tả</th>
          <th scope="col" style="border-bottom: 1px solid black;"></th>
        </tr>
      </thead>
      <!-- Table of Real Data SQL -->
      <tbody>
         <?php 
            // Call the connection from Foler Model => So we can call $Conn out 
            include('../Model/connection.php');

                /* 
                Put a [Select query] into the BD by $Conn (BD information)
                 => Select all the data out of the table  
                We want SQl query to execute but it have to had a location/place to do that 
                 => So $conn is the location where it gonna go to take the data from 
                */ 
            $result = mysqli_query($conn, "SELECT * FROM bangthongtin");
           
           // if we can't get the data from the DB:
           if(!$result)
           {
             die("Server có trục trặc");
           }

            /* 
              + Using mysqli_fetch_assoc(...) => Take all the data from DB translate it into Associative-Array
              + $row: is a name for that Associative-Array
              + Each loop we using $row[name] to print out the value in the array
              + name: is index to call the value in array  
              + Since we $row[name] already inside Echo " " that have  " " so we don't need to write $row["name"]
            */
             $dem = 0;
             while ($row = mysqli_fetch_assoc($result)) 
             { 
                $dem = $dem + 1;        
                 echo
                 "            
                    <tr>  
                        <th>    $dem         </th>
                        <td>     $row[name]  </td>                     
                        <td>
                           <a href='$row[link]' target='_blank'> $row[link]  </a>
                        </td>
                        <td>     $row[description]    </td> 
                        <td>
                        <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#update_form'>
                              Cập nhật
                        </button>
                        <a class='btn btn-danger' href='../Controller/delete.php?id=$row[id]'> Xóa</a>
                        </td>
                    </tr>
                  ";
             } 
         ?> 
      </tbody>
      <!--The end of SQL table-->

    </table>
  <div>
  <!-- The end of table -->

    
  <!--################################################################################ This the start of Pop-Up form #########################################################################################################-->
  <div class="modal fade" id="exampleModal">
    <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title">
                  Thêm trang web mới
             </h5>
        <button type="button" class="close"
          data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            ×
          </span>
        </button>
       </div>
    <div class="modal-body">
        <!-- Take data from user  -->
        <form action="../Controller/create.php" method="POST">
           <div class="form-group">
            <label for="website-name">Tên trang web</label>
            <input type="text" class="form-control" id="website-name" name="website-name"  required>
          </div>
          <div class="form-group">
            <label for="website-link">Liên kết trang web</label>
            <input type="url" class="form-control" id="website-link" name="website-link"  required>
          </div>
          <div class="form-group">
            <label for="website-description">Mô tả trang web</label>
            <textarea class="form-control" id="website-description" name="website-description"  required></textarea>
          </div>
           <div class="modal-footer">
            <button type="button" class="btn btn-secondary"
              data-dismiss="modal">
              Hủy
            </button>
            <!-- When user click button, data will be submit into Action="../Controller/create.php" -->
            <button type="submit" name ="submitdata" class="btn btn-primary">
              Thêm
            </button>
           </div>
         </form>
        <!-- End of form  -->
       </div>
     </div>
      </div>
  </div>
  <!--#####################################################################################This the end of pop up ##############################################################################################-->






  <!--############################################################################################## This the start of update pop-up #######################################################################################-->
  <!-- Shit! I REALLY WANT TO REMOVE THIS TO ANOTHER FILE -->
  <?php 
       include('../Model/connection.php');
       $result = mysqli_query($conn, "SELECT * FROM bangthongtin");
       while ($row = mysqli_fetch_assoc($result)) 
       { 
         echo 
         "         
         <div class='modal fade' id='update_form'>
         <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                  <h5 class='modal-title'>
                       Cập nhật
                  </h5>
             <button type='button' class='close'
               data-dismiss='modal' aria-label='Close'>
               <span aria-hidden='true'>
                 ×
               </span>
             </button>
            </div>
         <div class='modal-body'>
             <!-- Take data from user  -->
             <form action='../Controller/update.php' method='POST'>
             <input type='hidden' class='form-control' id='website-name' name='website-id' value='$row[id]' required>
                <div class='form-group'>
                 <label for='website-name'>Tên trang web</label>
                 <input type='text' class='form-control' id='website-name' name='website-name' value='$row[name]' required>
               </div>
               <div class='form-group'>
                 <label for='website-link'>Liên kết trang web</label>
                 <input type='url' class='form-control' id='website-link' name='website-link'  value='$row[link]' required>
               </div>
               <div class='form-group'>
                 <label for='website-description'>Mô tả trang web</label>
                 <input type='text' class='form-control' id='website-description' name='website-description'  value='$row[description]'  required></textarea>
               </div>
                <div class='modal-footer'>
                 <button type='button' class='btn btn-secondary'
                   data-dismiss='modal'>
                   Hủy
                 </button>
                 <!-- When user click button, data will be submit into Action='../Controller/create.php' -->
                 
                 <button type='submit' class='btn btn-primary' name ='updatedata'>
                   Cập nhật
                 </button>

                </div>
              </form>
             <!-- End of form  -->
            </div>
          </div>
       </div>
     </div> 
     ";}
    ?>
    <!--################################################################################################################## End #####################################################################################-->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
