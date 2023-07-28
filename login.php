<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php
            if(isset($_SESSION["usernameError"])){
                echo "<span style=color:red; >" .$_SESSION["usernameError"] ."</span> <br>"; 
            }
            if(isset($_SESSION["passwordError"])){
                echo "<span style=color:red; >" .($_SESSION["passwordError"]) ."</span> <br>";
            }
            if(isset($_SESSION["failLogin"] )){
                echo "<span style=color:red; >" .$_SESSION["failLogin"] ."</span> <br>";
            }
            if(!isset($_SESSION["sucessLogin"])){
                echo "<span style=color:red; >" .$_SESSION["loginPlease"]."</span> <br>";
            }
        ?>  
    </div>
    <form action="process.php" method="POST">
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id ="username">
        </div>
        <div>   
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit" name="submit">Đăng nhập</button>
    </form>
</body>
</html>