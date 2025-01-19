<?php
session_start();
session_unset();
session_destroy();

header("Location: https://localhost/Real%20Estate%20System/index.php");
exit();
