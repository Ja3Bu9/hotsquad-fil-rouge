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
   <div class="nobackoffice" >
     <h1>You Cant access to the backoffice</h1>
   </div>



    <div class="backoffice">






    <div class="container-fluid containerback">
        <div class="row">
            <div class="col-2 backend" style="padding: 0;">
                
                <a href="#" class="d-flex container-fluid justify-content-start align-items-center backusers" style="background: #576173;
                ">
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
                <a href="backoffice categories.php" class="d-flex container-fluid justify-content-start align-items-center backcats">
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
                        <h1>Users</h1>
                    </div>
                    <div class="col-6 d-flex justify-content-end align-items-center">
                            <hr>
                    </div>
                </div>
            </div>
            <div class="bg" style="padding-bottom: 10px; margin: 0;background-color: #292E38;">
               
                
               
                <table class="table"  id="myTable">
                    <thead>
                      <tr>
                        <th >Name</th>
                        <th >Username</th>
                        <th >Admin</th>
                        <th >Delete</th>
                      </tr>
                    </thead>
                    <tbody>


                    <?php 

$sql = "SELECT * FROM user";
$result = $conn->query($sql);
while($user = $result->fetch_assoc() ) { 
                    ?>
                      <tr>
                        <td class="d-flex justify-content-center align-items-center"><div class="userpic" style="background-image: url(upload/user/<?php echo $user['photo'] ?>);"></div><span><?php echo $user['firstname'].' '.  $user['lastname'] ?></span></td>
                        <td >Ja3bu9</td>
                        <td><input data-target="#report<?php echo $user['id'] ?>" data-toggle="modal" type="checkbox" <?php if($user['role'] == 'admin'){ echo'checked'; } ?>>
                        
                        
                    

<div id="report<?php echo $user['id'] ?>" class="modal fade boutn" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-body">
                <button data-dismiss="modal" class="close">&times;</button>
                <h4 class="d-flex justify-content-center">Change settings ?</h4>
                
                <form method="post">
                    <input type="hidden" name="id" class="username form-control"
                         value="<?php echo $user['id'] ?>"/>
                        <input type="hidden" name="role" class="username form-control"
                         value="<?php echo $user['role'] ?>"/>
                    
                        <div class="d-flex justify-content-center">
<button type="button" class=" login" data-dismiss="modal">Close</button>

                        <input class="login btn" name="admin" type="submit" value="YES" />

                    </div>
                   
                </form>
            </div>
        </div>
    </div>
</div>
                        
                        
                        </td>
                        <td><a href="backoffice%20user.php?deluser=<?php echo $user['id'] ?>"><i class="fas fa-trash-alt"></i></a></td>
                      </tr>
                      
<?php } ?>

                    </tbody>
                  </table>
               
                    
                

                  <script>
                    $('#myTable').DataTable();
                    </script>
                
            </div>
            </div>
        </div>
    </div>
























    <img class="bg-top" src="img/bg-top.png" alt="bg-top">
  </div>
</body>

</html>

<?php } ?>