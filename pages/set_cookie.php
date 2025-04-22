<?php
session_start();

// Set cookie for 30 days
$cookie_name = "solehub_cookie";
$cookie_value = "user_accepted";
$cookie_expire = time() + (30 * 24 * 60 * 60); 

setcookie($cookie_name, $cookie_value, $cookie_expire, "/");

// Redirect to home page
$redirect_url = "/SPACE/SPACE_apdevet/pages/home.php";
header("Location: " . $redirect_url);
exit();
?>
