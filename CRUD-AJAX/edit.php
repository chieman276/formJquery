<?php
include 'db.php';
$db = new db();
$connect = $db->connect();
$id = (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) ? $_REQUEST['id'] : '';
if ($id != '') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `users` WHERE `id` = $id";
    //truyen cau truy van vao
    $stmt = $connect->query($sql);
    //Thiết lập kiểu dữ liệu trả về
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $user = $stmt->fetch();
}
?>
<?php include './layouts/header.php'?>
<h2 class="text-center">Sửa</h2>
<form action="" method="POST">
    <input type="hidden" id="id" value="<?= $id ?>">
    <label for=""> Tên</label>
    <input type="text" id="name" class="form-control" name="name" value="<?= $user->name ?>"><br>
    <label for=""> Email</label>
    <input type="text" id="email" class="form-control" name="email" value="<?= $user->email ?>"><br>
    <label for=""> Mật Khẩu</label>
    <input type="text" id="password" class="form-control" name="password" value="<?= $user->password ?>"><br>
    <input type="button" class="submit btn btn-primary" value="Sửa"><br>

</form>
<script>
    $(document).ready(function() {
        $('.submit').click(function() {
            var data = {
                id: $('#id').val(),
                name: $('#name').val(),
                email: $('#email').val(),
                password: $('#password').val()
            };
            $.ajax({
                url: "edit-xuly.php",
                type: "POST",
                data: data,
                success: function(dataabc) {
                    window.location.href = "list.php";
                }
            })
        })
    })
</script>
<?php include './layouts/footer.php' ?>