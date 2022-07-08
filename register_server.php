<?php
    include "conn.php";
    // $_POST로 받아온 변수가 설정돼있는지 확인한다
    if(isset($_POST['REGV_ID']) && isset($_POST['REGV_EMAIL']) && isset($_POST['REGV_PW']) && isset($_POST['RE_REGV_PW']) && isset($_POST['REGV_NAME'])){
        // 변수를 특수문자에서 문자열로 탈출시킨다
        $REGID = mysqli_real_escape_string($connect, $_POST['REGV_ID']);
        $REGEMAIL = mysqli_real_escape_string($connect, $_POST['REGV_EMAIL']);
        $REGPW = mysqli_real_escape_string($connect, $_POST['REGV_PW']);
        $REGCONPW = mysqli_real_escape_string($connect, $_POST['RE_REGV_PW']);
        $REGNAME = mysqli_real_escape_string($connect, $_POST['REGV_NAME']);
        // 변수 내용이 비어있는지 확인한다
        if(empty($REGID)){
            echo "<script> alert('아이디가 비어있습니다'); history.back(); </script>";
        }
        else if(empty($REGEMAIL)){
            echo "<script> alert('이메일이 비어있습니다'); history.back(); </script>";
        }
        else if(empty($REGPW)){
            echo "<script> alert('비밀번호가 비어있습니다'); history.back(); </script>";
        }
        else if(empty($REGCONPW)){
            echo "<script> alert('비밀번호 확인이 비어있습니다'); history.back(); </script>";
        }
        // $REGPWD와 REGCONPWD가 같지 않은지 확인한다
        else if($REGPW !== $REGCONPW){
            echo "<script> alert('비밀번호가 일치하지 않습니다'); history.back(); </script>";
        }
        else{

            // REGPWD를 암호화시킨다
            $REGPW = password_hash($REGPW, PASSWORD_DEFAULT);
            // 날짜를 변수에 담아줌
            date_default_timezone_set('Asia/Seoul');
            $created_date = date("Y-m-d H:i:s");
            // DB에서 아이디가 $REGID이거나 닉네임이 REGNICK인 값이 있는지 조회하고
            $sql = "select * from customer where cust_id = '$REGID' or cust_email = '$REGEMAIL'";
            $result = mysqli_query($connect, $sql);
            // 조회한 결과와 같은 값이 한 개 이상일 때 ?error에 대한 내용을 출력
            if(mysqli_num_rows($result) > 0) {
                echo "<script> alert('이미 존재하는 아이디 또는 이메일입니다'); history.back(); </script>";
            }
            else {
                // 각 컬럼에 설정해둔 변수들의 값을 넣어준다.
                $sql_save = "insert into customer(cust_name, cust_id, cust_email, cust_pw, cust_date, cust_admin) values('$REGNAME', '$REGID','$REGEMAIL','$REGPW', '$created_date', 0)";
                $order = mysqli_query($connect, $sql_save);
                // $sql_save에 관한 query가 잘 실행됐는지 확인한다
                if($order){
                    echo "<script> alert('성공적으로 가입되었습니다'); location.href='login_view.php';</script>";
                }
                else {
                    echo "<script> alert('가입에 실패하였습니다'); history.back(); </script>";
                }
            }
        }
    }
    else{
        echo "<script> alert('알 수 없는 오류가 발생하였습니다'); history.back(); </script>"; 
    }
?>