<?php
@include('admin_header.php');
?>

<?php
$course_ID = $_GET['edit_course'];
$course = first('course', ['course_ID' => $course_ID]);
?>

<div class="home-content">
    <?php
    if (isset($_SESSION['isLogin'])) :
    ?>
        <div class="acc-boxes justify-content-center p-4 m-auto" style="width: 600px;">
            <div class="recent-acc box">
                <h4>Update Course</h4>
                <form action="../actions/admin_update.php" method="POST">
                    <div class="m-1">
                        <label for="">Course Name</label>
                        <input class="form-control" type="text" name="course_name" placeholder="Enter course name" value="<?= $course['course_name'] ?>">
                    </div>
                    <?php if (showError('course_name')) : ?>
                        <p class="error text-danger text-start"><?php echo showError('course_name'); ?></p>
                    <?php endif; ?>
                    <div class="m-1">
                        <label for="">Department</label>
                        <select class="form-select" name="department_ID">
                            <?php $result = findAll('department'); ?>
                            <?php foreach ($result as $row) : ?>
                                <?php if ($result == NULL) { ?>
                                    <option value="0">No department available</option>
                                <?php } else { ?>
                                    <option value="<?= $row['department_ID'] ?>" <?= $row['department_ID'] == $course['department_ID'] ? 'selected' : '' ?>>
                                        <?= $row['department_name'] ?>
                                    </option>
                                <?php } ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="m-1">
                        <input type="hidden" name="course_ID" value="<?= $course['course_ID'] ?>">
                        <button type="submit" name="update_course" class="button-size form-control btn-primary rounded">Update</button>
                    </div>
                </form>
            </div>
        </div>
</div>

<?php endif; ?>

<?php
@include('footer.php');
?>