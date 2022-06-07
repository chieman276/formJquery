<?php include '../db.php';
$db = new db();
$connect = $db->connect();
$id = (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) ? $_REQUEST['id'] : '';
if ($id != '') {
    $sql = "SELECT * FROM `users` WHERE `id` = $id";
    //truyen cau truy van vao
    $stmt = $connect->query($sql);
    //Thiết lập kiểu dữ liệu trả về
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    //fetchALL se tra ve du lieu nhieu hon 1 ket qua
    $user = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_REQUEST['id'];
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $users  = "UPDATE `users` SET 
    `name` = '$name', `email` = '$email', `password` = '$password' 
    WHERE `users`.`id` = $id";
    $connect->exec($sql);
}
?>
<?php include '../layouts/header.php' ?>
<h2>Sửa Nhân Viên</h2>
<form action="" method="POST">
    <label for=""> Tên</label>
    <input type="text" id="name" class="form-control" name="name" value="<?= $user->name; ?>"><br>
    <label for=""> Email</label>
    <input type="text" id="email" class="form-control" name="email" value="<?= $user->email; ?>"><br>
    <label for=""> Mật Khẩu</label>
    <input type="text" id="password" class="form-control" name="password" value="<?= $user->password; ?>"><br>
    <input type="button" onclick="submitEdit('edit')" value="Sửa"><br>
    <a href="list.php"> Danh Sánh Nhân Viên</a>
    <?php include './xulyAjax.php' ?>
</form>
<?php include '../layouts/footer.php' ?>