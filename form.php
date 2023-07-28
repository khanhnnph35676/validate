<?php
    require_once "index.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            display: grid;
            width: 600px;
        }
        .error{
            color: red;
        }
    </style>
</head>

<body>
<!-- Yêu cầu 
        1 tất cả dữ liệu phải đc nhập
        2 Tên: Chỉ được nhập chữ cái và khoảng trắng
        3, email đúng định dạng
        4, số dt 10 số
        5 Ngày sinh > 16 tuổi
        6 mk > 8 ký tự
        7 nhập lại mk mk = mk 
    -->
    <h2>Đăng kí thông tin</h2>
    <form action="" method="POST">
    <label for="">Tên</label>
    <input type="text" name="name"> <br>
    <span class="error"><?php echo $nameError; ?></span>
    
    <label for="">Email</label>
    <input type="text" name="email"> <br>
    <span class="error"><?php echo $emailError; ?></span>

    <label for="">Số điện thoại</label>
    <input type="number" name="phone"> <br>
    <span class="error"><?php echo $phoneError; ?></span>

    <label for="">Ngày sinh</label>
    <input type="date" name="birthday"> <br>
    <span class="error"><?php echo $nameError; ?></span>

    <label for="">Giới tính</label>
    <input type="radio" name="gender" value="nam"> Nam
    <input type="radio" name="gender" value="nu"> Nữ <br>

    <label for="">Sở thích</label>
    <input type="checkbox" name="hobby" value="doc_sach"> Đọc sách
    <input type="checkbox" name="hobby" value="nghe_nhac"> Nghe Nhạc
    <input type="checkbox" name="hobby" value="choi_game"> Chơi game <br>

    <label for="">Mật khẩu</label>
    <input type="password" name="password"> <br>
    <span class="error"><?php echo $passError; ?></span>

    <label for="">Mật khẩu</label>
    <input type="password" name="repass"> <br>
    <span class="error"><?php echo $repassError; ?></span>

    <button type="submit" name="submit">Đăng kí</button>
    </form>
<?php
    if(isset($_POST["submit"])){
        if($nameError =="" && $emailError == "" &&$repassError ==""
        &&  $passError ="" && $phoneError == ""
        ){
            echo "<h3 style=color:green><b>Bạn đã gửi thông tin thành công</b></h3>";
        }else{
            echo "<h3 style=color:red><b>Bạn cần kiểm tra thông tin lại!</b></h3>";
        }
    }
?>
</body>
<?php


?>
</html>