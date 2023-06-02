<?php
@include('admin_header.php');
?>

<div class="home-content">
    <div class="acc-boxes justify-content-center p-4 m-auto" style="width: 600px;">
        <div class="recent-acc box">
            <h4>Add Department</h4>
            <form action="../actions/admin_add.php" method="POST">
                <div class="m-1">
                    <label for="">Department Name</label>
                    <input class="form-control" type="text" name="department_name" placeholder="Enter your department name" value="">
                    <?php if (showError('department_name')) : ?>
                        <p class="error text-danger text-start"><?php echo showError('department_name'); ?></p>
                    <?php endif; ?>
                </div>
                <div class="m-1">
                    <label for="">College</label>
                    <select class="form-select" name="college_ID">
                        <?php $result = findAll('college'); ?>
                        <?php if (empty($result)) { ?>
                            <option value="0">No center chair available</option>
                        <?php } else { ?>
                            <?php foreach ($result as $row) : ?>
                                <option value="<?= $row['college_ID'] ?>"><?= $row['college_name'] ?></option>
                            <?php endforeach; ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="m-1">
                    <button type="submit" name="add_department" class="button-size form-control btn-primary rounded">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
@include('footer.php');
?>