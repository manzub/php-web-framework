<?php
/**
 * 
 * Error Page
 * displays all errors
 * 
*/
$tag_color = '7851a9';
session_start();
if(isset($_SESSION['error_vars'])){
    $mysessionvars = $_SESSION['error_vars'];
    echo "<div style='text-align:center;margin-top:100px;font-family:san-serif'>";
        echo "<h1 style='margin:0px;font-size:100px;color:".$tag_color."'>".$mysessionvars[1]."</h1>";
        echo "<p style='font-size:30px'>".$mysessionvars[0]."</p>";
    echo "</div>";
    unset($_SESSION['error_vars']);
}else{
    echo "<div class='text-center alert-danger' style='margin-top:0px;font-family:san-serif'>";
        echo "<span class='pull-left' style='margin-right:5px;font-weight:900'>".$tag."</span>";
        echo "<span>".$error."</span>";
    echo "</div>";
}Í