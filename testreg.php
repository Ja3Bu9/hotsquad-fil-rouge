<?php
require('config.php');
require('class.php');

?>


<form method="post">
    <input type="text" name="firstname" class="username form-control" placeholder="Firstname" />
    <input type="text" name="lastname" class="username form-control" placeholder="Lastname" />

    <input type="text" name="username" class="username form-control" placeholder="Username" />
    <input type="email" name="email" class="username form-control" placeholder="Email" />

    <input type="password" name="password" class="password form-control" placeholder="password" />
    <input type="password" name="confirmpassword" class="password form-control" placeholder="Confirm Password" />

    <input class="btn login" name="reg" type="submit" value="Sign Up" />
</form>




<?php



// if(isset($_POST["reg"])){
    
//     $user = new USER();

//   $user->firstname = stripslashes($_REQUEST['firstname']);
//   $user->firstname = mysqli_real_escape_string($conn, $user->firstname); 

//   $user->lastname = stripslashes($_REQUEST['lastname']);
//   $user->lastname = mysqli_real_escape_string($conn, $user->lastname);

//   $user->username = stripslashes($_REQUEST['username']);
//   $user->username = mysqli_real_escape_string($conn, $user->username);

//   $user->date = date("Y.m.d");

//   $user->email = stripslashes($_REQUEST['email']);
//   $user->email = mysqli_real_escape_string($conn, $user->email);

//   $user->password = stripslashes($_REQUEST['password']);
//   $user->password = mysqli_real_escape_string($conn, $user->password);

//   $confirmpassword = stripslashes($_REQUEST['confirmpassword']);
//   $confirmpassword = mysqli_real_escape_string($conn, $confirmpassword);
  


//   if ($user->password === $confirmpassword) {


//     $query = "INSERT into `user` (username, password, email, date, firstname, lastname, photo , role)
//               VALUES ('$user->username', '$user->password', '$user->email', '$user->date' , '$user->firstname' , '$user->lastname','test', 'user')";

//   $res = mysqli_query($conn, $query);
//     if(!$res){
//       header("Location: profile.php");
//     }

// }
    
// }
            ?>