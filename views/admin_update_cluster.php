<?php
@include('admin_header.php');
?>

<?php
$cluster_ID = $_GET['edit_cluster'];
$cluster = first('cluster', ['cluster_ID' => $cluster_ID]);
?>
<div class="home-content">

    <div class="acc-boxes justify-content-center p-4 m-auto" style="width: 600px;">
        <div class="recent-acc box">
            <h4>Update Cluster Coordinator</h4>
            <form action="../actions/admin_update.php" method="POST">
                <div class="m-1">
                    <label for="">Title</label>
                    <input class="form-control" type="text" name="cluster_title" placeholder="Enter your cluster chair title" value="<?= $cluster['cluster_title'] ?>">
                    <?php if (showError('cluster_title')) : ?>
                        <p class="error text-danger text-start"><?php echo showError('cluster_title'); ?></p>
                    <?php endif; ?>
                </div>
                <div class="m-1">
                    <input type="hidden" name="cluster_ID" value="<?= $cluster['cluster_ID'] ?>">
                    <button type="submit" name="update_cluster" class="button-size form-control btn-primary rounded">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
@include('footer.php');
?>