<?php
session_start();
$url = $_SERVER['BASE_URL'];
unset($_SESSION['user']);
header("Location: ".$url."/UFGDWiki");
exit;