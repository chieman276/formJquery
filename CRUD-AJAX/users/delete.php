<?php
include '../db.php';
$id = $_REQUEST['id'];
$db = new db();
$connect = $db->connect();
$sql = "DELETE FROM `users` WHERE `users`.`id` = $id";
$connect->exec($sql);
header("location: list.php");