<?php
/*
 * 
 * This is the Ajaxcather
 * make all ajax requests to this page and handle it here
 * its custom configured with router,
 * =========================
 * Dont Change Any Auto-Generated Code
 * unless you know what you are doing
 * =========================
 * 
 * 
*/
include 'config/settings.php';
$db = new Database();
$conn = $db->conn;

if (isset($_POST['addtofaves'])) {
  // do something....
}