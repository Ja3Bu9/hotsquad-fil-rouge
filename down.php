<?php
require('config.php');
require('class.php');
 
if(isset($_POST)){
 

$downvotes = $_POST['p_downvotes'] + 1;
$sqlpost = "UPDATE post SET downvotes = '$downvotes' WHERE id = '{$_POST['p_id']}'";

 $resultpost = $conn->query($sqlpost);
// echo $upvotes;
// echo $_POST['p_id'];
 



}
?>

