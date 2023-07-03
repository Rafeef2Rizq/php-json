<?php

include 'layouts/header.php';

require 'users.php';
$user=[
    'id'=>'',
    'name'=>'',
    'username'=>'',
    'email'=>'',
    'phone'=>'',
    'website'=>''
    
    ];
    $errors=[
        'name'=>'',
        'username'=>'',
        'email'=>'',
        'phone'=>'',
        'website'=>'',
    ];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user=array_merge($user,$_POST);
    $isValid= validateUser($user,$errors);
if($isValid){
    $usersup = createUser($_POST);
    if (isset($_FILES['image'])) {
        uploadfile($_FILES['image'],$usersup);
    }
  
    header('Location: index.php');
}
}

?>
<div class="container">
    <div class="card mt-3 border-success text-secondary ">
        <div class="card-body text-center ">
          

<?php include '_form.php'; ?>
    