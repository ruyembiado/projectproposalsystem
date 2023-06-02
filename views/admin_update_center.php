<?php
@include('admin_header.php');
?>
<?php
$center_ID = $_GET['edit_center'];
$center = first('center', ['center_ID' => $center_ID]);
?>
<div class="home-content">
    <div class="acc-boxes justify-content-center p-4 m-auto" style="width: 600px;">
        <div class="recent-acc box">
            <h4>Update Center Chair</h4>
            <form action="../actions/admin_update.php" method="POST">
                <div class="m-1">
                    <label for="">Title</label>
                    <input class="form-control" type="text" name="center_title" placeholder="Enter your center chair title" value="<?= $center['center_title'] ?>">
                    <?php if (showError('center_title')) : ?>
                        <p class="error text-danger text-start"><?php echo showError('center_title'); ?></p>
                    <?php endif; ?>
                </div>
                <div class="m-1">
                    <input type="hidden" name="center_ID" value="<?= $center['center_ID'] ?>">
                    <button type="submit" name="update_center" class="button-size form-control btn-primary rounded">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
@include('footer.php');
?>