<?php
@include('admin_header.php');
?>

<div class="home-content">
    <?php
    if (isset($_SESSION['isLogin'])) :
    ?>
        <div class="col-4 bg-white mx-auto mt-5 p-5 rounded border shadow">

            <h4>Add Student</h4>
            <form action="../actions/admin_add.php" method="POST">
                <div class="m-1">
                    <label for="">Student's Name</label>
                    <input class="form-control" type="text" name="student_name" placeholder="Enter your student name" value="<?php echo getValue('student_name'); ?>">
                </div>
                <?php if (showError('student_name')) : ?>
                    <p class="error text-danger text-start"><?php echo showError('student_name'); ?></p>
                <?php endif; ?>
                <div class="m-1">
                    <label for="">Course</label>
                    <select class="form-select" name="course_ID">
                        <?php $result = findAll('course'); ?>
                        <?php if (empty($result)) { ?>
                            <option value="0">No course available</option>
                        <?php  } else { ?>
                            <?php foreach ($result as $row) : ?>
                                <?php
                                $course_ID = $row['course_ID'];
                                $course_name = $row['course_name'];
                                ?>
                                <option value="<?php echo $course_ID; ?>"><?php echo $course_name; ?></option>
                            <?php endforeach; ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="m-1">
                    <label for="">Student's Username</label>
                    <input class="form-control" type="text" name="student_username" placeholder="Enter student username" value="<?php echo getValue('student_username'); ?>">
                </div>
                <?php if (showError('student_username')) : ?>
                    <p class="error text-danger text-start"><?php echo showError('student_username'); ?></p>
                <?php endif; ?>
                <div class="m-1">
                    <label for="">Student's Password</label>
                    <input class="form-control" type="password" name="student_password" placeholder="Enter student password" value="<?php echo getValue('student_password'); ?>">
                </div>
                <?php if (showError('student_password')) : ?>
                    <p class="error text-danger text-start"><?php echo showError('student_password'); ?></p>
                <?php endif; ?>
                <div class="m-1">
                    <label for="">Confirm Password</label>
                    <input class="form-control" type="password" name="conf_password" placeholder="Re-enter student password">
                </div>
                <?php if (showError('conf_password')) : ?>
                    <p class="error text-danger text-start"><?php echo showError('conf_password'); ?></p>
                <?php endif; ?>
                <div class="m-1">
                    <button type="submit" name="add_student" class="button-size form-control btn-primary rounded">Add</button>
                </div>
            </form>
        </div>
</div>

<?php endif; ?>

<?php
@include('footer.php');
?>