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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>


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

    <div class="container-fluid logobar d-flex justify-content-center align-items-center ">
        <a href="home.php">
            <img class="logofilrouge" src="img/logofilrouge.png" alt="logobar" >
        </a>

        <i class="fas fa-search" style="position: absolute;right: 1rem;width: 16px;"></i>
    </div>

    <div class="container advertise d-flex justify-content-center align-items-center ">
        <div class="advertiseimg"></div>
    </div>

    <div class="container titles">


        <div class="row">
            <div class="col col-lg-2 d-flex align-items-center hr">
                <hr style="background-color:#2F3541;height:4px;width:100%" />

            </div>
            <div class="col d-flex justify-content-center">
                <h1><span>Popular</span> Posts</h1>

            </div>
            <div class="col d-flex align-items-center hr">
                <hr style="background-color:#2F3541;height:4px;width:100%" />

            </div>
        </div>
    </div>

    <div class="container populars d-flex justify-content-center  flex-wrap">
    <?php 
      $sqlpopu = "SELECT * FROM post ORDER BY upvotes DESC";
      $resultpopu = $conn->query($sqlpopu);
      $i = 1;
      
        
                                
      while($popu = $resultpopu->fetch_assoc() ) {
        
                 if($popu['photo']){  
                    if($i == 5){
                    break;
                    }                
        ?>
        <a href="post.php?postid=<?php echo $popu['id']  ?>">
            <div style="background-image: url('upload/posts/<?php echo $popu['photo']  ?>'); ">
                <p><?php echo $popu['title']  ?></p>
            </div>
        </a>
      <?php }
    $i++;} ?>

    </div>

    <div class="container titles">


        <div class="row ">
            <div class="col col-lg-2 d-flex align-items-center hr">
                <hr style="background-color:#2F3541;height:4px;width:100%" />

            </div>
            <div class="col d-flex justify-content-center">
                <h1><span>Latest</span> Posts</h1>

            </div>
            <div class="col d-flex align-items-center hr">
                <hr style="background-color:#2F3541;height:4px;width:100%" />

            </div>
        </div>
    </div>

    <div class="container creat">
        <div class="row flex-wrap">
            <div class="col-8">

            <?php
if(isset($_SESSION["username"])){
         
   
?>

                <!-- click to show posy inputs -->
                <div class="bg" id="showinput">
                    <div class="row container-fluid" style="padding-top: 10px;padding-bottom: 10px;">
                        <div class="col-11 d-flex justify-content-center">

                            <input type="text" placeholder="Creat Post" id="inputshow" onclick="showinputs()">


                        </div>
                        <div class="col-1 d-flex justify-content-start align-items-center"
                            >
                            <i class='fas fa-image' style='font-size:300%' onclick="showinputs()"></i>


                        </div>

                    </div>
                </div>

                <!-- post inputs -->
                <div class="bg" id="formpost" style="display: none;">
                    <div class="row" style="padding-top: 10px;padding-bottom: 10px;">
                        <div class="col-12 ">
                            <form method="post" enctype="multipart/form-data" class="d-flex flex-column justify-content-center align-items-center">

                                <input name="title" type="text" placeholder="Title">
                                <input name="content" type="text" placeholder="Content">

                                <input name="photo" type="file" id="img" name="img" accept="image/*">
                                
                                <label  for="categ">Choose a Category:</label>
  <select  id="categ" name="categ">
    

  <?php 
                                $sqlcat = "SELECT * FROM category";
                                $resultcat = $conn->query($sqlcat);
                                
        
                                
                                while($categ = $resultcat->fetch_assoc() ) {?>
    <option value="<?php echo $categ['id'] ?>"><?php echo $categ['name'] ?></option>
                                <?php }?>
  </select>
                                <input name="addpost" type="submit">
                            </form>



                        </div>


                    </div>
                </div>

<?php }?>


<?php 
                                $sqlpost = "SELECT post.*, user.id AS user_id, user.photo AS user_photo , user.username AS user_username FROM post JOIN user ON post.user_id = user.id ORDER BY id DESC";
                                $resultpost = $conn->query($sqlpost);
                                
                                
        
                                
                                while($post = $resultpost->fetch_assoc() ) {
                                   
                                    if(isset($_SESSION["id"])){
                                    $votepost = "SELECT * FROM `voted` WHERE user_id='{$_SESSION['id']}' AND post_id='{$post['id']}'";
        $resultvote = $conn->query($votepost);
        $vote =  $resultvote->fetch_assoc();
                                    }
                                    ?>
                <!-- post -->
                <div class="bg">
                    <div class="row flex-nowrap postt">
                        <div class="col-1 d-flex flex-column align-items-center"
                            style="padding-left: 3em;padding-top: 0.5em;">



                                <button aria-pressed="<?php if(isset($_SESSION["id"])){if($vote==0){echo'false';} else if($vote['up'] == true){echo'true';}else if($vote['up'] == false){echo'false';}}else{echo'false';}  ?>" <?php  if(isset($_SESSION["id"])){ ?> onclick="checkup('<?php echo $post['id'] ?>','<?php echo $post['upvotes'] ?>','<?php echo $post['downvotes'] ?>', this,'<?php echo $_SESSION['id'] ?>')" <?php } ?> class="boutn upup"><i class="fa fa-chevron-up"
                                    style="font-size:26px"></i></button>
                            <p class="boutn votes" style="font-size: 20px; margin: 0;color: white;"><?php echo $post['upvotes'] - $post['downvotes'] ?></p>

                                <button aria-pressed="<?php if(isset($_SESSION["username"])){if($vote==0){echo'false';} else if($vote['down'] == true){echo'true';}else if($vote['down'] == false){echo'false';}}else{echo'false';}  ?>" <?php  if(isset($_SESSION["username"])){ ?> onclick="checkdown('<?php echo $post['id'] ?>','<?php echo $post['upvotes'] ?>','<?php echo $post['downvotes'] ?>', this,'<?php echo $_SESSION['id'] ?>')" <?php } ?> class="boutn downdown"><i class="fa fa-chevron-down"
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



                                    <?php if(isset($_SESSION["id"])){ 
                                        if($post['user_id'] != $_SESSION['id']){
                                        ?>

                                    
                                <button class="d-flex align-items-center boutn login-trigger" data-target="#report<?php echo $post['id'] ?>" data-toggle="modal"><i class="material-icons"
                                        >report</i><span>Report</span></button>



<div id="report<?php echo $post['id'] ?>" class="modal fade boutn" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-body">
                <button data-dismiss="modal" class="close">&times;</button>
                <h4 class="d-flex justify-content-center">Report This Post ?</h4>
                
                <form method="post">
                    <input type="hidden" name="id" class="username form-control"
                         value="<?php echo $post['id'] ?>"/>
                        <input type="hidden" name="reportval" class="username form-control"
                         value="<?php echo $post['report'] ?>"/>
                    
                        <div class="d-flex justify-content-center">
<button type="button" class=" login" data-dismiss="modal">Close</button>

                        <input class="login btn" name="report" type="submit" value="Report" />

                    </div>
                   
                </form>
            </div>
        </div>
    </div>
</div>


                                    <?php }} ?>

                                <a href="post.php?postid=<?php echo $post['id'] ?>" style="display: none;"></a>

                            </div>

                        </div>

                    </div>
                    
                </div>


                                <?php }?>




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
                           
                            <!-- Google ADS -->
                            <img src="img/adsgoogle.png" alt="ads" style="width: 300px;">
                        </div>
                        
                    </div>
                    
                    <!-- pages -->
                    <div class="bg " style="padding-top: 10px; padding-bottom: 10px;">
                        <div class="row justify-content-center">
                                <div class="col-6">
                                    <div class="col"><a href="">About</a></div>
                                    <div class="col"><a href="">Terms</a></div>
                                    <div class="col"><a href="">Help</a></div>
                                </div>
                                <div class="col-6 ">
                                    
                                    <div class="col"><a href="">Content Policy</a></div>
                                    <div class="col"><a href="">Privacy Policy</a></div>
                                    
                                </div>
                                <span>HotSquad Inc © 2020. All rights reserved </span>
                        </div>
                    </div>
            </div>
        </div>
    </div>





    <?php if(isset($_SESSION["id"])){ ?>


<!-- chenge value of votes -->

    <script>
  let upp = $(".upup");
        let downn = $(".downdown");
        let votess = $(".votes");


for (let i = 0 ; i<upp.length ; i++){
    if (upp[i].getAttribute("aria-pressed") == "true") {

        upp[i].style.color = "#79879F"  

          
        }else{
        upp[i].style.color = "white"

        }
      
      }

      for (let i = 0 ; i<downn.length ; i++){
    if (downn[i].getAttribute("aria-pressed") == "true") {
        downn[i].style.color = "#79879F"  

          
        }else{
        downn[i].style.color = "white"

        }
      
      }

      

</script>






<!-- up / down vote script  -->
    <script>
        let up = $(".upup");
        let down = $(".downdown");
        let votes = $(".votes");

        function checkup(id,upvotes,downvotes,test, user){

            for (let i = 0 ; i<up.length ; i++){

            if (up[i].getAttribute("aria-pressed") == "false") {
                if(down[i].getAttribute("aria-pressed") == "false"){
                 
                   if (up[i] == test){

                   votes[i].innerHTML = Number(votes[i].innerHTML) + 1;

                    up[i].setAttribute("aria-pressed", true)
                up[i].style.color = "#79879F"                

                $.post( 'up.php' , {p_id : id , p_upvotes : upvotes, p_downvotes: downvotes, user_id : user }, 
       function( response ) {
        //  alert(response);
        
       }
    );
}
    
}

                 else  {

                   if (up[i] == test){

                    up[i].setAttribute("aria-pressed", true)
                up[i].style.color = "#79879F"
                
                down[i].setAttribute("aria-pressed", false)
                down[i].style.color = "white"

                   votes[i].innerHTML = Number(votes[i].innerHTML) + 2;

                $.post( 'up-down.php' , {p_id : id , p_upvotes : upvotes, p_downvotes: downvotes, user_id : user }, 
       function( response ) {
        //  alert(response);
       }
    );
}            
                }
            }else  if (up[i].getAttribute("aria-pressed") == "true") {
                
                if (up[i] == test){
                up[i].setAttribute("aria-pressed", false)
                up[i].style.color = "white"
                  votes[i].innerHTML = Number(votes[i].innerHTML) - 1;
                $.post( 'up-.php' , {p_id : id , p_upvotes : upvotes, p_downvotes: downvotes,user_id : user}, 
       function( response ) {
        //  alert(response);
       }
    );

}          

}      
  }
        }
    

        
        function checkdown(id,upvotes,downvotes, test , user){
            for (let i = 0 ; i<down.length ; i++){  
            if (down[i].getAttribute("aria-pressed") == "false") {
                if(up[i].getAttribute("aria-pressed") == "false"){
                   if (down[i] == test){
                    down[i].setAttribute("aria-pressed", true)
                down[i].style.color = "#79879F"
                votes[i].innerHTML = Number(votes[i].innerHTML) - 1;
                $.post( 'down.php' , {p_id : id , p_upvotes : upvotes, p_downvotes: downvotes, user_id : user }, 
       function( response ) {
        //  alert(response);
       }
    );
}
                   } else {

                   if (down[i] == test){
                    up[i].setAttribute("aria-pressed", false)
                up[i].style.color = "white"
                down[i].setAttribute("aria-pressed", true)
                down[i].style.color = "#79879F"
                votes[i].innerHTML = Number(votes[i].innerHTML) - 2;
                $.post( 'down-up.php' , {p_id : id , p_upvotes : upvotes, p_downvotes: downvotes, user_id : user }, 
       function( response ) {
        //  alert(response);
       }
    );

                   }

            }
         }else if (down[i].getAttribute("aria-pressed") == "true") {
                 if (down[i] == test){
                down[i].setAttribute("aria-pressed", false)
                down[i].style.color = "white"
                votes[i].innerHTML = Number(votes[i].innerHTML) + 1;
                $.post( 'down-.php' , {p_id : id , p_upvotes : upvotes, p_downvotes: downvotes, user_id : user }, 
       function( response ) {
        //  alert(response);
       }
    );

            }      
            }
        }   
    }



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

<?php } ?>


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
















    <img class="bg-top" src="img/bg-top.png" alt="bg-top">
</body>

</html>