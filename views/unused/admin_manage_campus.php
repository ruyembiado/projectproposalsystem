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
                    <div class="title h4 pe-2">Campus</div>
                    <a class="btn btn-primary btn-sm text-end bg-gradient px-4 mb-2" href="admin_add_campus.php"><i class="fas fa-plus-circle"></i> Add</a>
                </div>
                <table id="example" class="table table-striped" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = findAll('campus');
                            ?>
                            <?php foreach ($result as $row) : ?>
                                <tr>
                                    <td>
                                        <?= $row['campus_name'] ?>
                                    </td>
                                    <td>
                                        <?= $row['campus_address'] ?>
                                    </td>
                                    <td class="text-center" width="10%"><a class="btn btn-primary btn-sm bg-gradient" href="admin_update_campus.php?edit_campus=<?= $row['campus_ID'] ?>"><i class="fa fa-edit"></i>
                                            Update</a></td>
                                    <td class="text-center" width="10%"><a class="btn btn-danger delete btn-sm bg-gradient" href="../actions/admin_delete.php?delete_campus=<?= $row['campus_ID'] ?>"><i class="fa fa-trash"></i>
                                            Delete</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php
            endif;
                ?>

                <?php

                @include('footer.php');

                ?>