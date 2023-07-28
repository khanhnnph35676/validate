<?php
    // validate name
    function validateName($name){
        // không đc bỏ trống 
        if(empty($name)){
            return "Tên không được bỏ trống";
        }else{
            // Kiểm tra tên có kí tự đặc biệt hoặc số hay ko
            if(!preg_match("/^[a-zA-Z ]*$/",$name)){
                // preg_match: kiểm tra và lấy thông tin từ chuỗi dữ liệu
                // Mục đích : để so sánh với dữ liệu nhập vào
                // trả về true khi 2 dữ liệu khớp nhau ngược lại false
                return "Tên chỉ được là chữ cái hoặc khoảng trắng!";
                // " /.../": biểu thị bắt đầu và kết thúc
                // "^": đại diện vị trí bắt đầu
                // "[...]": đại diện cho tất cả các ký tự
                // "*": đại diện cho việc ký tự đó có thể xuất hiện bao nhiêu lần
                // "$": đại diện cho vị trí kết thúc
            }
        }
        return "";
    }
     // validate email
    function validateEmail($email){
        if(empty($email)){
            return "Email không nhập được!";
        }else{
            // Kiêm tra đinh dạng
            // kiểm tra và lọc các giá trị của biến theo 1 bộ lọc cụ thể
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                return "Email chưa đúng định dạng";
            }
        }
        return"";
    }
     function validatePhone($phone){
        if(empty($phone)){
            return "Nhập vào số điện thoại";
        }else{
            if(strlen($phone) != 10){
                return"Số điện thoại phải là 10 số";
            }
            if(!preg_match("/^[0-9]*$/",$phone)){
                return "Số điện thoại chỉ được điền số";
            }
        }
     }   
     function validateBirthday($date){
        if(empty($date)){
            return"Ngày phải nhập";
        }else{
            $today = date("Y-m-d");
            $diff = date_diff(date_create($date), date_create($today));
            // date_diff() : tính toán sự chênh lệch giữa 2 ngày
            //date_create($date): đưa nó về 1 con số để tính sự chênh lệch với hàm date_diff
            if($diff -> format("%y%"< 16)){
                return "Bạn chưa đủ tuổi đăng ký";
            }
        }
        return"";
     }
     function validatePass($pass){
        if(empty($pass)){
            return "Mật khẩu phải nhập";
        }else{
            if(strlen($pass) < 8){
                return"Mật khẩu phải có nhiều hơn 8 ký tự";
            }   
        }
        return"";
     }
     function validateRePass($pass,$repass){
        if(empty($repass)){
            return "Xác nhận cần nhập mật khẩu";
        }else{
            if($pass !== $repass){
                return "Mật khẩu không khớp";
            }
        }
        return "";
     }
    // định nghĩa biến thành rỗng
    $name = $email= $repass = $pass = $phone =  "";
    $nameError = $emailError = $repassError = $passError = $phoneError ="";
    // kiểm tra phuwob thức get post tồn tại ko
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // KIỂM TRA TÊN
        $name = $_POST["name"];
        $nameError = validateName($name);

        $email = $_POST["email"];
        $emailError = validateEmail($email);
        
        $phone = $_POST["phone"];
        $phoneError =validatePhone($phone);

        $repass = $_POST["repass"];
        $repassError = validateRepass($pass,$repass);
    }
?>
<!-- In các thông tin vừa nhập ra man hình -->