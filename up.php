<?php
require('config.php');
require('class.php');
 
if(isset($_POST)){
 

$upvotes = $_POST['p_upvotes'] + 1;
$sqlpost = "UPDATE post SET upvotes = '$upvotes' WHERE id = '{$_POST['p_id']}'";

 $resultpost = $conn->query($sqlpost);
// echo $upvotes;
// echo $_POST['p_id'];
 



}
?>

