<?php 
require('config.php');
require('class.php');


$votepost = "SELECT * FROM `voted` WHERE user_id='9' AND post_id='26'";
$resultvotepost = $conn->query($votepost);
if($resultvotepost->fetch_assoc() == 0 ){
    echo'test';
}
?>



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