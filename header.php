<div>
    <?php
        session_start();
        if (isset($_SESSION['cust_name'])) {
            echo("<p>{$_SESSION['cust_name']}님 환영합니다</p>");
        }
        else {
            echo("<p>로그인해주세요!</p>");
        }
    ?>
    <a href="register_view.php"><img src="./img/icons8-account-96.png" alt="회원가입"></a>
</div>
