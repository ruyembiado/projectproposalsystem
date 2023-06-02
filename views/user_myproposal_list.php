<?php

@include('user_header.php');

?>

<div class="home-content pb-5">
    <div class="col-11 mx-auto bg-white p-5 rounded">
        <div class="recent-acc box">

            <div class="d-flex align-items-center justify-content-between">
                <div class="title h4 pe-2">My Proposals</div>
                <a class="btn btn-primary btn-sm text-end bg-gradient px-4 mb-2" href="user_add_proposal.php"><i class="fa fa-plus-circle"></i> New Proposal</a>
            </div>
            <table id="example" class="table table-striped" style="width:100%;">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Date Published</th>
                        <th>Date Updated</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = find_where('proposal', ['cluster_employee_ID' => $_SESSION['cluster_employee_ID']]);
                    ?>
                    <?php foreach ($result as $row) : ?>
                        <tr>
                            <td>
                                <?= $row['title'] ?>
                            </td>
                            <td>
                                <?php echo date('M d, Y h:i a', strtotime($row['date_added'])); ?>
                            </td>
                            <td>
                                <?php echo date('M d, Y h:i a', strtotime($row['date_updated'])); ?>
                            </td>
                            <td class="text-center" width="10%"><a class="btn btn-primary btn-sm bg-gradient" href="user_update_proposal.php?update_proposal=<?= $row['proposal_ID'] ?>"><i class="fa fa-edit"></i>
                                    Update</a></td>
                            <td class="text-center" width="10%"><a class="btn btn-danger delete btn-sm bg-gradient" href="../actions/cluster_delete.php?delete_proposal=<?= $row['proposal_ID'] ?>"><i class="fa fa-trash"></i>
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