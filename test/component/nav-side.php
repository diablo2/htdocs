<?php
// function nav active action
$current_url = basename($_SERVER['REQUEST_URI'], ".php");
$home = '';
$search_alumni = '';
$public_relation = '';
$activity = '';
$webboard = '';
$gallery = '';
$chat_room = '';
$questionnaire = '';
$contact = '';
// Get curent part url
$url = $_SERVER['REQUEST_URI'];
if (stripos($url, "home")){
  $home = 'class="active';
} elseif (stripos($url, "search_alumni")){
  $search_alumni = 'class="active';
} elseif (stripos($url, "public_relation")){
  $public_relation = 'class="active';
} elseif (stripos($url, "activity")){
  $activity = 'class="active';
} elseif (stripos($url, "webboard")){
  $webboard = 'class="active';
} elseif (stripos($url, "gallery")){
  $gallery = 'class="active';
} elseif (stripos($url, "chat_room")){
  $chat_room = 'class="active';
} elseif (stripos($url, "questionnaire")){
  $questionnaire = 'class="active';
} elseif (stripos($url, "contact")){
  $contact = 'class="active';
} 



$redirect = base64_encode("http://".$dbHost.$url);

	echo '<div class="sidebar-nav nav-group" id="nav-side">
            <ul class="nav nav-list">
              <li class="nav-header">Sidebar</li>
              <li><a '.$home.' href="../home">Home</a></li>
              <li><a '.$search_alumni.' href="../search_alumni">Search Alumni</a></li>
              <li><a '.$public_relation.' href="../public_relation">Public Relation</a></li>
              <li><a '.$activity.' href="../activity">Activity</a></li>
              <li><a '.$webboard.' href="../webboard">Web board</a></li>
              <li><a '.$gallery.' href="../gallery">Gallery</a></li>
              <li><a '.$chat_room.' href="../chat_room">Chat room</a></li>
              <li><a '.$questionnaire.' href="#">Questionnaire</a></li>
              <li><a '.$contact.' href="../contact">Contact Us</a></li>
            </ul>
          </div><!--/.well -->';

?>
