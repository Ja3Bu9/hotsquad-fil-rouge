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
            <!--Trigger-->
            <a class="login-trigger " href="#" data-target="#login" data-toggle="modal">Login</a>

            <div id="login" class="modal fade " role="dialog">
                <div class="modal-dialog">

                    <div class="modal-content">
                        <div class="modal-body">
                            <button data-dismiss="modal" class="close">&times;</button>
                            <h4><span>LOG</span> IN</h4>
                            <form>
                                <input type="text" name="username" class="username form-control"
                                    placeholder="Username" />
                                <input type="password" name="password" class="password form-control"
                                    placeholder="password" />
                                <input class="btn login" type="submit" value="Login" />
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
                            <form>
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

                                <input class="btn login" type="submit" value="Sign Up" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <a href="#" ><i class='fas fa-user-alt sessionuser'
                    ></i></a>
        </div>
    </div>

    <div class="container-fluid logobar d-flex justify-content-center align-items-center " style="margin-bottom: 20px;">
        <a href="#">
            <img class="logofilrouge" src="img/logofilrouge.png" alt="logobar" >

        </a>

        <i class="fas fa-search" style="position: absolute;right: 1rem;width: 16px;"></i>
    </div>

   







    <div class="container creat">
        <div class="row">
            <div class="col-8">
                <!-- click to show posy inputs -->


                <!-- post -->
               

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
                        <div class="row  d-flex justify-content-start align-items-center">
                            <!-- <img class="catpic" src="" alt="pubg"> -->
                            <div class="catpic " style="background-image: url('https://pic.clubic.com/v1/images/1801039/raw-accept?width=1200&fit=max&hash=aad793c5528226925ef8ce8c99bd28baa3a11c65');"></div>
                            <a href="" >PUBG</a>

                        </div>
                        <hr><div class="row  d-flex justify-content-start align-items-center">
                            <!-- <img class="catpic" src="" alt="pubg"> -->
                            <div class="catpic " style="background-image: url('https://pic.clubic.com/v1/images/1801039/raw-accept?width=1200&fit=max&hash=aad793c5528226925ef8ce8c99bd28baa3a11c65');"></div>
                            <a href="" >PUBG</a>

                        </div>
                        <hr><div class="row  d-flex justify-content-start align-items-center">
                            <!-- <img class="catpic" src="" alt="pubg"> -->
                            <div class="catpic " style="background-image: url('https://pic.clubic.com/v1/images/1801039/raw-accept?width=1200&fit=max&hash=aad793c5528226925ef8ce8c99bd28baa3a11c65');"></div>
                            <a href="" >PUBG</a>

                        </div>
                        <hr><div class="row  d-flex justify-content-start align-items-center">
                            <!-- <img class="catpic" src="" alt="pubg"> -->
                            <div class="catpic " style="background-image: url('https://pic.clubic.com/v1/images/1801039/raw-accept?width=1200&fit=max&hash=aad793c5528226925ef8ce8c99bd28baa3a11c65');"></div>
                            <a href="" >PUBG</a>

                        </div>
                        <div class="d-flex justify-content-center"><a href="" class="viewall" >VIEW ALL</a></div>
                        
                        
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