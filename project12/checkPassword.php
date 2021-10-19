<?php
    $email = 'tranquoctien2502@gmail.com';
    $password_raw = "123";
    // Giả sử mật khẩu nhập trên FORM login

    // $pass_hash1 = password_hash($password_raw,PASSWORD_DEFAULT);
    // echo $pass_hash1;


    // if(password_verify($password_raw,$pass_hash1)){
    //     echo 'Khớp';
    // }else{
    //     echo 'Không khớp';
    // }

    // B1. Kết nối DB Server
    $conn = mysqli_connect('localhost','root','','danhba');
    if(!$conn){
        die('Không thể kết nối');
    }

    // B2. Truy vấn Email
    $sql = "SELECT * FROM db_users WHERE user_email= '$email'";
    $result = mysqli_query($conn,$sql);

    // B3. Kiểm tra và xử lý kết quả
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $password_hash = $row['user_pass'];
        echo $password_hash;
        // Kiểm tra Mật khẩu có khớp không
        if(password_verify($password_raw,$password_hash)){
            echo 'Đăng nhập thành công';
            // // or
            // header('Location:admin/index.php');
        }else{
            echo 'Mật khẩu không khớp';
        }
    }else{
        echo 'Email không tồn tại';
    }


?>