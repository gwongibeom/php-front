<?php
session_start();
if (isset($_SESSION['cust_name'])) 
    echo "<script>alert('이미 로그인 하셨습니다.');
    location.href='index.php';</script>"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header></header>
    <div>
        <h2>로그인</h2>
        <hr>
        <form action="login_server.php" method="post">
            <div>
                <label>아이디</label>
                <input type="text" pattern="^[a-zA-Z0-9]+$" required title="영문 대소문자와 숫자만 입력 가능합니다" name="LOGV_ID" placeholder="아이디"> 
            </div>
            <div>
                <label>비밀번호</label>
                <input type="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()+|=])[A-Za-z\d~!@#$%^&*()+|=]{4,16}$" required title="영문 대소문자와 숫자, 특수문자가 하나씩 들어가야 하고 최소 4글자, 최대 18글자입니다" name="LOGV_PW" placeholder="비밀번호">
            </div>
            <button>로그인</button>
            <a href="register_view.php">아직 회원이 아니신가요?</a>
            <div>
                <button><a href="find_id_view.php">나는 아이디까지 까먹은 빡대가리 입니다.</a></button>
                <br>
                <button><a href="find_pwd_view.php">저는 크롬 비번 자동 저장 기능 거부자입니다.</a></button>
            </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function (){
        $('header').load('/header.php');
        $('footer').load('/footer.html');
    });
</script>
</html>