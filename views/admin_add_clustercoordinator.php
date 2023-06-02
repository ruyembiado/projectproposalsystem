<?php
@include('admin_header.php');
?>

<div class="home-content pb-5">

    <div class="col-md-6 col-lg-4 col-sm-10 bg-white mx-auto p-5 rounded border shadow">
        <h4>Add Cluster Coordinator Employee</h4>
        <form action="../actions/admin_add.php" method="POST">
            <div class="m-1">
                <label for="">Employee's Name</label>
                <input class="form-control" type="text" name="cluster_employee_name" placeholder="Enter cluster coordinator name" value="<?php echo getValue('cluster_employee_name'); ?>">
                <?php if (showError('cluster_employee_name')) : ?>
                    <p class="error text-danger text-start"><?php echo showError('cluster_employee_name'); ?></p>
                <?php endif; ?>
            </div>

            <div class="m-1">
                <label for="">Center Chair:</label>
                <select class="form-select" id="center_ID" name="center_ID">
                    <?php $centers = findAll('center'); ?>
                    <?php if (empty($centers)) { ?>
                        <option value="0">No title available</option>
                    <?php } else { ?>
                        <option selected value="0">Select Center Chair</option>
                        <?php foreach ($centers as $center) : ?>
                            <option value="<?= $center['center_ID'] ?>"><?= $center['center_title'] ?></option>
                        <?php endforeach; ?>
                    <?php } ?>
                </select>
            </div>
            <div class="m-1">
                <label for="">Title:</label>
                <select class="form-select" id="cluster_ID" name="cluster_ID">
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
                <input class="form-control" type="text" name="cluster_employee_contact" placeholder="Enter cluster coordinator contact" value="<?php echo getValue('cluster_employee_contact'); ?>">
                <?php if (showError('cluster_employee_contact')) : ?>
                    <p class="error text-danger text-start"><?php echo showError('cluster_employee_contact'); ?></p>
                <?php endif; ?>
            </div>

            <div class="m-1">
                <label for="">Employee's Username</label>
                <input class="form-control" type="text" name="cluster_employee_username" placeholder="Enter cluster coordinator username" value="<?php echo getValue('cluster_employee_username'); ?>">
                <?php if (showError('cluster_employee_username')) : ?>
                    <p class="error text-danger text-start"><?php echo showError('cluster_employee_username'); ?></p>
                <?php endif; ?>
            </div>

            <div class="m-1">
                <label for="">Employee's Password</label>
                <input class="form-control" type="password" name="cluster_employee_password" placeholder="Enter cluster coordinator password" value="<?php echo getValue('cluster_employee_password'); ?>">
                <?php if (showError('cluster_employee_password')) : ?>
                    <p class="error text-danger text-start"><?php echo showError('cluster_employee_password'); ?></p>
                <?php endif; ?>
            </div>

            <div class="m-1">
                <label for="">Confirm Password</label>
                <input class="form-control" type="password" name="conf_password" placeholder="Re-enter cluster coordinator password" value="<?php echo getValue('conf_password'); ?>">
                <?php if (showError('conf_password')) : ?>
                    <p class="error text-danger text-start"><?php echo showError('conf_password'); ?></p>
                <?php endif; ?>
            </div>

            <div class="m-1">
                <button type="submit" name="add_clusteremployee" class="button-size form-control btn-primary rounded">Add</button>
            </div>
        </form>
    </div>
</div>


<?php
@include('footer.php');
?>