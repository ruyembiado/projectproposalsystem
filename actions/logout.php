<?php
require_once '../config/config.php';

session_destroy();
?>
<script>
    setInterval(function() {
        localStorage.setItem("activeLink", "dashboard");
        window.location.href = "../views/index.php";
    }, 100);
</script>