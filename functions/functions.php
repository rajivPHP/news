<?php
function connectDB($hostname, $username, $password, $db_name) {
    global $connect;
    global $hostname;
    global $username;
    global $password;
    global $db_name;
    global $err_msg;
	mysql_set_charset('utf8');
    $connect = mysql_connect($hostname, $username, $password);
    if ($connect) {
    	$selectDB = mysql_select_db($db_name);
        return true;
    } else {
        $err_msg = "Could not Connect to DB" . mysql_error();
        return false;
    }
}


function updateEmployee($firstName, $lastName, $extension, $email, $jobTitle) {
    global $connect;
    global $err_msg;
    if ($connect) {
        $sqlUpdateEmployee = "UPDATE employees SET ,firstName='$firstName',lastName='$lastName'
		,extension='$extension',email='$email',jobTitle='$jobTitle'";
        $resultUpdateEmployee = mysql_query($sqlUpdateEmployee);
        return mysql_affected_rows($resultUpdateEmployee, $connect);
    } else {
        $err_msg = "Could not Add Employees" . mysql_error();
        return false;
    }
}

function listEmployee() {
    global $connect;
    global $err_msg;
    if ($connect) {
        $sqlListEmployee = "SELECT * FROM employees";
        $resultListEmployee = mysql_query($sqlListEmployee);
        $i = 0;
        while ($resultData = mysql_fetch_assoc($resultListEmployee)) {
            $listAll [$i] = $resultData;
            $i++;
        }
        return $listAll;
    } else {
        $err_msg = "Could not List Employees" . mysql_error();
        return false;
    }
}


function userLogin($username,$password,$user_category){
    global $connect;
    global $err_msg;
    if($connect){
        $sqlCheckLogin = "SELECT * FROM users where username='$username' and password='$password' and user_category=$user_category";
        $resultLogin = mysql_query($sqlCheckLogin);
        if($resultLogin)
            return array(mysql_num_rows($resultLogin),mysql_fetch_array($resultLogin));
        }
        else{
            $err_msg="Login Failed";
        }
}
function userLogout(){
    header("location:../../index.php");
}
?>