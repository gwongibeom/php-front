
<?php
session_start();
if (isset($_SESSION['cust_name'])) {
    header("location: mypage.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>디지텍샵 - 회원가입</title>
</head>
<body>
    <header></header>
    <div>
        <h2>회원가입</h2>
        <hr>
        <form action="register_server.php" method="post">
            <div>
                <label>아이디</label>
                <input
                    type="text"
                    pattern="^[a-zA-Z0-9]+$"
                    required="required"
                    title="영문 대소문자와 숫자만 입력 가능합니다"
                    name="REGV_ID"
                    placeholder="아이디">
            </div>
            <div>
                <label>이메일</label>
                <input
                    type="email"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                    required="required"
                    title="이메일 형식에 맞게 입력해야 합니다"
                    name="REGV_EMAIL"
                    placeholder="이메일">
            </div>
            <div>
                <label>이름</label>
                <input
                    type="text"
                    required="required"
                    title="영문 대소문자와 숫자만 입력 가능합니다"
                    name="REGV_NAME"
                    placeholder="이름">
            </div>
            <div>
                <label>비밀번호</label>
                <input
                    type="password"
                    name="REGV_PW"
                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()+|=])[A-Za-z\d~!@#$%^&*()+|=]{4,16}$"
                    required="required"
                    title="최소 영문 대소문자, 숫자, 특수문자가 하나씩 포함되어야 합니다"
                    placeholder="비밀번호">
            </div>
            <div>
                <label>비밀번호 확인</label>
                <input
                    type="password"
                    name="RE_REGV_PW"
                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()+|=])[A-Za-z\d~!@#$%^&*()+|=]{4,16}$"
                    required="required"
                    title="최소 영문 대소문자, 숫자, 특수문자가 하나씩 포함되어야 합니다"
                    placeholder="비밀번호 확인">
            </div>
            <button>등록하기</button>
            <a href="login_view.php">이미 회원이신가요?</a>
        </form>
    </div>
    <footer></footer>
</body>
    <script src="./script/jquery-1.12.3.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('header').load('/header.html');
            $('footer').load('/footer.html');
        });
    </script>
</html>