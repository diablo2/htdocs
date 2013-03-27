<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?
include('config.inc.php');
$date_q=date("d/m/y");
$sql = "insert into quiz (title, name, message, email, date_q) values ('$title', '$name', '$message', '$email', '$date_q')"; // กำหนดคำสั่ง SQL เพื่อเพิ่มข้อมูลแบบคีย์ในคำสั่ง SQL
$dbquery = mysql_db_query($dbname, $sql);
// ปิดการติดต่อฐานข้อมูล
mysql_close();
echo "<Font Size=4><B>คำถามของ $name ถูกตั้งเรียบร้อยแล้ว</B><BR>";
echo "<A HREF=\"webboard.php\">กลับไปหน้ากระทู้หลัก</A>";
?>

</body>
</html>