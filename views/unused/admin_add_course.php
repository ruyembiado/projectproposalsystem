<?php
@include('admin_header.php');
?>

<div class="home-content">
<?php
if(isset($_SESSION['isLogin'])) :
?>
    <div class="acc-boxes justify-content-center p-4 m-auto" style="width: 600px;">
        <div class="recent-acc box">
            <h4>Add Course</h4>
            <form action="../actions/admin_add.php" method="POST">
                <div class="m-1">
                    <label for="">Course Name</label>
                    <input class="form-control" type="text" name="course_name" placeholder="Enter course name" value="<?php echo getValue('course_name'); ?>">
                </div>
                <?php if (showError('course_name')) : ?>
                    <p class="error text-danger text-start"><?php echo showError('course_name'); ?></p>
                <?php endif; ?>
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
                    <button type="submit" name="add_course" class="button-size form-control btn-primary rounded">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php endif; ?>

<?php
@include('footer.php');
?>