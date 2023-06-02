<?php

@include('user_header.php');

?>
<?php $proposal_ID = $_GET['remark']; ?>

<div class="home-content pb-5">
    <div class="col-11 mx-auto bg-white p-5 rounded">
        <div class="recent-acc box">
            <div class="d-flex">
                <div class="col-md-8 remarks">
                    <div class="remark-title">
                        <h4>Remarks</h4>
                    </div>
                    <?php $result = find_where('remarks', ['proposal_ID' => $proposal_ID]); ?>
                    <?php if ($result) { ?>
                        <?php foreach ($result as $remarks) { ?>
                            <?php if ($remarks['user_type'] == 'center') {
                                $users_name = joinTable('center_employee', [["remarks", "remarks.user_ID", "center_employee.center_employee_ID"]], ['remark_ID' => $remarks['remark_ID']]); ?>
                                <?php foreach ($users_name as $center) {
                                } ?>
                                <div class="user-remark">
                                    <div class="d-flex align-items-center">
                                        <p style="font-weight: 600; margin-bottom: 0px !important;" class="me-2"><?= $center['center_employee_name'] ?></p>
                                        <p style="font-size: 10px; margin-bottom: 0px !important;">
                                            <?php echo
                                            date('M d, Y h:i:s a',  strtotime($center['remark_date'])) ?></p>
                                    </div>
                                    <p class="mb-3"><?= $center['remark'] ?></p>
                                </div>
                            <?php } ?>
                            <?php if ($remarks['user_type'] == 'cluster') {
                                $users_name = joinTable('cluster_employee', [["remarks", "remarks.user_ID", "cluster_employee.cluster_employee_ID"]], ['remark_ID' => $remarks['remark_ID']]); ?>
                                <?php foreach ($users_name as $cluster) { ?>
                                    <div class="user-remark">
                                        <div class="d-flex align-items-center">
                                            <p style="font-weight: 600; margin-bottom: 0px !important;" class="me-2"><?= $cluster['cluster_employee_name'] ?></p>
                                            <p style="font-size: 10px; margin-bottom: 0px !important;">
                                                <?php echo
                                                date('M d, Y h:i:s a',  strtotime($cluster['remark_date'])) ?></p>
                                        </div>
                                        <p class="m-0 mb-3"><?= $cluster['remark'] ?></p>
                                        <?php if (showError('remark')) : ?>
                                            <p class="error text-danger text-start"><?php echo showError('remark'); ?></p>
                                        <?php endif; ?>
                                    </div>
                                <?php  } ?>
                            <?php } ?>
                        <?php } ?>
                    <?php } else { ?>
                        <p class="text-dark">No remarks yet</p>
                    <?php } ?>
                </div>
                <div class="col-md-4 remark_cont">
                    <?php $proposal = first('proposal', ['proposal_ID' => $proposal_ID]); ?>
                    <form action="../actions/remark_add.php" method="post">
                        <?php if (isset($_SESSION['cluster_employee_ID'])) { ?>
                            <?php if ($proposal['cluster_employee_ID'] === $_SESSION['cluster_employee_ID']) { ?>
                                <?php } else { ?><?php $result = find_where('remarks', ['proposal_ID' => $proposal_ID]); ?>
                                <textarea class="form-control" name="remark" rows="10"></textarea>
                                <input type="hidden" name="user_ID" value="<?php echo $_SESSION['cluster_employee_ID']; ?>">
                                <input type="hidden" name="user_type" value="cluster">
                                <input type="hidden" name="proposal_ID" value="<?php echo $proposal_ID; ?>">
                                <button class="btn btn-primary float-end mt-2" type="submit" name="remark_proposal">Remark</button>
                            <?php } ?>
                        <?php } else if (isset($_SESSION['center_employee_ID'])) { ?>
                            <textarea class="form-control" name="remark" rows="10"></textarea>
                            <input type="hidden" name="user_ID" value="<?php echo $_SESSION['center_employee_ID']; ?>">
                            <input type="hidden" name="user_type" value="center">
                            <input type="hidden" name="proposal_ID" value="<?php echo $proposal_ID; ?>">
                            <button class="btn btn-primary float-end mt-2" type="submit" name="remark_proposal">Remark</button>
                        <?php } ?>
                    </form>
                    <?php if (showError('remarks')) : ?>
                        <p class="error text-danger text-start"><?php echo showError('remarks'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

@include('footer.php');

?>