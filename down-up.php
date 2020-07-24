<?php
require('config.php');
require('class.php');
 
if(isset($_POST)){
 

$upvotes = $_POST['p_upvotes'] ;
$downvotes = $_POST['p_downvotes'] + 1;

$sqlpost = "UPDATE post SET upvotes = '$upvotes', downvotes = '$downvotes' WHERE id = '{$_POST['p_id']}'";

 $resultpost = $conn->query($sqlpost);
// echo $upvotes;
// echo $_POST['p_id'];
 



}
?>

