<?php
session_start();
session_unset();
session_destroy();

// Redirect to login page
header("Location: https://localhost/Real%20Estate%20System/index.php");
exit();
