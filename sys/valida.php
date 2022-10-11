<?php
session_start();
require("include/arruma_link.php");
//session_cache_expire(10);
if (empty($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;
}
?>