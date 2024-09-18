<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Admins/ Staff
                <a href="admin-create.php" class="btn btn-primary float-end">Add Admin</a>
            </h4>
        </div>
        <div class="card-body">
            <?php alertmessage() ?>
            <?php
            $admins = getAll('admins');

            if(!$admins){
                echo'<h4>Something Went Wrong</h4>';
                return false;
            }

            if (mysqli_num_rows($admins) > 0) {

            ?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($admins as $adminItem) : ?>
                                <tr>
                                    <td><?= $adminItem['id'] ?></td>
                                    <td><?= $adminItem['name'] ?></td>
                                    <td><?= $adminItem['email'] ?></td>
                                    <td>
                                        <a href="admin-edit.php" class="btn btn-sm btn-success">Edit</a>
                                        <a href="admin-delete.php" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php
            } else {
            ?>
                <tr>
                    <h4 class="mb-0">No Record found!</h4>
                </tr>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>