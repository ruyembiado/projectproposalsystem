<?php
@include('admin_header.php');
?>

<div class="home-content">
<?php
if(isset($_SESSION['isLogin'])) :
?>
    <div class="acc-boxes justify-content-center p-4 m-auto" style="width: 600px;">
        <div class="recent-acc box">
            <h4>Add Campus</h4>
            <form action="../actions/admin_add.php" method="POST">
                <div class="m-1">
                    <label for="">Campus Name</label>
                    <input class="form-control" type="text" name="campus_name" placeholder="Enter your campus name" value="<?php echo getValue('campus_name'); ?>">
                </div>
                <?php if (showError('campus_name')) : ?>
                    <p class="error text-danger text-start"><?php echo showError('campus_name'); ?></p>
                <?php endif; ?>
                <div class="m-1">
                    <button type="submit" name="add_campus" class="button-size form-control btn-primary rounded">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php endif; ?>

<?php
@include('footer.php');
?>