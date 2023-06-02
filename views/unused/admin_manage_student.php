<?php

@include('admin_header.php');

?>

<div class="home-content">
    <div class="col-11 mx-auto bg-white p-5 rounded">
        <div class="recent-acc box">
            <?php
            if (isset($_SESSION['isLogin'])) :
            ?>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="title h4 pe-2">Students</div>
                    <a class="btn btn-primary btn-sm px-4 bg-gradient px-4 mb-2" href="admin_add_student.php"><i class="fa fa-plus-circle"></i> Add</a>
                </div>
                <table id="example" class="table table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Course</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = joinTable("student", [["course", "course.course_ID", "student.course_ID"]]);
                        ?>
                        <?php foreach ($result as $row) : ?>
                            <tr>
                                <td>
                                    <?= $row['student_name'] ?>
                                </td>
                                <td>
                                    <?= $row['student_username'] ?>
                                </td>
                                <td>
                                    <?= $row['course_name'] ?>
                                </td>
                                <td class="text-center" width="10%"><a class="btn btn-primary btn-sm bg-gradient" href="admin_update_student.php?edit_student=<?= $row['student_ID'] ?>"><i class="fa fa-edit"></i>
                                        Update</a></td>
                                <td class="text-center" width="10%"><a class="btn btn-danger delete btn-sm bg-gradient" href="../actions/admin_delete.php?delete_student=<?= $row['student_ID'] ?>"><i class="fa fa-trash"></i>
                                        Delete</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        </div>
    <?php
            endif;
    ?>

    <?php

    @include('footer.php');

    ?>