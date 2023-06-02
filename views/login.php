<?php
@include('header.php');
?>

<div class="home-content">
    <div class="col-4 mx-auto mt-5 p-5 rounded border shadow">
        <div class="col-7 mx-auto my-2 mb-3">
            <img src="https://static.vecteezy.com/system/resources/previews/004/491/046/original/design-studio-concept-for-web-banner-woman-and-man-designers-team-create-website-layout-and-draw-elements-modern-person-scene-illustration-in-flat-cartoon-design-with-people-characters-vector.jpg" alt="" class="img-fluid">
        </div>
        <h4 class="">Login</h4>
        <h5 class="mb-2" style="font-size: 13px;">Please login to continue</h5>
        <form action="../actions/login.php" method="POST">
            <div class="m-1">
                <label class="labeles" style="font-size: 13px;">Username</label>
                <div class="d-flex align-items-center">
                    <i style="font-size: 14px;" class="fas fa-user position-absolute ms-2 border-end border-secondary pe-2"></i>
                    <input class="form-control" style="text-indent: 21px;" type="text" name="username" value="<?php echo getValue('username'); ?>" placeholder="Enter your username">
                </div>
                <?php if (showError('username')) : ?>
                    <p class="error text-danger text-start m-0" style="font-size: 12px;"><?php echo showError('username'); ?></p>
                <?php endif; ?>
            </div>

            <div class="m-1 mb-3">
                <label class="labeles" style="font-size: 13px;">Password</label>
                <div class="d-flex align-items-center">
                    <i style="font-size: 14px;" class="fas fa-lock position-absolute ms-2 border-end border-secondary pe-2"></i>
                    <input class="form-control" style="text-indent: 21px;" type="password" name="password" placeholder="Enter your password">
                </div>
                <?php if (showError('password')) : ?>
                    <p class="error text-danger text-start m-0" style="font-size: 12px;"><?php echo showError('password'); ?></p>
                <?php endif; ?>
            </div>
            <div class="m-1 mb-4">
                <button type="submit" name="user_login" class="button-size form-control btn-primary rounded" style="font-size: 14px;">Login</button>
            </div>
        </form>
    </div>
</div>

<?php

@include('footer.php');

?>