<?php
    session_start();
    unset($_SESSION["usernameError"]);
    unset($_SESSION["passwordError"]);
    if(isset($_POST["submit"])){
        $checkStatus = true;
        if($_POST["username"] == ""){
            $_SESSION["usernameError"] ="Không để trống username";
            $checkStatus = false;
        }
        if($_POST["password"] == ""){
            $_SESSION["passwordError"] ="Không để trống password";
            $checkStatus = false;
        }
    }
    if($checkStatus == false){
        header("Location: login.php");
    }else{
        checkLogin($_POST["username"], $_POST["password"]);
    }
    function checkLogin($username, $password){
       if($username == "admin" && $password == "1234"){
        $_SESSION["sucessLogin"]="Đăng nhập thành công";
        setcookie("fullname", "khanhn228", time() + 500);
        header("Location: admin.php");
       }else{
         $_SESSION["failLogin"] = "Mời bạn nhập lại";
         header("Location: login.php");
       }
    }
?>
<!--1.session lưu ở sever tắt sẽ mất
    2.cookie lưu ở client tắt vẫn còn , nó sống khi time còn
    -> soá lịch sử sẽ mất hết
    sesion bị phụ thuộc vào cookie
    còn cookie ko phụ thuộc vào sesion
-->