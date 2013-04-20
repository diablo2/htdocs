<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?
$host = "localhost";
$user = "root"; //user ฐานข้อมูล
$passwd = ""; //pass ฐานข้อมูล
$dbname = "webboard";
$admin="root";
$admin_pwd="";
$list_page=15;
$showIP="ALL";
$s_mail = "1";
mysql_connect($host,$user,$passwd) or die("ติดต่อ Host ไม่ได้");
mysql_select_db($dbname) or die("ติดต่อฐานข้อมูลไม่ได้");
?>

</body>
</html>