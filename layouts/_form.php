<div class="container">
    <div class="card mt-3 border-success text-secondary ">
        <div class="card-body text-center ">
            <?php if ($user['id']) : ?>
                <h3> update, <?php echo $user['name'] ?></h3>
            <?php else : ?>
                <h3> Create new user</h3>
            <?php endif ?>
        </div>
    </div>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group row mt-4">
            <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" value="<?php echo $user['name'] ?>" class="form-control
                 <?php echo (isset($errors['name']) && $_SERVER['REQUEST_METHOD'] === 'POST') ? 'is-invalid' : ' ' ?>" placeholder="Name">
                <div class="invalid-feedback">
                    <?php echo $errors['name'] ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">User name</label>
            <div class="col-sm-10">
                <input type="text" name="username" value="<?php echo $user['username'] ?>" class="form-control
                <?php echo (isset($errors['username']) && $_SERVER['REQUEST_METHOD'] === 'POST') ? 'is-invalid' : ' ' ?>" placeholder="User name">
                <div class="invalid-feedback ">
                    <?php echo $errors['username'] ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" name="email" value="<?php echo $user['email'] ?>" class="form-control
                <?php echo (isset($errors['email']) && $_SERVER['REQUEST_METHOD'] === 'POST') ? 'is-invalid' : ' ' ?>" placeholder="Email">
                <div class="invalid-feedback ">
                    <?php echo $errors['email'] ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="text" name="phone" value="<?php echo $user['phone'] ?>" class="form-control
                <?php echo (isset($errors['phone']) && $_SERVER['REQUEST_METHOD'] === 'POST') ? 'is-invalid' : ' ' ?>" placeholder="Phone">
                <div class="invalid-feedback ">
                    <?php echo $errors['phone'] ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Website</label>
            <div class="col-sm-10">
                <input type="text" name="website" value="<?php echo $user['website'] ?>" class="form-control
                <?php echo (isset($errors['website']) && $_SERVER['REQUEST_METHOD'] === 'POST') ? 'is-invalid' : ' ' ?>" placeholder="Website">
                <div class="invalid-feedback ">
                    <?php echo $errors['website'] ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Upload image</label>
            <div class="col-sm-10">
                <input type="file" name="image" class="form-control-file" id="imageInput">

                <?php if (!empty($user['extension'])) : ?>
                    <img src="../images/<?php echo $user['id'] . '.' . $user['extension']; ?>" id="previewImage" alt="Preview Image" style="height: 60px;">
                <?php else : ?>
                    <img src="../images/default.png" id="previewImage" alt="No Image" style="height: 60px;"  id="previewImage">
                <?php endif; ?>

            </div>
        </div>
        <button type="submit" class="btn btn-info">Submit</button>
    </form>
</div>