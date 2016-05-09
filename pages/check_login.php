<?php
/**
 * Created by PhpStorm.
 * User: aequalis
 * Date: 5/3/2016
 * Time: 6:05 PM
 */
/*Include Files*/
include("../config/config.php");
include("../functions/functions.php");
session_start();
/*Post Values*/
$p_username = mysql_real_escape_string($_POST['username']);
$p_password = mysql_real_escape_string($_POST['password']);
$p_category = mysql_real_escape_string($_POST['user_category']);

/*Establish DB Connection*/
$connect = connectDB($hostname, $username, $password, $db_name);
if ($connect) {
    $loginCheck = userLogin($p_username, $p_password, $p_category);
    //echo "<pre>";print_r($loginCheck);exit;
    if ($loginCheck && $loginCheck['1']['user_category'] == 0) {
        $_SESSION['username'] = $p_username;
        $_SESSION['user_category'] = $p_category;
        //header("location:pages/admin/dashboard1.php");
        $url = "pages/admin/dashboard.php";
    } else if ($loginCheck && $loginCheck['1']['user_category'] == 1) {
        $_SESSION['username'] = $p_username;
        $_SESSION['user_category'] = $p_category;
        // header("location:pages/user/dashboard1.php");
        $url = "pages/user/dashboard.php";
    } else {
        $url = "./index.php";
        // header("location:../dashboard1.php");
    }
}
echo $url;
?>