<?php
include '../db.php';
$db = new db();
$connect = $db->connect();
$sql = "SELECT * FROM `users`";
$query = $connect->prepare($sql);
$query->execute();
$users = [];

while ($result = $query->fetch(mode: PDO::FETCH_OBJ)) {
    array_push($users, $result);
}
?>

<?php  include '../layouts/header.php' ?>
        <div class="text-center">
            <h1>Danh Sách Nhân Viên</h1>
        </div>
        <div>
            <a class="btn btn-info" href="add.php">Thêm</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mật Khẩu</th>
                    <th scope="col">Chức Năng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $key => $user) : ?>
                    <tr>
                        <th><?= ++$key?></th>
                        <td><?= $user->name ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->password ?></td>
                        <td> <a class="btn btn-warning" href="edit.php?id=<?= $user->id ?>">Sửa</a>
                            <a href="delete.php?id=<?= $user->id ?>" class="btn btn-danger" onclick="return confirm ('Bạn có chắc muốn xóa <?= $user->name ?> không')"> Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
 <?php  include '../layouts/footer.php' ?>
