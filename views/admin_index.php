<?php

@include('admin_header.php');

?>

<div class="home-content">
    <div class="overview-boxes">
        <div class="box mb-4">
            <div class="right-side col-12">
                <div class="box-topic">Total Colleges</div>
                <?php $result = findAll('college'); ?>
                <div class="number"><?php echo count($result); ?></div>
                <div class="indicator">
                    <div class="button">
                        <a href="../views/admin_manage_college.php">See All</a>
                    </div>
                </div>  
            </div>
            <img src="image/n3.png" width="25px" alt="">
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="box mb-4">
            <div class="right-side col-12">
                <div class="box-topic">Total Department</div>
                <?php $result = findAll('department'); ?>
                <div class="number"><?php echo count($result); ?></div>
                <div class="indicator">
                    <div class="button">
                        <a href="../views/admin_manage_department.php">See All</a>
                    </div>
                </div>
            </div>
            <img src="image/n3.png" width="25px" alt="">
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="box mb-4">
            <div class="right-side">
                <div class="box-topic">Total Center Positions</div>
                <?php $result = findAll('center'); ?>
                <div class="number"><?php echo count($result); ?></div>
                <div class="indicator">
                    <div class="button">
                        <a href="../views/admin_manage_position.php">See All</a>
                    </div>
                </div>
            </div>
            <img src="image/n3.png" width="25px" alt="">
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="box mb-4">
            <div class="right-side">
                <div class="box-topic">Total Cluster Positions</div>
                <?php $result = findAll('cluster'); ?>
                <div class="number"><?php echo count($result); ?></div>
                <div class="indicator">
                    <div class="button">
                        <a href="../views/admin_manage_position.php">See All</a>
                    </div>
                </div>
            </div>
            <img src="image/n3.png" width="25px" alt="">
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="box mb-4">
            <div class="right-side">
                <div class="box-topic">Total Center Employees</div>
                <?php $result = findAll('cluster_employee'); ?>
                <div class="number"><?php echo count($result); ?></div>
                <div class="indicator">
                    <div class="button">
                        <a href="../views/admin_manage_employee.php">See All</a>
                    </div>
                </div>
            </div>
            <img src="image/n3.png" width="25px" alt="">
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="box mb-4">
            <div class="right-side">
                <div class="box-topic">Total Cluster Employees</div>
                <?php $result = findAll('cluster_employee'); ?>
                <div class="number"><?php echo count($result); ?></div>
                <div class="indicator">
                    <div class="button">
                        <a href="../views/admin_manage_employee.php">See All</a>
                    </div>
                </div>
            </div>
            <img src="image/n3.png" width="25px" alt="">
        </div>
    </div>
</div>
<?php

@include('footer.php');

?>