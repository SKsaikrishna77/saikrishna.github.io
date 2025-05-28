
// <?php
//  $dbhost = "localhost";
//  $dbuser = "root";
//  $dbpass = "";
//  $db = "profile_cont";
//  $conn =mysqli_connect($dbhost, $dbuser, $dbpass,$db);
// //  $title=$_POST['title'];
// // $your_name=$_POST['your_name'];
// $name=$_POST['name'];
// $email=$_POST['email'];
// $subject=$_POST['subject'];
// $message=$_POST['message'];
//  $q="INSERT INTO `profile`( `name`, `email`, `subject`, `message`) VALUES ('$name','$email','$subject','$message')";
//  $result= mysqli_query($conn,$q);
//  if($result){
//      echo "done";
//  }
//  else {
//      echo "failed";
//  }
// ?>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = 'https://script.google.com/macros/s/AKfycbwoxmAext_TVbR6JTT9rPmy6sGp4V2woFEh4V9gBANNUjzhIVrOkipPdAMqFWynV2Zc/exec';
    $data = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
       'subject' => $_POST['subject']
        'message' => $_POST['message']
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/json\r\n",
            'method'  => 'POST',
            'content' => json_encode($data)
        ]
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        echo "Error submitting form";
    } else {
        echo "Form submitted successfully!";
    }
}
?>
