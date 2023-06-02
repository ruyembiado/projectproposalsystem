<?php
@include('admin_header.php');
?>

<?php
$center_employee_ID = $_GET['edit_centeremployee'];
$employee = first('center_employee', ['center_employee_ID' => $center_employee_ID]);
?>

<div class="home-content">

    <div class="acc-boxes justify-content-center p-4 m-auto" style="width: 600px;">
        <div class="recent-acc box">
            <h4>Update Center Chair Employee</h4>
            <form action="../actions/admin_update.php" method="POST">
                <div class="m-1">
                    <label for="">Employee's Name</label>
                    <input class="form-control" type="text" name="center_employee_name" placeholder="Enter center chair name" value="<?= $employee['center_employee_name'] ?>">
                    <?php if (showError('center_employee_name')) : ?>
                        <p class="error text-danger text-start"><?php echo showError('center_employee_name'); ?></p>
                    <?php endif; ?>
                </div>

                <div class="m-1">
                    <label for="">Employee's Title</label>
                    <select class="form-select" name="center_ID">
                        <?php $result = findAll('center'); ?>
                        <?php foreach ($result as $row) : ?>
                            <?php if ($result == NULL) { ?>
                                <option value="0">No title available</option>
                            <?php } else { ?>
                                <option value="<?= $row['center_ID'] ?>" <?= $row['center_ID'] == $employee['center_ID'] ? 'selected' : '' ?>>
                                    <?= $row['center_title'] ?>
                                </option>
                            <?php } ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="m-1">
                    <label for="">Employee's Department</label>
                    <select class="form-select" name="department_ID">
                        <?php $result = findAll('department'); ?>
                        <?php foreach ($result as $row) : ?>
                            <?php if ($result == NULL) { ?>
                                <option value="0">No department available</option>
                            <?php } else { ?>
                                <option value="<?= $row['department_ID'] ?>" <?= $row['department_ID'] == $employee['department_ID'] ? 'selected' : '' ?>>
                                    <?= $row['department_name'] ?>
                                </option>
                            <?php } ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="m-1">
                    <input type="hidden" name="center_employee_ID" value="<?= $employee['center_employee_ID'] ?>">
                    <button type="submit" name="update_centeremployee" class="button-size form-control btn-primary rounded">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
@include('footer.php');
?>