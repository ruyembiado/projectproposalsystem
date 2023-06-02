<?php

@include('admin_header.php');

?>

<div class="home-content pb-5">
    <div class="col-11 mx-auto bg-white p-5 rounded">
        <div class="recent-acc box">

            <div class="d-flex align-items-center justify-content-between">
                <div class="title h4 pe-2">Departments</div>
                <a class="btn btn-primary btn-sm text-end bg-gradient px-4 mb-2" href="admin_add_department.php"><i class="fa fa-plus-circle"></i> Add</a>
            </div>
            <table id="example" class="table table-striped" style="width:100%;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>College</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = joinTable("college", [["department", "college.college_ID", "department.college_ID"]]);
                    ?>
                    <?php foreach ($result as $row) : ?>
                        <tr>
                            <td>
                                <?= $row['department_name'] ?>
                            </td>
                            <td>
                                <?= $row['college_name'] ?>
                            </td>
                            <td class="text-center" width="10%"><a class="btn btn-primary btn-sm bg-gradient" href="admin_update_department.php?edit_department=<?= $row['department_ID'] ?>"><i class="fa fa-edit"></i>
                                    Update</a></td>
                            <td class="text-center" width="10%"><a class="btn btn-danger delete btn-sm bg-gradient" href="../actions/admin_delete.php?delete_department=<?= $row['department_ID'] ?>"><i class="fa fa-trash"></i>
                                    Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php

            @include('footer.php');

            ?>