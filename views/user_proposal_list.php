<?php

@include('user_header.php');

?>

<div class="home-content pb-5">
    <div class="col-11 mx-auto bg-white p-5 rounded">
        <div class="recent-acc box">

            <div class="d-flex align-items-center justify-content-between">
                <div class="title h4 pe-2">Proposals</div>
            </div>
            <table id="example" class="table table-striped" style="width:100%;">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Proponent</th>
                        <th>Date Published</th>
                        <th>Date Updated</th>
                        <!-- <th>Remarks</th> -->
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = joinTable("proposal", [["cluster_employee", "cluster_employee.cluster_employee_ID", "proposal.cluster_employee_ID"]]);
                    ?>
                    <?php foreach ($result as $row) : ?>

                        <tr>
                            <td>
                                <?= $row['title'] ?>
                            </td>
                            <td>
                                <?= $row['cluster_employee_name'] ?>
                            </td>
                            <td>
                                <?php echo date('M d, Y h:i a', strtotime($row['date_added'])); ?>
                            </td>
                            <td>
                                <?php echo date('M d, Y h:i a', strtotime($row['date_updated'])); ?>
                            </td>
                            <!-- <td class="scrollable" width="14%">
                                <?php $result = find_where('remarks', ['proposal_ID' => $row['proposal_ID']]); ?>
                                <?php foreach ($result as $remarks) { ?>
                                    <?php if ($remarks['user_type'] == 'center') {
                                        $users_name = joinTable('center_employee', [["remarks", "remarks.user_ID", "center_employee.center_employee_ID"]], ['remark_ID' => $remarks['remark_ID']]); ?>
                                        <?php foreach ($users_name as $name) { ?>
                                            <div class="">
                                                <?php echo $name['center_employee_name']; ?>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if ($remarks['user_type'] == 'cluster') {
                                        $users_name = joinTable('cluster_employee', [["remarks", "remarks.user_ID", "cluster_employee.cluster_employee_ID"]], ['remark_ID' => $remarks['remark_ID']]); ?>
                                        <?php foreach ($users_name as $name) {
                                            echo $name['cluster_employee_name'];
                                        } ?>
                                    <?php } ?>
                                <?php } ?>
                                <?php if ($result) {
                                } else { ?>
                                    <p class="text-danger">No remarks</p>
                                <?php } ?>
                            </td> -->
                            <td class="text-center" width="10%"><a class="btn btn-secondary btn-sm bg-gradient" href="user_view_proposal.php?view_proposal=<?= $row['proposal_ID'] ?>"><i class="fa fa-eye"></i>
                                    View</a></td>
                            <td class="text-center" width="10%"><a class="btn btn-primary btn-sm bg-gradient" href="user_remark.php?remark=<?= $row['proposal_ID'] ?>"><i class="fa fa-comment"></i>
                                    Remark</a></td>
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