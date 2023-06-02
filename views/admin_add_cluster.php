<?php
@include('admin_header.php');
?>

<div class="home-content">

    <div class="acc-boxes justify-content-center p-4 m-auto" style="width: 600px;">
        <div class="recent-acc box">
            <h4>Add Cluster Coordinator</h4>
            <form action="../actions/admin_add.php" method="POST">
                <div class="m-1">
                    <label for="">Title</label>
                    <input class="form-control" type="text" name="cluster_title" placeholder="Enter your cluster coordination title" value="<?php echo getValue('cluster_title'); ?>">
                    <?php if (showError('cluster_title')) : ?>
                        <p class="error text-danger text-start"><?php echo showError('cluster_title'); ?></p>
                    <?php endif; ?>
                </div>
                <div class="m-1">
                    <label for="">Center Chair</label>
                    <select class="form-select" name="center_ID">
                        <?php $result = findAll('center'); ?>
                        <?php if (empty($result)) { ?>
                            <option value="0">No center chair available</option>
                        <?php } else { ?>
                            <?php foreach ($result as $row) : ?>
                                <option value="<?= $row['center_ID'] ?>"><?= $row['center_title'] ?></option>
                            <?php endforeach; ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="m-1">
                    <button type="submit" name="add_cluster" class="button-size form-control btn-primary rounded">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
@include('footer.php');
?>