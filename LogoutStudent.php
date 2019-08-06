<?php
session_start();
session_destroy();
echo "<script>window.open('StudentLogin.php','_self')</script>";



?>