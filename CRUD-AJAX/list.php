<?php
include './db.php';
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
<?php include './layouts/header.php' ?>
<div class="text-center">
    <h1>Danh Sách Nhân Viên</h1>
</div>
<div>
    <div class="modal fade" id="completeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="exampleModalLabel">Thêm mới người dùng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <label for=""> Tên</label>
                        <input type="text" id="name" class="form-control add" name="name" value=""><br>
                        <label for=""> Email</label>
                        <input type="text" id="email" class="form-control add" name="email" value=""><br>
                        <label for=""> Mật Khẩu</label>
                        <input type="text" id="password" class="form-control add" name="password" value=""><br>
                    </form>
                </div>
                <div class="modal-footer">
                <input type="button" class="submit btn btn-primary" value="Thêm">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Quay Lại</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-3">
        <h3 class="text-center">Thực Hành Ajax</h3>
        <button type="button" class="btn btn-dark my-3" data-toggle="modal" data-target="#completeModal">
            Thêm Mới
        </button>
        <!-- <div id="list"></div> -->
    </div>
    <!-- <a class="btn btn-info" href="add.php">Thêm</a> -->
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
        <?php foreach ($users as $user) : ?>
            <tr>
                <th><?= $user->id ?></th>
                <td><?= $user->name ?></td>
                <td><?= $user->email ?></td>
                <td><?= $user->password ?></td>
                <td> <a class="btn btn-warning" href="edit.php?id=<?= $user->id ?>">Sửa</a>
                 <input type="button" name="delete" id="<?= $user->id ?>" class="delete btn btn-danger" value="Xóa">
                </td>
             
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>
<script>
    $(document).ready(function() {
        // $("body").on("click", ".delete", function() {
        $('.delete').on('click', function() {
            var id = $(this).attr("id");
            var btn = $(this);
            if (confirm("Bạn có chắc muốn xóa ? ")) {
                $.ajax({
                    type: 'POST',
                    url: 'delete-xuly.php',
                    data: {
                        id: id
                    },
                    success: function(res) {
                        if (res) {
                            btn.closest("tr").remove();
                        }
                    }
                });
            }
        });

        $('.submit').click(function() {
            var data = {
                id: $('#id').val(),
                name: $('#name').val(),
                email: $('#email').val(),
                password: $('#password').val()
            };
            $.ajax({
                url: "add-xuly.php",
                type: "POST",
                data: data,
                success: function(dataabc) {
                    window.location.href = "list.php";
                }
            })
        })


    });
</script>
<?php include './layouts/header.php' ?>