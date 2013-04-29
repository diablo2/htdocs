<?php
	include ('../../../setting/connect.php');
	$topic = $_POST['topicPR'];
	$content = $_POST['content'];
  $imgName = $_POST['imageName'];
	$imgDirect = $_FILES["uploadImage"]["name"];
	$department = $_POST['department'];
  $creator = $_POST['creator'];
	// $createBy = $_POST['creator'];


	$sql = "INSERT INTO public_relation (topic, content, imgName, imgDirect, department, createBy, createDate)
			VALUES ('$topic', '$content', '$imgName','$imgDirect', '$department', '$creator',now())";

$allowedExts = array("gif", "jpeg", "jpg", "png");
$extension = end(explode(".", $_FILES["uploadImage"]["name"]));
if ((($_FILES["uploadImage"]["type"] == "image/gif")
|| ($_FILES["uploadImage"]["type"] == "image/jpeg")
|| ($_FILES["uploadImage"]["type"] == "image/jpg")
|| ($_FILES["uploadImage"]["type"] == "image/pjpeg")
|| ($_FILES["uploadImage"]["type"] == "image/x-png")
|| ($_FILES["uploadImage"]["type"] == "image/png"))
&& ($_FILES["uploadImage"]["size"] < 1000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["uploadImage"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["uploadImage"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["uploadImage"]["name"] . "<br>";
    echo "Type: " . $_FILES["uploadImage"]["type"] . "<br>";
    echo "Size: " . ($_FILES["uploadImage"]["size"] / 1024) . " kB<br>";
    echo "Temp uploadImage: " . $_FILES["uploadImage"]["tmp_name"] . "<br>";

    if (file_exists("../../../file/public_relation/" . $_FILES["uploadImage"]["name"]))
      {
      echo $_FILES["uploadImage"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["uploadImage"]["tmp_name"],
      "../../../file/public_relation/" . $_FILES["uploadImage"]["name"]);
      echo "Stored in: " . "../../../file/public_relation/" . $_FILES["uploadImage"]["name"];
      }
    }
  }
else
  {
  echo "Invalid uploadImage";
  }
mysql_query($sql);

// header('Location: ' . $_SERVER['HTTP_REFERER']);

?>