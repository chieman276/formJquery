<?php

include './db.php';


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $db = new db();
        $connect = $db->connect();
    
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
    
        $sql = "INSERT INTO `users` 
            (`name`, `email`, `password`)
                VALUES 
            ('$name', '$email', '$password')";
    
        // thuc thi cau lenh sql
        $connect->exec($sql);
   
}

?>

