<?php
@include('admin_header.php');
?>
<?php
$college_ID = $_GET['edit_college'];
$college = first('college', ['college_ID' => $college_ID]);
?>
<div class="home-content">
    <div class="acc-boxes justify-content-center p-4 m-auto" style="width: 600px;">
        <div class="recent-acc box">
            <h4>Update College</h4>
            <form action="../actions/admin_update.php" method="POST">
                <div class="m-1">
                    <label for="">College Name</label>
                    <input class="form-control" type="text" name="college_name" placeholder="Enter your college_name" value="<?= $college['college_name'] ?>">
                    <?php if (showError('college_name')) : ?>
                        <p class="error text-danger text-start"><?php echo showError('college_name'); ?></p>
                    <?php endif; ?>
                </div>
                <div class="m-1">
                    <input type="hidden" name="college_ID" value="<?= $college['college_ID'] ?>">
                    <button type="submit" name="update_college" class="button-size form-control btn-primary rounded">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
@include('footer.php');
?>