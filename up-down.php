<?php
require('config.php');
require('class.php');
 
if(isset($_POST)){


    $postup = "SELECT * FROM post WHERE id = '{$_POST['p_id']}'";
    
    $resuu = $conn->query($postup);
              
    $postupp = $resuu->fetch_assoc();
 

$upvotes = $postupp['upvotes'] + 1;
$downvotes = $postupp['downvotes'] - 1;

$sqlpost = "UPDATE post SET upvotes = '$upvotes', downvotes = '$downvotes' WHERE id = '{$_POST['p_id']}'";

 $resultpost = $conn->query($sqlpost);
// echo $upvotes;
// echo $_POST['p_id'];
 


$user_id = $_POST['user_id'];


$votepost = "SELECT * FROM `voted` WHERE user_id='$user_id' AND post_id='{$_POST['p_id']}'";
$resultvotepost = $conn->query($votepost);


if($resultvotepost->fetch_assoc() == 0){


$addvotedpost = "INSERT into `voted` (post_id, user_id, up, down)
              VALUES ('{$_POST['p_id']}', '$user_id', '1','0')";
$conn->query($addvotedpost);

}else{

    $updatevotepost = "UPDATE voted SET up = 1, down = 0 WHERE user_id='$user_id' AND post_id='{$_POST['p_id']}'";
$conn->query($updatevotepost);


}



}
?>

