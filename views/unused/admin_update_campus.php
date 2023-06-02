<?php
@include('admin_header.php');
?>

<?php
$campus_ID = $_GET['edit_campus'];
$campus = first('campus', ['campus_ID' => $campus_ID]);
?>

<div class="home-content">
    <?php
    if (isset($_SESSION['isLogin'])) :
    ?>
        <div class="acc-boxes justify-content-center p-4 m-auto" style="width: 600px;">
            <div class="recent-acc box">
                <h4>Update Campus</h4>
                <form action="../actions/admin_update.php" method="POST">
                    <div class="m-1">
                        <label for="">Campus Name</label>
                        <input class="form-control" type="text" name="campus_name" placeholder="Enter campus name" value="<?= $campus['campus_name'] ?>">
                    </div>
                    <?php if (showError('campus_name')) : ?>
                        <p class="error text-danger text-start"><?php echo showError('campus_name'); ?></p>
                    <?php endif; ?>
                    <div class="m-1">
                        <input type="hidden" name="campus_ID" value="<?= $campus['campus_ID'] ?>">
                        <button type="submit" name="update_campus" class="button-size form-control btn-primary rounded">Update</button>
                    </div>
                </form>
            </div>
        </div>
</div>

<?php endif; ?>

<?php
@include('footer.php');
?>