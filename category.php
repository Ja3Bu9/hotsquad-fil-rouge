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
                                    placeholder="Username" />
                                <input type="password" name="password" class="password form-control"
                                    placeholder="password" />
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
                                    placeholder="Firstname" />
                                <input type="text" name="lastname" class="username form-control"
                                    placeholder="Lastname" />

                                <input type="text" name="username" class="username form-control"
                                    placeholder="Username" />
                                <input type="email" name="email" class="username form-control" placeholder="Email" />

                                <input type="password" name="password" class="password form-control"
                                    placeholder="password" />
                                <input type="password" name="confirmpassword" class="password form-control"
                                    placeholder="Confirm Password" />

                                <input class="btn login" name="reg" type="submit" value="Sign Up"  />
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            

                    
                    <?php
}else {
    $sql = "SELECT * FROM user WHERE id = '{$_SESSION[ "id" ]}'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
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

            <?php 
                                $sqlpost = "SELECT post.*, user.id AS user_id, user.photo AS user_photo , user.username AS user_username FROM post JOIN user ON post.user_id = user.id where post.cat_id = {$_GET['idcateg']} ORDER BY id DESC ";
                                $resultpost = $conn->query($sqlpost);
                                $resultposttest = $conn->query($sqlpost);

                                $postt = $resultposttest->fetch_assoc();
                                

                                if(!$postt){
                                    
                                
                                ?>
                               
                <!-- No post -->
                <div class="bg">
                    <div class="row flex-nowrap">
                        <div class="col-1 d-flex flex-column align-items-center"
                            style="padding-left: 3em;padding-top: 0.5em;">

                            <button aria-pressed="false" class="boutn upup"><i class="fa fa-chevron-up"
                                    style="font-size:26px"></i></button>
                            <p class="boutn" style="font-size: 20px; margin: 0;color: white;">XX</p>

                            <button aria-pressed="false" class="boutn downdown"><i class="fa fa-chevron-down"
                                    style="font-size:26px"></i></button>

                           
                        </div>
                        <div class="col-11 d-flex align-items-center">         
                            <p class="postcontent ">No Posts Yet ..</p>
                   

                        </div>

                    </div>
                </div>

                                <?php }else { 
                                    while($post = $resultpost->fetch_assoc() ) {?>

                                      <!-- post -->
                <div class="bg">
                    <div class="row flex-nowrap postt">
                        <div class="col-1 d-flex flex-column align-items-center"
                            style="padding-left: 3em;padding-top: 0.5em;">

                            <button aria-pressed="false" class="boutn upup"><i class="fa fa-chevron-up"
                                    style="font-size:26px"></i></button>
                            <p class="boutn" style="font-size: 20px; margin: 0;color: white;"><?php echo $post['upvotes'] - $post['downvotes'] ?></p>

                            <button aria-pressed="false" class="boutn downdown"><i class="fa fa-chevron-down"
                                    style="font-size:26px"></i></button>

                            

                        </div>
                        <div class="col-11 ">

                            <div class="d-flex align-items-center" style="margin-top: 1em;">
                               
                                <div class="userpic" style="background-image: url('upload/<?php echo $post['user_photo'] ?>');" ></div>
                                <h3 style="margin: 0.3em;"><?php echo $post['user_username'] ?></h3>
                                <span>. <?php echo $post['date'] ?></span>
                            </div>
                            <p class="postcontent"><?php echo $post['title'] ?> </p>
                            <?php if($post['photo']){ ?>
                            
                            <img class="postpic" src="upload/posts/<?php echo $post['photo'] ?>" alt="postpic">
<?php } ?>

                            <div class="d-flex engag" style="margin-bottom: 0.3em;">
                               
                                <button class="d-flex align-items-center"><i class='fas fa-comment-alt'
                                        ></i>
                                    <span>Comments</span></button>
                                <button class="d-flex align-items-center boutn"><i class="fa fa-share"
                                        ></i>
                                    <span>Share</span></button>
                                <button class="d-flex align-items-center boutn"><i class="material-icons"
                                        >report</i><span>Report</span></button>

                                <a href="post.php?postid=<?php echo $post['id'] ?>" style="display: none;"></a>

                            </div>

                        </div>

                    </div>
                    
                </div>


                                <?php } }?>
               

            </div>




            <div class="col-4">


                <div class="bg " style="padding-top: 10px; padding-bottom: 10px;background: linear-gradient(0deg, rgba(41,46,56,1) 49%, rgba(47,53,65,1) 50%);">
                    <div class="row container-fluid profile">

                            <div class="col d-flex flex-column align-items-center">
                            <?php 
                                $sqlcat = "SELECT * FROM category WHERE id = '{$_GET[ "idcateg" ]}'";
                                $resultcat = $conn->query($sqlcat);
                                 $category = $resultcat->fetch_assoc();

                                
        
                                
                               ?>
                                    <div class="userpicture" style="background-image: url('upload/categorys/<?php echo $category['photo'] ?>');">

                                    </div>
                                    <h3><?php echo $category['name'] ?></h3>



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
                            
                            <div class="catpic " style="background-image: url('upload/categorys/<?php echo $categ['photo'] ?>');"></div>
                            <a href="category.php?idcateg=<?php echo $categ['id'] ?>" > <?php echo $categ['name'] ?></a>

                        </div>
                        <hr>

                        <?php
                    $i++; }
                    ?>
                        <div class="d-flex justify-content-center"><a href="categories.php" class="viewall " >VIEW ALL</a></div>
                        
                        
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
















<!-- up / down vote script  -->
    <script>
        let up = document.querySelector(".upup")
        let down = document.querySelector(".downdown")

        // let num = $("p.boutn").text()

        

        $(up).click(function () {
        let upval = up.getAttribute("aria-pressed")
        let downval = down.getAttribute("aria-pressed")

            if (upval == "false") {
                
                down.setAttribute("aria-pressed", false)
                down.style.color = "white"

                up.setAttribute("aria-pressed", true)
                up.style.color = "#79879F"
                return false;
            }
            if (upval == "true") {
                

                up.setAttribute("aria-pressed", false)
                up.style.color = "white"
                return false;
            }


        });

        $(down).click(function () {
        let upval = up.getAttribute("aria-pressed")
        let downval = down.getAttribute("aria-pressed")

            if (downval == "false") {
                
                up.setAttribute("aria-pressed", false)
                up.style.color = "white"

                down.setAttribute("aria-pressed", true)
                down.style.color = "#79879F"
                return false;
            }
            if (downval == "true") {
                

                down.setAttribute("aria-pressed", false)
                down.style.color = "white"
                return false;
            }


        });




    </script>




<!-- refering to post link script  -->
<script>
    $(".postt").click(function (e) {

        if (!$(".boutn").is(e.target) //not clicked on .boutn
            &&
            $(".boutn").has(e.target).length === 0) //clicked thing is not child of .boutn
        {
            window.location = $(this).find("a").attr("href");
            return false;
        }


    });
</script>


<!-- show inputs post script  -->
<script>
    inputs = document.getElementById('formpost');
    showinput = document.getElementById('showinput');
    bodyy = document.body;

    function showinputs() {

        inputs.style.display = "block";
        showinput.style.display = "none";

    }

    $(document).mouseup(function(e) {
    // if the target of the click isn't the container nor a descendant of the container
    if (!$(inputs).is(e.target) && $(inputs).has(e.target).length === 0) 
    {
                 inputs.style.display = "none";
            showinput.style.display = "block";
    }
});
</script>



















    <img class="bg-top" src="img/bg-top.png" alt="bg-top">
</body>

</html>