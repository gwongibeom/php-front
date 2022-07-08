<?php
    include "conn.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>디지텍샵</title>
</head>
<body>
    <header></header>
    <div>
        <table>
            <?php
                $query = "select * from product";
                $result = mysqli_query($connect, $query);
                while($data = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><a href="view.php?index_num=<?=$data['prod_num']?>"><img src="./img/prod<?=$data['prod_num']?>.jpg" alt="상품 이미지"></a></td>
                <td><a href="view.php?index_num=<?=$data['prod_num']?>"><?=$data['prod_name']?></a></td>
                <td><?=$data['prod_manufacturer']?></td>
                <td><?=$data['prod_price']?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <footer></footer>
</body>
<script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function (){
        $('header').load('/header.php');
        $('footer').load('/footer.html');
    });
</script>
</html>