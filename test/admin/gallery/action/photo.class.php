<?php

class photo {
	public static function getNameAlbum($id) {
		$sql = "SELECT name FROM albums WHERE id = '$id'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		return $row['name'];
	}

	public static function getAlbum() {
		$sql = "SELECT a.* , count(p.id) as photo , p.image
				FROM `albums` as a 
				LEFT JOIN photos as p ON a.id = p.albumID 
				GROUP BY a.id";
		$result = mysql_query($sql);
		return $result;
	}

	public static function updateModify($photoID){
		$sql = "SELECT albumID FROM photos
				WHERE id = '$photoID'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		$albumID = $row['albumID'];
		$sql = "UPDATE albums SET modifyDate = now()
				WHERE id = '$albumID' ";
		mysql_query($sql);
	}

	public static function editAlbum($albumID,$title,$des){
		$sql = "UPDATE albums SET name='$title', description='$des' 
				WHERE id='$albumID'";
		mysql_query($sql);
	}

	public static function deleteAlbum($albumID){
		$sql = "DELETE FROM albums
				WHERE id = '$albumID'";
		mysql_query($sql);
	}

	public static function getPhoto($albumsID) {
		$sql = "SELECT p.*, a.name, acc.username FROM photos AS p 
				LEFT JOIN albums as a on p.albumID = a.id 
				LEFT JOIN account as acc on acc.ID = p.createBy
				WHERE p.albumID = '$albumsID' ORDER BY p.createDate ASC";
		$result = mysql_query($sql);
		return $result;
	}

	public static function getPartPhoto($photoID){
		$sql = "SELECT p.*, a.name FROM photos AS p 
				LEFT JOIN albums as a on p.albumID = a.id
				WHERE p.id = '$photoID'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		$part = $row['name'].'/'.$row['image'];
		return $part;
	}

	public static function editPhoto($photoID,$title,$des){
		$sql = "UPDATE photos SET imgTitle='$title', description='$des' 
				WHERE id='$photoID'";
		mysql_query($sql);
	}

	public static function deletePhoto($photoID){
		$sql = "DELETE FROM photos
				WHERE id = '$photoID'";
		mysql_query($sql);
	}


}


?>