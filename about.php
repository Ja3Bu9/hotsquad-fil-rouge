<?php
  session_start();

require('config.php');
require('class.php');



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
                    
                    <div class="userpic" style="background-image: url('upload/user/<?php echo $user['photo'] ?>');" ></div>

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

        <i class="fas fa-search login-trigger" data-target="#search" data-toggle="modal" style="position: absolute;right: 1rem;width: 16px;cursor: pointer;"></i>
        

            <div id="search" class="modal fade " role="dialog">
                <div class="modal-dialog">

                    <div class="modal-content">
                        <div class="modal-body">
                            <button data-dismiss="modal" class="close">&times;</button>
                            <h4><span>Search</span></h4>
                            <form action="search.php" method="POST" >
                                
                            <input class="form-control" type="text" placeholder="Search" aria-label="Search" name="search">
                                <!-- <input type="password" name="password" class="password form-control"
                                    placeholder="password" required/> -->
                                <input class="btn login" name="search-submit" type="submit" value="Search" />
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>

   







    <div class="container creat">
        <div class="row rev">
            <div class="col-8">
               
                <!-- Avatar -->
                <div class="bg " style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="row d-flex justify-content-end align-items-center">
                        <div class="col d-flex justify-content-end align-items-center">
                            <hr>
                    </div>
                        <div class="col d-flex justify-content-center align-items-center">
                            <h1>About Us</h1>
                        </div>
                        <div class="col d-flex justify-content-end align-items-center">
                                <hr>
                        </div>
                    </div>
                </div>
                <div class="bg" style="padding-bottom: 10px; margin: 0;background-color: #292E38;">
                   
                    
                   

                   
                       <div class="container">
                           <h4 style="padding:20px">
                           <span style="margin-left:4em;">Welcome to HotSquad, your number one forum. We're dedicated to providing you the very best gaming forum. <br>


Founded in 2020 by Ja3Bu9, HotSquad has come a long way from its beginnings in YouCode. When Ja3Bu9 first started out, his passion for gaming drove him to start his own forum. <br>


We hope you enjoy our space as much as we enjoy it. If you have any questions or comments, please don't hesitate to contact us.

<br>
Sincerely,
<br>
Ja3Bu9
                           </h4>
                       </div>
                    
                 
                    
                </div>
                
              


            </div>




            <div class="col-4">


            


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
                           
                        <?php

$sqladsense = "SELECT * FROM ad WHERE name = 'adsense'";
$resultadsense = $conn->query($sqladsense);
$adsense = $resultadsense->fetch_assoc();
                ?>
                            <!-- Google ADS -->
                            <!-- <img src="img/adsgoogle.png" alt="ads" style="width: 300px;"> -->
                            <?php echo $adsense['content'] ?>
                        </div>
                        
                    </div>
                    
                     <!-- pages -->
                     <div class="bg " style="padding-top: 10px; padding-bottom: 10px;">
                        <div class="row justify-content-center">
                                <div class="col-6">
                                    <div class="col "><a href="about.php">About</a></div>
                                    <div class="col "><a href="terms.php">Terms</a></div>
                                    
                                </div>
                                <div class="col-6 ">
                                    
                                   
                                    <div class="col "><a href="privacy.php">Privacy Policy</a></div>
                                    
                                </div>
                                <span>HotSquad Inc © 2020. All rights reserved </span>
                        </div>
                    </div>
            </div>
        </div>
    </div>











































    <img class="bg-top" src="img/bg-top.png" alt="bg-top">

    
</body>

</html>