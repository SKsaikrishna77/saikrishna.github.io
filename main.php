<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = 'https://script.google.com/macros/s/AKfycbwoxmAext_TVbR6JTT9rPmy6sGp4V2woFEh4V9gBANNUjzhIVrOkipPdAMqFWynV2Zc/exec';
    $data = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
       'subject' => $_POST['subject'],
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
        // echo "Error submitting form";
        $_SESSION['status']="Not Submitted";
        header('location: index.php');
    } else {
        // echo "Form submitted successfully!";
        $_SESSION['status']="submitted successfully!";
        header('location: index.php');
    }
}
?>
