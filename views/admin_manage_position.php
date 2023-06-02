<?php

@include('admin_header.php');

?>

<div class="home-content pb-5">

    <div class="row mx-auto">
        <div class="col-6">
            <div class="card mx-auto bg-white p-5 border-0 rounded">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="title h4 pe-2">Center Chair Title</div>
                    <a class="btn btn-primary btn-sm text-end bg-gradient px-4 mb-2" href="admin_add_center.php"><i class="fas fa-plus-circle"></i> Add</a>
                </div>
                <table id="example" class="table table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <!-- <th>Position</th> -->
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = findAll('center');
                        ?>
                        <?php foreach ($result as $row) : ?>
                            <tr>
                                <!-- <td>
                                        <?= $row['center_position'] ?>
                                    </td> -->
                                <td>
                                    <?= $row['center_title'] ?>
                                </td>
                                <td class="text-center"><a class="btn btn-primary btn-sm bg-gradient" href="admin_update_center.php?edit_center=<?= $row['center_ID'] ?>"><i class="fa fa-edit"></i>
                                        Update</a></td>
                                <td class="text-center"><a class="btn btn-danger delete btn-sm bg-gradient" href="../actions/admin_delete.php?delete_center=<?= $row['center_ID'] ?>"><i class="fa fa-trash"></i>
                                        Delete</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-6">
            <div class="card mx-auto bg-white p-5 border-0 rounded">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="title h4 pe-2">Cluster Coordinator Title</div>
                    <a class="btn btn-primary btn-sm text-end bg-gradient px-4 mb-2" href="admin_add_cluster.php"><i class="fas fa-plus-circle"></i> Add</a>
                </div>
                <table id="example2" class="table table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <!-- <th>Position</th> -->
                            <th>Title</th>
                            <th>Center Chair</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = joinTable("cluster", [["center", "cluster.center_ID", "center.center_ID"]]);
                        ?>
                        <?php foreach ($result as $row) : ?>
                            <tr>
                                <!-- <td>
                                        <?= $row['cluster_position'] ?>
                                    </td> -->
                                <td>
                                    <?= $row['cluster_title'] ?>
                                </td>
                                <td>
                                    <?= $row['center_title'] ?>
                                </td>
                                <td class="text-center"><a class="btn btn-primary btn-sm bg-gradient" href="admin_update_cluster.php?edit_cluster=<?= $row['cluster_ID'] ?>"><i class="fa fa-edit"></i>
                                        Update</a></td>
                                <td class="text-center"><a class="btn btn-danger delete btn-sm bg-gradient" href="../actions/admin_delete.php?delete_cluster=<?= $row['cluster_ID'] ?>"><i class="fa fa-trash"></i>
                                        Delete</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php

@include('footer.php');

?>