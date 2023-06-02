<?php
@include('admin_header.php');
?>
<div class="home-content">
    <div class="acc-boxes justify-content-center p-4 m-auto" style="width: 600px;">
        <div class="recent-acc box">
            <h4>Add College</h4>
            <form action="../actions/admin_add.php" method="POST">
                <div class="m-1">
                    <label for="">College Name</label>
                    <input class="form-control" type="text" name="college_name" placeholder="Enter your college name" value="">
                    <?php if (showError('college_name')) : ?>
                        <p class="error text-danger text-start"><?php echo showError('college_name'); ?></p>
                    <?php endif; ?>
                </div>
                <div class="m-1">
                    <button type="submit" name="add_college" class="button-size form-control btn-primary rounded">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
@include('footer.php');
?>