<?php
@include('admin_header.php');
?>

<?php
$student_ID = $_GET['edit_student'];
$student = first('student', ['student_ID' => $student_ID]);
?>

<div class="home-content">
    <?php
    if (isset($_SESSION['isLogin'])) :
    ?>
        <div class="acc-boxes justify-content-center p-4 m-auto" style="width: 600px;">
            <div class="recent-acc box">
                <h4>Update Student</h4>
                <form action="../actions/admin_update.php" method="POST">
                    <div class="m-1">
                        <label for="">Student's Name</label>
                        <input class="form-control" type="text" name="student_name" placeholder="Enter student name" value="<?= $student['student_name'] ?>">
                    </div>
                    <?php if (showError('student_name')) : ?>
                        <p class="error text-danger text-start"><?php echo showError('student_name'); ?></p>
                    <?php endif; ?>
                    <div class="m-1">
                        <label for="">Course</label>
                        <select class="form-select" name="course_ID">
                            <?php $result = findAll('course'); ?>
                            <?php foreach ($result as $row) : ?>
                                <?php if ($result == NULL) { ?>
                                    <option value="0">No course available</option>
                                <?php } else { ?>
                                    <option value="<?= $row['course_ID'] ?>" <?= $row['course_ID'] == $student['course_ID'] ? 'selected' : '' ?>>
                                        <?= $row['course_name'] ?>
                                    </option>
                                <?php } ?>
                            <?php endforeach; ?>    
                        </select>
                    </div>
                    <input type="hidden" name="student_ID" value="<?= $student['student_ID'] ?>">
                    <div class="m-1">
                        <button type="submit" name="update_student" class="button-size form-control btn-primary rounded">Update</button>
                    </div>
                </form>
            </div>
        </div>
</div>

<?php endif; ?>

<?php
@include('footer.php');
?>