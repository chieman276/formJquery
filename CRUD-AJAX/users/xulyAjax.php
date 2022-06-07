<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    function submitAdd(action) {
        $(document).ready(function() {
                var data = {
                    id: $('#id').val(),
                    name: $('#name').val(),
                    email: $('#email').val(),
                    password: $('#password').val()
                };
                $.ajax({
                    url: "add.php",
                    type: "POST",
                    data: data,
                    success: function(reponse) {
                        alert("Thêm thành công");
                    }
                })
        })
    }

    function submitEdit(action) {
        $(document).ready(function() {
                var data = {
                    id: $('#id').val(),
                    name: $('#name').val(),
                    email: $('#email').val(),
                    password: $('#password').val()
                };
                $.ajax({
                    url: "edit.php",
                    type: "POST",
                    data: data,
                    success: function(reponse) {
                        alert("Chỉnh sửa thành công");
                    }
                })
        })
    }
</script>