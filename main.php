
<?php
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "profile_cont";
 $conn =mysqli_connect($dbhost, $dbuser, $dbpass,$db);
//  $title=$_POST['title'];
// $your_name=$_POST['your_name'];
$name=$_POST['name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];
 $q="INSERT INTO `profile`( `name`, `email`, `subject`, `message`) VALUES ('$name','$email','$subject','$message')";
 $result= mysqli_query($conn,$q);
 if($result){
     echo "done";
 }
 else {
     echo "failed";
 }
?>