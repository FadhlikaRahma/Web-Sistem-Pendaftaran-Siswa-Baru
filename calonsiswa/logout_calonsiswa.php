<?php
session_start();

session_unset();
session_destroy();

setcookie('nim', '', time() - 3600);
setcookie('key', '', time() - 3600);

header("Location: ../index.php");
exit;

?>