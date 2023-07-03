<?php
include 'layouts/header.php';

require 'users.php';

if (!isset($_POST['id'])) {
    include 'layouts/not_founded.php';
    exit;
}

$idUser = $_POST['id'];
deleteUser($idUser);
$users = getUserById($idUser);
        header('Location: index.php');
        exit;
