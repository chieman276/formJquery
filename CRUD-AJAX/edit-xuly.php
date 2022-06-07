<?php
include 'db.php';
$db = new db();
$connect = $db->connect();
// $id = (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) ? $_REQUEST['id'] : '';
// if ($id != '') {
//     $id = $_GET['id']; 
//     $sql = "SELECT * FROM `users` WHERE `id` = $id";
//     //truyen cau truy van vao
//     $stmt = $connect->query($sql);
//     //Thiết lập kiểu dữ liệu trả về
//     $stmt->setFetchMode(PDO::FETCH_OBJ);
//     $user = $stmt->fetch();


// }
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_REQUEST['id'];
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    $sql = "UPDATE `users` SET 
    `name` = '$name', `email` = '$email', `password` = '$password' 
    WHERE `users`.`id` = $id";
    // echo '<pre>';
    // print_r($sql);
    // die();
    //thực thi câu lệnh sql
    
    $connect->exec($sql);

}
?>