<?php
$adminMenu=$_POST['admin_functions'];
switch ($adminMenu) {
	case "addnewscategory" :
		addnewscategory();
		break;
	default :
		break;
}
function dbConfig() {
	$host = "localhost";
	$user = "root";
	$pass = "root";
	$database = "tamil";
	$port = 3306;
	$connect = mysql_connect($host, $user, $pass);
	if ($connect) {
		$selectdb = mysql_select_db($database);
		return true;
	} else {
		echo "Connection Failed" . mysql_error();
		return false;
	}
}

function addnewscategory() {
	$dbConfig = dbConfig();
	$p_news_category = mysql_real_escape_string($_POST['news_category']);
	if ($dbConfig) {
		$sqlAddNewsCategory = "INSERT INTO `news_category`(`name`) 
				VALUES('$p_news_category')";
		$resultAddNewsCategory = mysql_query($sqlAddNewsCategory);
		if ($resultAddNewsCategory) {
			$msg="Added news category was successful";
			$url = "dashboard.php?msg=$msg";
			echo $url;
		}
	}
}
function listNewsCategory(){
	$dbConfig = dbConfig();
	if ($dbConfig) {
		$sqlListNewsCategory = "SELECT * FROM news_category;";
		$resultListNewsCategory = mysql_query($sqlListNewsCategory);
		if ($resultListNewsCategory) {
			while($result=mysql_fetch_array($resultListNewsCategory)){
				$listNewsCategory[]=$result;
			}
			return $listNewsCategory;
		}
	}
}
?>
