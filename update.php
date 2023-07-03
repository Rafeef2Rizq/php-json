<?php

include 'layouts/header.php';

require 'users.php';

if (!isset($_GET['id'])) {
    include 'layouts/not_founded.php';
    exit;
}

$idUser = $_GET['id'];
$user = getUserById($idUser);
if (!isset($user)) {
    include 'layouts/not_founded.php';
    exit;
}
// echo '<pre>';
//   echo $_FILES;
//  var_dump($_FILES);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user=array_merge($user,$_POST);
    $isValid= validateUser($user,$errors);
if($isValid){
    $usersup = updateUser($_POST, $idUser);
    if (isset($_FILES['image'])) {
        uploadfile($_FILES['image'],$usersup);
    }
  
    header('Location: index.php');
}
}
?>
<?php include '_form.php'; ?>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('#imageInput').change(function(event) {
      const file = event.target.files[0];
      const reader = new FileReader();

      reader.onload = function(e) {
        // Update the source of the image element
        $('#previewImage').attr('src', e.target.result);
      };

      reader.readAsDataURL(file);
    });
  });
</script>


