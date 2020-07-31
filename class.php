<?php

    class USER {
        public $id;
        public $username;
        public $email;
        public $password;
        public $firstname;
        public $lastname;
        public $photo;
        public $role;
        public $date;



        public function UpdateInfromation($conn){

            $update_query = mysqli_query($conn,"UPDATE user SET username = '" . $this->username . "', email = '" . $this->email . "', firstname = '" . $this->firstname . "' , lastname = '". $this->lastname ."' WHERE id = '" . $this->id . "'");


        }

        public function ChangePhoto($conn){

            $update_query = mysqli_query($conn,"UPDATE user SET photo = '" . $this->photo . "' WHERE id = '" .  $_SESSION['id']  . "'");


        }

        public function ChangePassword($conn){

            $update_query = mysqli_query($conn,"UPDATE user SET password = '" . $this->password . "' WHERE id = '" . $this->id . "'");



        }



}

    class post{
        public $id;
        public $title;
        public $content;
        public $photo;
        public $upvote;
        public $downvote;
        public $date;
        public $report;
        public $user_id;
        public $cat_id;


        public function deletPost($conn){
            $update_query1 = mysqli_query($conn,"DELETE FROM comments WHERE post_id=$this->id");

            $update_query = mysqli_query($conn,"DELETE FROM post WHERE id=$this->id");
            $update_query2 = mysqli_query($conn,"DELETE FROM voted WHERE post_id=$this->id AND user_id = $this->user_id");

            

        }

        public function updatePost($conn){

            $update_query = mysqli_query($conn,"UPDATE post SET title = '" . $this->title . "' , content = '" . $this->content . "', photo = '" . $this->photo . "', cat_id = '" . $this->categ . "' WHERE id = '" . $this->id . "'");


        }
    }


    class CATEGORY{
        public $id;
        public $name;
        public $photo;


        public function deletCategory($conn){

          $sql = "SELECT * FROM post WHERE cat_id = '$this->id'";
           $result = $conn->query($sql);
                                
         while($post = $result->fetch_assoc() ) {

         $update_query1 = mysqli_query($conn,"DELETE FROM comments WHERE post_id = '{$post["id"]}'");
        $update_query4 = mysqli_query($conn,"DELETE FROM voted WHERE post_id='{$post["id"]}'");

          $update_query2 = mysqli_query($conn,"DELETE FROM post WHERE id = '{$post["id"]}'");

    

         }

         $update_query3 = mysqli_query($conn,"DELETE FROM category WHERE id = '$this->id'");




        }

        public function updateCategory($conn){

          $update_query = mysqli_query($conn,"UPDATE category SET name = '" . $this->name . "' , photo = '" . $this->photo . "' WHERE id = '" . $this->id . "'");

        }

    }



    class COMMENT{
        public $id;
        public $content;
        public $date;
        public $user_id;
        public $cat_id;
    }


    








// SIGNIN

if(isset($_POST["reg"])){
    
    $user = new USER();

  $user->firstname = stripslashes($_REQUEST['firstname']);
  $user->firstname = mysqli_real_escape_string($conn, $user->firstname); 

  $user->lastname = stripslashes($_REQUEST['lastname']);
  $user->lastname = mysqli_real_escape_string($conn, $user->lastname);

  $user->username = stripslashes($_REQUEST['username']);
  $user->username = mysqli_real_escape_string($conn, $user->username);

  $user->date = date("Y.m.d");

  $user->email = stripslashes($_REQUEST['email']);
  $user->email = mysqli_real_escape_string($conn, $user->email);

  $user->password = stripslashes($_REQUEST['password']);
  $user->password = mysqli_real_escape_string($conn, $user->password);
  $user->hashedpassword = password_hash($user->password, PASSWORD_DEFAULT);


  $confirmpassword = stripslashes($_REQUEST['confirmpassword']);
  $confirmpassword = mysqli_real_escape_string($conn, $confirmpassword);
  
  $selectemail = mysqli_query($conn, "SELECT `email` FROM `user` WHERE `email` = '$user->email'") or exit(mysqli_error($conn));
  $selectusername = mysqli_query($conn, "SELECT `username` FROM `user` WHERE `username` = '$user->username'") or exit(mysqli_error($conn));
  if(mysqli_num_rows($selectemail)) {
    //   exit('This email is already being used');
    echo '<script type="text/javascript">';
echo ' alert("This email is already being used ")';  
echo '</script>';
}else  if(mysqli_num_rows($selectusername)){
            echo '<script type="text/javascript">';
echo ' alert("This username is already being used ")';  
echo '</script>';
        }
   else if ($user->password === $confirmpassword) {


    $query = "INSERT into `user` (username, password, email, date, firstname, lastname, photo , role)
              VALUES ('$user->username', '$user->hashedpassword', '$user->email', '$user->date' , '$user->firstname' , '$user->lastname','user.jpg', 'user')";

  $res = mysqli_query($conn, $query);
    if($res){
        header("Location: home.php");
    }

}else {
    echo '<script type="text/javascript">';
echo ' alert("Not the same Password ")';  
echo '</script>';

}
    
}









// LOGIN

if (isset($_POST['log'])){

    $user = new USER();

  $user->username = stripslashes($_REQUEST['username']);
  $user->username = mysqli_real_escape_string($conn, $user->username);
  $user->password = stripslashes($_REQUEST['password']);
  $user->password = mysqli_real_escape_string($conn, $user->password);


    $query = "SELECT * FROM `user` WHERE username='$user->username'";
    
    
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  $row = mysqli_fetch_assoc($result);

  if($rows==1){
  if (password_verify($user->password, $row['password'])) {
    if($rows==1){
      $_SESSION['id']    = $row['id'];
      $_SESSION['username'] = $user->username;
      $_SESSION['photo'] = $row['photo'];
      $_SESSION['date'] = $row['date'];
      $_SESSION['firstname'] = $row['firstname'];
      $_SESSION['lastname'] = $row['lastname'];
      $_SESSION['role'] = $row['role'];

      header("Location: home.php");
     }
}else{
        
    echo '<script type="text/javascript">';
    echo ' alert("The Password is incorrect. ")';  
    echo '</script>';
}

  } else {
    echo '<script type="text/javascript">';
    echo ' alert("The username is incorrect. ")';  
    echo '</script>';
  }

}
         





// ADD POST

if (isset($_POST['addpost'])){


    $file_name = $_FILES['photo']['name'];
    $file_type = $_FILES['photo']['type'];
    $file_size = $_FILES['photo']['size'];
    $file_tem_loc = $_FILES['photo']['tmp_name'];
    $file_store = "upload/posts/".$file_name;


    $post = new POST();

    

    $post->title = stripslashes($_REQUEST['title']);
    $post->title = mysqli_real_escape_string($conn, $post->title); 
  
    $post->content = stripslashes($_REQUEST['content']);
    $post->content = mysqli_real_escape_string($conn, $post->content);
  
  
    $post->date = date("Y.m.d");
  
    $post->categ = stripslashes($_REQUEST['categ']);
    $post->categ = mysqli_real_escape_string($conn, $post->categ);


    $post->upvote = '0';
    $post->downvote = '0';
    $post->report ='0';

    $post->userid = $_SESSION['id'];
  
    

    $post->photo = $file_name;


    $query = "INSERT into `post` (title, content, photo, upvotes, downvotes, date, report , user_id, cat_id)
              VALUES ('$post->title', '$post->content', '$post->photo', '$post->upvote' , '$post->downvote' , '$post->date','$post->report', '$post->userid','$post->categ')";

  $res = mysqli_query($conn, $query);
    if($res){
       
    
        move_uploaded_file($file_tem_loc, $file_store);
        header("Location: home.php");

    }else {
        echo '<script type="text/javascript">';
        echo ' alert("incorrect. ")';  
        echo '</script>';
    }







}




if(isset($_POST["validcomment"])){
    
    $comment = new COMMENT();

  $comment->content = stripslashes($_REQUEST['comment']);
  $comment->content = mysqli_real_escape_string($conn, $comment->content); 

  $comment->date = date("Y.m.d");

  $comment->user_id = $_SESSION['id'];

  $comment->post_id = $_POST['post_id'];
  



$query = "INSERT into `comments` (content, date, user_id, post_id)
              VALUES ('$comment->content', '$comment->date', '$comment->user_id', '$comment->post_id')";

  $res = mysqli_query($conn, $query);
    if($res){
       

        header("Location: post.php?postid=$comment->post_id");

    }




}







if(isset($_POST["updatepost"])){
    $post = new POST();


    $sqluppost = "SELECT * FROM post WHERE id = '{$_POST['id']}'";
     $resultuppost = $conn->query($sqluppost);
                                
     $uppost = $resultuppost->fetch_assoc();




    $file_name = $_FILES['photo']['name'];
    $file_type = $_FILES['photo']['type'];
    $file_size = $_FILES['photo']['size'];
    $file_tem_loc = $_FILES['photo']['tmp_name'];
    $file_store = "upload/posts/".$file_name;

    if($file_name){

        
        $post->photo = $file_name;
        move_uploaded_file($file_tem_loc, $file_store);

} else{
    $post->photo = $uppost['photo'];

}



    $post->id = $_POST['id'];

    $post->title = stripslashes($_REQUEST['title']);
    $post->title = mysqli_real_escape_string($conn, $post->title); 
  
    $post->content = stripslashes($_REQUEST['content']);
    $post->content = mysqli_real_escape_string($conn, $post->content);
  
  
    $post->categ = stripslashes($_REQUEST['categ']);
    $post->categ = mysqli_real_escape_string($conn, $post->categ);



    $post->updatePost($conn);


     header("Location: post.php?postid={$_POST['id']}");
    










}





if (isset($_GET['delpost'])) {

    $post = new POST();
    $post->id = $_GET['delpost'];
    $post->user_id = $_SESSION['id'];
    $res = $post->deletPost($conn);

    header("Location: profile.php");
    

  }





if(isset($_POST["report"])){

    $post = new POST();

    $post->id = stripslashes($_REQUEST['id']);
    $post->id = mysqli_real_escape_string($conn, $post->id); 
  
    $post->report = stripslashes($_REQUEST['reportval']);
    $post->report = mysqli_real_escape_string($conn, $post->report);
    $post->report = $post->report + 1;



    $query = "UPDATE post SET report = '" . $post->report . "' WHERE id = '" . $post->id . "'";

  $res = mysqli_query($conn, $query);

  if($res){
    header("Location: home.php");

  }

}


if (isset($_GET['deluser'])) {

    $user = new USER();
    $user->id = $_GET['deluser'];

    $sql = "SELECT * FROM post WHERE user_id = '$user->id'";
    $result = $conn->query($sql);
                                
   while($post = $result->fetch_assoc() ) {
    $update_query3 = mysqli_query($conn,"DELETE FROM comments WHERE post_id = '{$post["id"]}'");
    

   }
   
    $update_query3 = mysqli_query($conn,"DELETE FROM comments WHERE user_id=$user->id");
    $update_query3 = mysqli_query($conn,"DELETE FROM voted WHERE user_id=$user->id");

    $update_query2 = mysqli_query($conn,"DELETE FROM post WHERE user_id=$user->id");

    $update_query = mysqli_query($conn,"DELETE FROM user WHERE id=$user->id");

    header("Location: backoffice%20user.php");
    

  }



  if (isset($_GET['postdel'])) {

    $post = new POST();
    $post->id = $_GET['postdel'];
    
    $update_query3 = mysqli_query($conn,"DELETE FROM comments WHERE post_id = $post->id");
    $update_query3 = mysqli_query($conn,"DELETE FROM voted WHERE post_id=$post->id");

    $update_query2 = mysqli_query($conn,"DELETE FROM post WHERE id=$post->id");



    header("Location: backoffice%20posts.php");
    

  }

  if (isset($_GET['delcomment'])) {

    $comment = new COMMENT();
    $comment->id = $_GET['delcomment'];
    
    $update_query3 = mysqli_query($conn,"DELETE FROM comments WHERE id = $comment->id");
    



    header("Location: backoffice%20comments.php");
    

  }



  if (isset($_GET['delcategory'])) {

    $category = new CATEGORY();
    $category->id = $_GET['delcategory'];
    
    
    

    $category->deletCategory($conn);

    header("Location: backoffice%20categories.php");
    

  }





  if(isset($_POST["admin"])){

    $user = new USER();

    $user->id = stripslashes($_REQUEST['id']);
    $user->id = mysqli_real_escape_string($conn, $user->id); 
  
    $user->role = stripslashes($_REQUEST['role']);
    $user->role = mysqli_real_escape_string($conn, $user->role);


    if($user->role == 'user' ){
        $user->role = 'admin';
    }else{
        $user->role = 'user';
    }


    $query = "UPDATE user SET role = '" . $user->role . "' WHERE id = '" . $user->id . "'";

  $res = mysqli_query($conn, $query);

  if($res){
    header("Location: backoffice%20user.php");

  }

}






if(isset($_POST["updatecategory"])){
    $categ = new CATEGORY();

    $categ->name = stripslashes($_REQUEST['name']);
  $categ->name = mysqli_real_escape_string($conn, $categ->name);

  $categ->id = stripslashes($_REQUEST['id']);
  $categ->id = mysqli_real_escape_string($conn, $categ->id);

  $sqlcateg = "SELECT * FROM category WHERE id = '$categ->id'";
  $resultcateg = $conn->query($sqlcateg);
                             
  $categorig = $resultcateg->fetch_assoc();




 $file_name = $_FILES['photo']['name'];
 $file_type = $_FILES['photo']['type'];
 $file_size = $_FILES['photo']['size'];
 $file_tem_loc = $_FILES['photo']['tmp_name'];
 $file_store = "upload/categorys/".$file_name;

 if($file_name){
    
     $categ->photo = $file_name;
     move_uploaded_file($file_tem_loc, $file_store);

} else{
 $categ->photo = $categorig['photo'];

}

$categ->updateCategory($conn);


     header("Location: backoffice%20categories.php");

}



if(isset($_POST["addcateg"])){
  $categ = new CATEGORY();

  $categ->name = stripslashes($_REQUEST['name']);
$categ->name = mysqli_real_escape_string($conn, $categ->name);



$file_name = $_FILES['photo']['name'];
$file_type = $_FILES['photo']['type'];
$file_size = $_FILES['photo']['size'];
$file_tem_loc = $_FILES['photo']['tmp_name'];
$file_store = "upload/categorys/".$file_name;


  
   $categ->photo = $file_name;
   move_uploaded_file($file_tem_loc, $file_store);


   $query = "INSERT into `category` (photo, name)
   VALUES ('$categ->photo', '$categ->name')";

$res = mysqli_query($conn, $query);
if($res){


  header("Location: backoffice%20categories.php");


}



}

?>