<?php

session_start();

ob_start();

session_destroy();

echo "Islem basarili";

echo "<script>window.location='login.php';</script>";

?>