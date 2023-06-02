<?php
@include('admin_header.php');
?>
<div class="home-content">
    <div class="acc-boxes justify-content-center p-4 m-auto" style="width: 600px;">
        <div class="recent-acc box">
            <h4>Add Center Chair</h4>
            <form action="../actions/admin_add.php" method="POST">
                <div class="m-1">
                    <label for="">Title</label>
                    <input class="form-control" type="text" name="center_title" placeholder="Enter your center chair title" value="<?php echo getValue('center_title'); ?>">
                    <?php if (showError('center_title')) : ?>
                        <p class="error text-danger text-start"><?php echo showError('center_title'); ?></p>
                    <?php endif; ?>
                </div>
                <div class="m-1">
                    <button type="submit" name="add_center" class="button-size form-control btn-primary rounded">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
@include('footer.php');
?>