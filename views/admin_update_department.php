<?php
@include('admin_header.php');
?>

<?php
$department_ID = $_GET['edit_department'];
$department = first('department', ['department_ID' => $department_ID]);
?>

<div class="home-content">

    <div class="acc-boxes justify-content-center p-4 m-auto" style="width: 600px;">
        <div class="recent-acc box">
            <h4>Update Department</h4>
            <form action="../actions/admin_update.php" method="POST">
                <div class="m-1">
                    <label for="">Department Name</label>
                    <input class="form-control" type="text" name="department_name" placeholder="Enter your department name" value="<?= $department['department_name'] ?>">
                    <?php if (showError('department_name')) : ?>
                        <p class="error text-danger text-start"><?php echo showError('department_name'); ?></p>
                    <?php endif; ?>
                </div>

                <div class="m-1">
                    <input type="hidden" name="department_ID" value="<?= $department['department_ID'] ?>">
                    <button type="submit" name="update_department" class="button-size form-control btn-primary rounded">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
@include('footer.php');
?>