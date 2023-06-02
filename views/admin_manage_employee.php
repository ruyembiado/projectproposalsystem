<?php

@include('admin_header.php');

?>

    <div class="home-content pb-5">
        <div class="col-11 mx-auto bg-white p-5 rounded mb-4">
            <div class="recent-acc box">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="title h4 pe-2">Center Chairs</div>
                    <a class="btn btn-primary btn-sm text-end bg-gradient px-4 mb-2" href="admin_add_centerchair.php"><i class="fa fa-plus-circle"></i> Add</a>
                </div>
                <table id="example3" class="table table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Department</th>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = joinTable("center_employee", [["center", "center_employee.center_ID", "center.center_ID"],["department", "center_employee.department_ID", "department.department_ID"]]);
                        ?>
                        <?php foreach ($result as $row) : ?>
                            <tr>
                                <td>
                                    <?= $row['center_employee_name'] ?>
                                </td>
                                <td>
                                    <?= $row['center_employee_username'] ?>
                                </td>
                                <td>
                                    <?= $row['department_name'] ?>
                                </td>
                                <td>
                                    <?= $row['center_title'] ?>
                                </td>
                                <td class="text-center"><a class="btn btn-primary btn-sm bg-gradient" href="admin_update_centeremployee.php?edit_centeremployee=<?= $row['center_employee_ID'] ?>"><i class="fa fa-edit"></i>
                                        Update</a></td>
                                <td class="text-center"><a class="btn btn-danger delete btn-sm bg-gradient" href="../actions/admin_delete.php?delete_centeremployee=<?= $row['center_employee_ID'] ?>"><i class="fa fa-trash"></i>
                                        Delete</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-11 mx-auto bg-white p-5 rounded">
            <div class="recent-acc box">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="title h4 pe-2">Cluster Coordinators</div>
                    <a class="btn btn-primary btn-sm text-end bg-gradient px-4 mb-2" href="admin_add_clustercoordinator.php"><i class="fa fa-plus-circle"></i> Add</a>
                </div>
                <table id="example" class="table table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Department</th>
                            <th>Center Chair</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = joinTable("center", [["cluster", "cluster.center_ID", "center.center_ID"], ["cluster_employee", "cluster.cluster_ID", "cluster_employee.cluster_ID"], ["department", "cluster_employee.department_ID", "department.department_ID"], ["center_employee", "cluster.center_ID", "center.center_ID"]]);
                        ?>
                        <?php foreach ($result as $row) : ?>
                            <!-- <?php print_r($row); ?> -->
                            <tr>
                                <td>
                                    <?= $row['cluster_employee_name'] ?>
                                </td>
                                <td>
                                    <?= $row['cluster_employee_username'] ?>
                                </td>
                                <td>
                                    <?= $row['department_name'] ?>
                                </td>
                                <td>
                                    <?= $row['center_employee_name'] ?>
                                </td>
                                <td class="text-center"><a class="btn btn-primary btn-sm bg-gradient" href="admin_update_employee.php?edit_clusteremployee=<?= $row['cluster_employee_ID'] ?>"><i class="fa fa-edit"></i>
                                        Update</a></td>
                                <td class="text-center"><a class="btn btn-danger delete btn-sm bg-gradient" href="../actions/admin_delete.php?delete_clusteremployee=<?= $row['cluster_employee_ID'] ?>"><i class="fa fa-trash"></i>
                                        Delete</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php

@include('footer.php');

?>