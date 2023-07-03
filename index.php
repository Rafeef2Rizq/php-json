<?php 
require 'users.php';
$users = getUsers();
include 'layouts/header.php';
?>

<div class="container">

  
   
    <div class="card mt-3 border-success text-secondary">
    <div class="card-body d-flex justify-content-between">
        <h3>Our Team</h3>
        <a href="create.php" class="btn btn-success">Create</a>
    </div>
</div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">User name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Website</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td>
                        <?php if (isset($user['extension'])): ?>
                            <img src="images/<?php echo $user['id'] . '.' . $user['extension']; ?>" alt=""
                            style="width: 50px;">
                        <?php endif; ?>
                    </td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['phone']; ?></td>
                    <td>
                        <a href="<?php echo $user['website']; ?>" target="_blank"><?php echo $user['website']; ?></a>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="...">
                            <a href="view.php?id=<?php echo $user['id']; ?>" class="btn btn-outline-primary">View</a>
                            <a href="update.php?id=<?php echo $user['id']; ?>" class="btn btn-outline-success">Update</a>
                            <form action="delete.php" method="post" class="btn-group" >
                    <input type="hidden" name="id" value="<?php echo $user['id']  ?>">
                    <button type="submit"class="btn btn-danger">Delete</button>
                </form>                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'layouts/footer.php'; ?>
