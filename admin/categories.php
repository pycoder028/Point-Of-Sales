<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Categories
                <a href="category-create.php" class="btn btn-primary float-end">Add Category</a>
            </h4>
        </div>
        <div class="card-body">
            <?php alertmessage() ?>
            <?php
            $categories = getAll('categories');

            if(!$categories){
                echo'<h4>Something Went Wrong</h4>';
                return false;
            }

            if (mysqli_num_rows($categories) > 0) {

            ?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($categories as $Item) : ?>
                                <tr>
                                    <td><?= $Item['id'] ?></td>
                                    <td><?= $Item['name'] ?></td>
                                    <td>
                                        <?php 
                                        if($Item['status'] == 1) {
                                            echo '<span class="badge bg-danger">Hidden</span>';
                                        }else{
                                            echo '<span class="badge bg-success">Visible</span>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="category-edit.php?id=<?=$Item['id']; ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                        <a href="category-delete.php?id=<?=$Item['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa-solid fa-trash-can"></i></a>
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