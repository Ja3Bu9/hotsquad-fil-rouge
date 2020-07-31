<?php
  session_start();

require('config.php');
require('class.php');
if(!isset($_SESSION["id"])){
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

    <link rel="stylesheet" href="style/style.css">
</head>

<body>

<div class="container-fluid logbar">
        <div class="d-flex justify-content-end align-items-center">
            
            <?php
$sql = "SELECT * FROM user WHERE id = '{$_SESSION[ "id" ]}'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

if(!isset($_SESSION["username"])){
         
   
?>

            <!--Trigger-->
            <a class="login-trigger" href="#" data-target="#login" data-toggle="modal">Login</a>


            <div id="login" class="modal fade " role="dialog">
                <div class="modal-dialog">

                    <div class="modal-content">
                        <div class="modal-body">
                            <button data-dismiss="modal" class="close">&times;</button>
                            <h4><span>LOG</span> IN</h4>
                            <form method="post">
                                <input type="text" name="username" class="username form-control"
                                    placeholder="Username" required/>
                                <input type="password" name="password" class="password form-control"
                                    placeholder="password" required/>
                                <input class="btn login" name="log" type="submit" value="Login" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <a class="signup-trigger " href="#" data-target="#signup" data-toggle="modal">SIGNUP</a>

          


            <div id="signup" class="modal fade " role="dialog">
                <div class="modal-dialog">

                    <div class="modal-content">
                        <div class="modal-body">
                            <button data-dismiss="modal" class="close">&times;</button>
                            <h4><span>SIGN</span> UP</h4>
                            <form method="post">  
                                <input type="text" name="firstname" class="username form-control"
                                    placeholder="Firstname" required/>
                                <input type="text" name="lastname" class="username form-control"
                                    placeholder="Lastname" required/>

                                <input type="text" name="username" class="username form-control"
                                    placeholder="Username" required/>
                                <input type="email" name="email" class="username form-control" placeholder="Email" required/>

                                <input type="password" name="password" class="password form-control"
                                    placeholder="password" required/>
                                <input type="password" name="confirmpassword" class="password form-control"
                                    placeholder="Confirm Password" required/>

                                <input class="btn login" name="reg" type="submit" value="Sign Up"  />
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            

                    
                    <?php
}else {
                    ?>
<h6 style="margin: 0.3em;"><?php echo $user['username'] ?></h6>
                    
                    <div class="userpic" style="background-image: url('upload/<?php echo $user['photo'] ?>');" ></div>

                      <div class="btn-group">
                        <button type="button" style="background-color: transparent;border: none;" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="profile.php">Profile</a>
                            <a class="dropdown-item" href="logout.php">Disconnect</a>
                        </div>
                      </div>


<?php } ?>
        </div>

    </div>

    <div class="container-fluid logobar d-flex justify-content-center align-items-center" style="margin-bottom: 20px;">
        <a href="home.php" >
            <img class="logofilrouge" src="img/logofilrouge.png" alt="logobar" >

        </a>

        <i class="fas fa-search" style="position: absolute;right: 1rem;width: 16px;"></i>
    </div>

   







    <div class="container creat">
        <div class="row">
            <div class="col-8">
               
                <!-- Avatar -->
                <div class="bg " style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="row d-flex justify-content-end align-items-center">
                        <div class="col d-flex justify-content-end align-items-center">
                            <hr>
                    </div>
                        <div class="col d-flex justify-content-center align-items-center">
                            <h1>Avatar</h1>
                        </div>
                        <div class="col d-flex justify-content-end align-items-center">
                                <hr>
                        </div>
                    </div>
                </div>
                <div class="bg" style="padding-bottom: 10px; margin: 0;background-color: #292E38;">
                   
                    
                   

                   
                        <form method="post" enctype="multipart/form-data" class="d-flex justify-content-center container-fluid" style="padding-top: 10px;">
                            <input style="width: 70%;height: 24px;" type="file" id="img" name="image" accept="image/*" required>
                            <div class="">
                                <input style="width: 100%;height: 24px;background-color: #D5D5D5;" type="submit" name="editimg" value="Submit">
                            </div>
                                
                        </form>
                        <div class="d-flex justify-content-center"><h4 id="imgsuccess"></h4></div>
                    
                 
                    
                </div>
                
               <!-- Costumize Profile -->
               <div class="bg " style="padding-top: 10px; padding-bottom: 10px;">
                <div class="row d-flex justify-content-end align-items-center">
                    <div class="col d-flex justify-content-end align-items-center">
                        <hr>
                </div>
                    <div class="col d-flex justify-content-center align-items-center">
                        <h1>Costumize Profile</h1>
                    </div>
                    <div class="col d-flex justify-content-end align-items-center">
                            <hr>
                    </div>
                </div>
            </div>
            <div class="bg" style="padding-bottom: 10px; margin: 0;background-color: #292E38;">
               
                
                
                    <form method="post" class="d-flex flex-column justify-content-center align-items-center container-fluid" style="padding-top: 10px;">
                        <input type="text" name="firstname" 
                            placeholder="Firstname" />
                        <input type="text" name="lastname" 
                            placeholder="Lastname" />

                        <input type="text" name="username" 
                            placeholder="Username" />
                        <input type="email" name="email"  placeholder="Email" />

                        <h4 id="profileres"></h4>
                        <input style="width: 20%;height: 30px;;background-color: #D5D5D5;" type="submit" value="Update" name="editprofile" />
                    </form>


                    
                
                
            </div>


             <!-- Costumize Password -->
             <div class="bg " style="padding-top: 10px; padding-bottom: 10px;">
                <div class="row d-flex justify-content-end align-items-center">
                    <div class="col d-flex justify-content-end align-items-center">
                        <hr>
                </div>
                    <div class="col d-flex justify-content-center align-items-center">
                        <h1>Costumize Password</h1>
                    </div>
                    <div class="col d-flex justify-content-end align-items-center">
                            <hr>
                    </div>
                </div>
            </div>
            <div class="bg" style="padding-bottom: 10px; margin: 0;background-color: #292E38;">
               
            
                
                    <form method="post" class="d-flex flex-column justify-content-center align-items-center container-fluid" style="padding-top: 10px;">
                       
                        <input type="password" name="password" 
                            placeholder="password" required/>
                        <input type="password" name="confirmpassword" 
                            placeholder="Confirm Password" />

                            <h4 id="passwres">
                            
                            </h4>

                        <input name="editpassw" style="width: 20%;height: 30px;;background-color: #D5D5D5;" type="submit" value="Update" />
                    </form>
                
                
            </div>


            </div>




            <div class="col-4">


            <div class="bg " style="padding-top: 10px; padding-bottom: 10px;background: linear-gradient(0deg, rgba(41,46,56,1) 49%, rgba(47,53,65,1) 50%);">
                    <div class="row container-fluid profile">

                            <div class="col-5 d-flex flex-column align-items-center">
                                    <div class="userpicture" style="background-image: url('upload/<?php echo $user['photo'] ?>');">

                                    </div>
                                    <h3><?php echo $user['username'] ?></h3>



                            </div>
                            <div class="col-7" > 
                               <a href="profilesetting.php" style="position: absolute;right: -20px;"><i class='fas fa-pencil-alt' style='font-size:16px'></i></a><br> 
                               <div class="row align-items-center"><h6>Name :</h6> <h5><?php echo $user['firstname'] ?></h5></div>
                               <div class="row align-items-center"><h6>Lastname :</h6> <h5><?php echo $user['lastname'] ?> </h5></div>
                               
                               
                                <div class="col datesince d-flex flex-column align-items-center">
                                    <h6>Member Since :</h6>
                                    <h5><?php echo $_SESSION['date'] ?></h5>
                                </div>
                               


                            </div>

                    </div>

                </div>


                <!-- categories -->
                    <div class="bg " style="padding-top: 10px; padding-bottom: 10px;">
                        <div class="row d-flex justify-content-end align-items-center">
                            <div class="col-5 d-flex justify-content-end align-items-center">
                                <h1>Categories</h1>
                            </div>
                            <div class="col-7 d-flex justify-content-end align-items-center">
                                    <hr>
                            </div>
                        </div>
                    </div>
                    <div class="bg categ" style="padding-bottom: 10px; margin: 0;background-color: #292E38;">

                    <?php 
                        $sqlcat = "SELECT * FROM category";
                        $resultcat = $conn->query($sqlcat);
                        $i = 1;

                        
                        while($categ = $resultcat->fetch_assoc() ) {
                            if($i == 5){
                            break;
                            }
                                                ?>
                        <div class="row  d-flex justify-content-start align-items-center">
                            <!-- <img class="catpic" src="" alt="pubg"> -->
                            <div class="catpic " style="background-image: url('upload/categorys/<?php echo $categ['photo'] ?>');"></div>
                            <a href="category.php?idcateg=<?php echo $categ['id'] ?>" > <?php echo $categ['name'] ?></a>

                        </div>
                        <hr>

                        <?php
                    $i++; }
                    ?>
                        <div class="d-flex justify-content-center"><a href="categories.php" class="viewall" >VIEW ALL</a></div>
                        
                        
                   
                        
                        
                    </div>

                    <!-- google ads -->
                    <div class="bg " style="padding-top: 10px; padding-bottom: 10px;">
                        <div class="row d-flex justify-content-end align-items-center">
                            <div class="col-6 d-flex justify-content-end align-items-center">
                                <h1>Advertissement</h1>
                            </div>
                            <div class="col-6 d-flex justify-content-end align-items-center">
                                    <hr>
                            </div>
                        </div>
                    </div>
                    <div class="bg categ" style="padding-bottom: 10px; margin: 0;background-color: #292E38;">
                        <div class="row  d-flex justify-content-center align-items-center">
                           
                            <!-- Google ADS -->
                            <img src="img/adsgoogle.png" alt="ads" style="width: 300px;">
                        </div>
                        
                    </div>
                    
                    <!-- pages -->
                    <div class="bg " style="padding-top: 10px; padding-bottom: 10px;">
                        <div class="row justify-content-center">
                                <div class="col-6">
                                    <div class="col "><a href="#">About</a></div>
                                    <div class="col "><a href="">Terms</a></div>
                                    <div class="col "><a href="">Help</a></div>
                                </div>
                                <div class="col-6 ">
                                    
                                    <div class="col "><a href="">Content Policy</a></div>
                                    <div class="col "><a href="">Privacy Policy</a></div>
                                    
                                </div>
                                <span>HotSquad Inc © 2020. All rights reserved </span>
                        </div>
                    </div>
            </div>
        </div>
    </div>











































    <img class="bg-top" src="img/bg-top.png" alt="bg-top">

    <?php 

if(isset($_POST["editimg"])){

    $file_name = $_FILES['image']['name'];
    $file_type = $_FILES['image']['type'];
    $file_size = $_FILES['image']['size'];
    $file_tem_loc = $_FILES['image']['tmp_name'];
    $file_store = "upload/".$file_name;

    move_uploaded_file($file_tem_loc, $file_store);

    $user = new USER();

    $user->photo = $file_name;
  
    $user->ChangePhoto($conn);
    echo '<script type="text/javascript">';
    echo "document.getElementById('imgsuccess').innerHTML = 'Success' ";  
    echo '</script>';

    header("Location: profilesetting.php");

    
    
  
} 



                    if(isset($_POST["editprofile"])){
                        
                     $selectemail = mysqli_query($conn, "SELECT `email` FROM `user` WHERE `email` = '" .  $_REQUEST['email']  . "'") or exit(mysqli_error($conn));

                     
                     if(mysqli_num_rows($selectemail)) {
                        //   exit('This email is already being used');
                        echo '<script type="text/javascript">';
                    echo "document.getElementById('profileres').innerHTML = 'This email is already being used' ";  
                    echo '</script>';
                    }else {  
                        
                    
                        $userr = new USER();
                        
                        $userr->id = $_SESSION['id'];

                    if($_REQUEST['firstname']){
                        $userr->firstname = stripslashes($_REQUEST['firstname']);
                    $userr->firstname = mysqli_real_escape_string($conn, $userr->firstname); 
                    }else{
                        $userr->firstname = $user['firstname'];
                    }

                    if($_REQUEST['lastname']){
                        $userr->lastname = stripslashes($_REQUEST['lastname']);
                        $userr->lastname = mysqli_real_escape_string($conn, $userr->lastname);
                    }else{
                        $userr->lastname = $user['lastname'];
                    }

                    if($_REQUEST['username']){
                        $userr->username = stripslashes($_REQUEST['username']);
                    $userr->username = mysqli_real_escape_string($conn, $userr->username);
                    }else{
                        $userr->username = $user['username'];
                    }
                    
                    if($_REQUEST['email']){
                        $userr->email = stripslashes($_REQUEST['email']);
                    $userr->email = mysqli_real_escape_string($conn, $userr->email);
                    }else{
                        $userr->email = $user['email'];
                    }

                                         
                        $userr->UpdateInfromation($conn);
                      
                    } 
                }


                if(isset($_POST["editpassw"])){
                    $user = new USER();
                
                    $user->id = $_SESSION['id'];
                
                    $user->passwordconf = stripslashes($_REQUEST['password']);
                    $user->passwordconf = mysqli_real_escape_string($conn, $user->passwordconf);
                    $user->password = password_hash($user->passwordconf, PASSWORD_DEFAULT);
                  
                  
                    $confirmpassword = stripslashes($_REQUEST['confirmpassword']);
                    $confirmpassword = mysqli_real_escape_string($conn, $confirmpassword);
                    
                
                    if ($user->passwordconf === $confirmpassword) {
                
                        $user->ChangePassword($conn);
                
                    }else {
                           
                
                        echo '<script type="text/javascript">';
                                    echo "document.getElementById('passwres').innerHTML = 'Not the same Password' ";  
                                    echo '</script>';
                        
                        }
                }
                
                ?>
</body>

</html>