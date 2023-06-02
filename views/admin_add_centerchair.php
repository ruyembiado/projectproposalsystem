<?php
@include('admin_header.php');
?>

<div class="home-content">
    <div class="col-4 bg-white mx-auto mt-3 mb-5 p-5 rounded border shadow">
        <h4>Add Center Chair Employee</h4>
        <form action="../actions/admin_add.php" method="POST">
            <div class="m-1">
                <label for="">Employee's Name</label>
                <input class="form-control" type="text" name="center_employee_name" placeholder="Enter center chair name" value="<?php echo getValue('center_employee_name'); ?>">
                <?php if (showError('center_employee_name')) : ?>
                    <p class="error text-danger text-start"><?php echo showError('center_employee_name'); ?></p>
                <?php endif; ?>
            </div>
            <div class="m-1">
                <label for="">Title:</label>
                <select class="form-select" name="center_ID">
                    <?php $result = findAll('center'); ?>
                    <?php if (empty($result)) { ?>
                        <option value="0">No title available</option>
                    <?php } else { ?>
                        <?php foreach ($result as $row) : ?>
                            <option value="<?= $row['center_ID'] ?>"><?= $row['center_title'] ?></option>
                        <?php endforeach; ?>
                    <?php } ?>
                </select>
            </div>
            <div class="m-1">
                <label for="">Department</label>
                <select class="form-select" name="department_ID">
                    <?php $result = findAll('department'); ?>
                    <?php if (empty($result)) { ?>
                        <option value="0">No department available</option>
                    <?php } else { ?>
                        <?php foreach ($result as $row) : ?>
                            <option value="<?= $row['department_ID'] ?>"><?= $row['department_name'] ?></option>
                        <?php endforeach; ?>
                    <?php } ?>
                </select>
            </div>
            <div class="m-1">
                <label for="">Employee's Contact</label>
                <input class="form-control" type="text" name="center_employee_contact" placeholder="Enter center chair contact" value="<?php echo getValue('center_employee_contact'); ?>">
                <?php if (showError('center_employee_contact')) : ?>
                    <p class="error text-danger text-start"><?php echo showError('center_employee_contact'); ?></p>
                <?php endif; ?>
            </div>

            <div class="m-1">
                <label for="">Employee's Username</label>
                <input class="form-control" type="text" name="center_employee_username" placeholder="Enter center chair username" value="<?php echo getValue('center_employee_username'); ?>">
                <?php if (showError('center_employee_username')) : ?>
                    <p class="error text-danger text-start"><?php echo showError('center_employee_username'); ?></p>
                <?php endif; ?>
            </div>

            <div class="m-1">
                <label for="">Employee's Password</label>
                <input class="form-control" type="password" name="center_employee_password" placeholder="Enter center chair password" value="<?php echo getValue('center_employee_password'); ?>">
                <?php if (showError('center_employee_password')) : ?>
                    <p class="error text-danger text-start"><?php echo showError('center_employee_password'); ?></p>
                <?php endif; ?>
            </div>

            <div class="m-1">
                <label for="">Confirm Password</label>
                <input class="form-control" type="password" name="conf_password" placeholder="Re-enter center chair password" value="<?php echo getValue('conf_password'); ?>">
                <?php if (showError('conf_password')) : ?>
                    <p class="error text-danger text-start"><?php echo showError('conf_password'); ?></p>
                <?php endif; ?>
            </div>

            <div class="m-1">
                <button type="submit" name="add_centeremployee" class="button-size form-control btn-primary rounded">Add</button>
            </div>
        </form>
    </div>
</div>
<?php
@include('footer.php');
?>