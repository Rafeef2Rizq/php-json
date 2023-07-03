<?php
function getUsers()
{
  return json_decode(file_get_contents(__DIR__ . '/users.json'), true);
}
function getUserById($id)
{
  $users = getUsers();
  foreach ($users as $user) {
    if ($user['id'] == $id) {
      return $user;
    }
  }
  return null;
}
function createUser($data)
{
  $users = getUsers();
  $data['id'] = rand(1000000, 2000000);
  $users[] = $data;
  putJson($users);
  return $data;
}
function updateUser($data, $id)
{
  $updateuser = [];
  $users = getUsers();
  foreach ($users as $i => $user) {
    if ($user['id'] == $id) {
      $users[$i] = $updateuser = array_merge($user, $data);
    }
  }
  putJson($users);
  return $updateuser;
}
function deleteUser($id)
{
  $users = getUsers();
  foreach ($users as $i => $user) {
    if ($user['id'] == $id) {
      //  unset($users['id']);
      array_splice($users, $i, 1);
    }
  }
  putJson($users);
}
function uploadfile($file, $user)
{
  $idUser = $user['id'];

  if (isset($_FILES['image']) && $_FILES['image']['name']) {
    if (!is_dir(__DIR__ . "/images")) {
      mkdir(__DIR__ . "/images");
    }
    $filename = $file['name'];
    $posExt = strpos($filename, '.');
    $extension = substr($filename, $posExt + 1);
    move_uploaded_file($file['tmp_name'], __DIR__ . "/images/$idUser.$extension");
    
    // Update the extension in the user array
    $user['extension'] = $extension;
    updateUser($user, $idUser);
    
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
      // Delete the previous image file
      $previousImage = $user['image'];
      if (!empty($previousImage)) {
        $imagePath = __DIR__ . "/images/" . $previousImage;
        if (file_exists($imagePath)) {
          unlink($imagePath);
        }
      }
    }
  }
}

function putJson($users)
{
  $newdata = json_encode($users, JSON_PRETTY_PRINT);
  file_put_contents(__DIR__ . '/users.json', $newdata);
}
function validateUser($user,&$errors)
{

$isValid=true;
  if (!$user['name']) {
    $isValid = false;
    $errors['name'] = 'name is mandatory';
  }
  if (!$user['username'] || strlen($user['username']) < 6 || strlen($user['username']) > 16) {
    $isValid = false;
    $errors['username'] = 'username is mandatory and must between 6 to 16';
  }
  if ($user['email'] && !filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
    $isValid = false;
    $errors['emai'] = 'Invalid email';
  }
  // if ($user['phone'] && !filter_var($user['phone'], FILTER_VALIDATE_INT)) {
  //   $isValid = false;
  //   $errors['phone'] = 'Invalid phone';
  // }
  if ($user['website'] && !filter_var($user['website'], FILTER_VALIDATE_URL)) {
    $isValid = false;
    $errors['website'] = 'Invalid url';
  }
  return $isValid;
}
