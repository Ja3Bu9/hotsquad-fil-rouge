<?php
  session_start();

 
require('config.php');
require('class.php');

if(!isset($_SESSION["username"])){
    header("Location: home.php");

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="style/style.css">
</head>

<body >



    <div class="container-fluid logobarback d-flex justify-content-start align-items-center ">
        <a href="home.php">
            <img class="logofilrouge" src="img/logofilrouge.png" alt="logobar" >
        </a>

        <div class="d-flex justify-content-end align-items-center " style="position: absolute;right: 1rem;">

        
<?php

$sql = "SELECT * FROM user WHERE id = '{$_SESSION[ "id" ]}'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
            ?>
<h6 style="margin: 0.3em;"><?php echo $user['username'] ?></h6>
            
            <div class="userpicb" style="background-image: url('upload/user/<?php echo $user['photo'] ?>');" ></div>

              <div class="btn-group">
                <button type="button" style="background-color: transparent;border: none;" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.php">Profile</a>
                    <a class="dropdown-item" href="logout.php">Disconnect</a>
                </div>
              </div>



</div>

</div>





</div>

<?php
if($_SESSION['role'] == 'user'){
echo'<div class="nobackoffice" style="display:flex">
<h1>You are not an Admin </h1>



</div>';
}else{ ?>

   <div class="nobackoffice">
     <h1>You Cant access to the backoffice</h1>
   </div>


    <div class="backoffice">






    <div class="container-fluid containerback">
        <div class="row">
            <div class="col-2 backend" style="padding: 0;">
                
              <a href="backoffice user.php" class="d-flex container-fluid justify-content-start align-items-center backusers" >
                  <i class='fas fa-users' ></i>
                  <h4>Users</h4>
              </a>
              <a href="backoffice posts.php" class="d-flex container-fluid justify-content-start align-items-center backposts">
                  <i class='fas fa-edit' ></i>
                  <h4>Posts</h4>
              </a>
              <a href="backoffice comments.php" class="d-flex container-fluid justify-content-start align-items-center backcomts">
                  <i class='fas fa-comments' ></i>
                  <h4>Comments</h4>
              </a>
              <a href="#" class="d-flex container-fluid justify-content-start align-items-center backcats" style="background: #576173;
              ">
                  <i class='fa fa-th-large' ></i>
                  <h4>Categories</h4>
              </a>
              <a href="backoffice ads.php" class="d-flex container-fluid justify-content-start align-items-center backcats" >
                <i class='fas fa-bullhorn' ></i>
                <h4>Ads</h4>
            </a>
              
            </div>




            <div class="col-10";>



                
               
               <div class="bgback " style="padding-top: 10px; padding-bottom: 10px;">
                <div class="row d-flex justify-content-end align-items-center">
                    <div class="col-3 d-flex justify-content-end align-items-center">
                        <hr>
                </div>
                    <div class="col-3 d-flex justify-content-center align-items-center">
                        <h1>Categories</h1>
                    </div>
                    <div class="col-6 d-flex justify-content-end align-items-center">
                            <hr>
                    </div>
                </div>
            </div>
            <div class="bg" style="padding-bottom: 10px; margin: 0;background-color: #292E38; ">
               
                
               
                <table class="table" id="myTable">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th >Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php 

$sql = "SELECT * FROM category";
$result = $conn->query($sql);
while($category = $result->fetch_assoc() ) { 

                    ?>

                      <tr>
                      <td class="d-flex justify-content-center align-items-center"><div class="userpic" style="background-image: url(upload/categorys/<?php echo $category['photo'] ?>);"></div><span><?php echo $category['name'] ?></span></td>

                        
                        <td><a href="backoffice%20categories%20update.php?editcategory=<?php echo $category['id'] ?>"><i class="fas fa-edit"></i></a></td>
                        <td><a href="backoffice%20categories.php?delcategory=<?php echo $category['id'] ?>"><i class="fas fa-trash-alt"></i></a></td>
                      </tr>
                      
                      
<?php } ?>    
                    </tbody>
                  </table>

                 
               
                    
                

                    
                
            </div>
            <div class="d-flex justify-content-center align-items-center">
              <a  href="backoffice categories add.php" style="width: 200px;text-align: center;margin:20px;background-color: #292E38;padding: 15px;border-radius: 10px;">ADD Categry</a>
            </div>
            
            </div>
        </div>
    </div>

    <script>
      $('#myTable').DataTable();
      </script>






















    <img class="bg-top" src="img/bg-top.png" alt="bg-top">
  </div>
</body>

</html>
<?php } ?>
