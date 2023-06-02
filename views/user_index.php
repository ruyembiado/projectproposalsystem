<?php

@include('user_header.php');

?>

<div class="home-content">
    <div class="overview-boxes">
        <?php if (isset($_SESSION['cluster_employee_ID'])) { ?>
            <div class="box mb-4">
                <div class="right-side">
                    <div class="box-topic">My Proposals</div>
                    <?php $result = find_where('proposal', ['cluster_employee_ID' => $_SESSION['cluster_employee_ID']]); ?>
                    <div class="number"><?php echo count($result); ?></div>
                    <div class="indicator">
                        <div class="button">
                            <a href="../views/user_myproposal_list.php">See All</a>
                        </div>
                    </div>
                </div>
                <img src="image/n3.png" width="25px" alt="">
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php } else { ?>
        <?php } ?>
        <div class="box mb-4">
            <div class="right-side">
                <div class="box-topic">Total Proposals</div>
                <?php $result = findAll('proposal'); ?>
                <div class="number"><?php echo count($result); ?></div>
                <div class="indicator">
                    <div class="button">
                        <a href="../views/user_proposal_list.php">See All</a>
                    </div>
                </div>
            </div>
            <img src="image/n3.png" width="25px" alt="">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
    </div>
</div>


<?php

@include('footer.php');

?>