<?php
include 'layouts/header.php';

require 'users.php';

if (!isset($_GET['id'])) {
    include 'layouts/not_founded.php';
    exit;
}

$idUser = $_GET['id'];
$users = getUserById($idUser);
if (!isset($users)) {
    include 'layouts/not_founded.php';
    exit;
}
?>

<div class="container mt-4">

<div class="card mt-3 border-success text-secondary">
    <div class="card-body d-flex justify-content-between align-items-center">
        <div>
            <h3>Hi, <?php echo $users['name'] ?></h3>
        </div>
        <div class="d-flex">
            <a href="index.php" class="btn btn-secondary btn-lg mr-2">Back home</a>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="update.php?id=<?php echo $users['id']; ?>" class="btn btn-success">Update</a>
                <form action="delete.php" method="post" class="btn-group" >
                    <input type="hidden" name="id" value="<?php echo $users['id']  ?>">
                    <button type="submit"class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <table class="table">

        <tbody>

            <tr>
                <th scope="row">Name</th>
                <td><?php echo $users['name'] ?? null ?></td>

            </tr>

            <tr>
                <th scope="row">User name</th>
                <td><?php echo $users['username'] ?? null ?></td>

            </tr>
            <tr>
                <th scope="row">Email</th>
                <td><?php echo $users['email'] ?? null ?></td>

            </tr>
            <tr>
                <th scope="row">phone</th>
                <td><?php echo $users['phone'] ?? null ?></td>

            </tr>
            <tr>
                <th scope="row">website</th>
                <td> <a href="<?php echo $users['website'] ?>" target="_blank"><?= $users['website'] ?></a></td>

            </tr>
            <tr>
                <th scope="row">image</th>
                <td>  <img src="images/<?php echo $users['id'] . '.' . $users['extension']; ?>" alt=""
                            style="height: 60px;"></td>

            </tr>
        </tbody>
    </table>


</div>
<?php include 'layouts/footer.php';
?>