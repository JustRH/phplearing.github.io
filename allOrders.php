<?php include_once('header.php');
if(!isStaff()){
    header("Location:/DEMO/ ");
}
?>

<h1>收到的訂單</h1>
<h2>你的登入EMAIL是:<?php echo $_SESSION['email'];?></h2>

<?php


$orderQ = mysqli_query($dbConnection, "SELECT * FROM `order`");


while($order = mysqli_fetch_assoc($orderQ))
{

    $goodsQ = mysqli_query($dbConnection, 'SELECT * FROM `goods` WHERE goods_id='.$order['goods_id']);
    $goods = mysqli_fetch_assoc($goodsQ);
    echo '<div class="order"><p>';
    echo '客戶稱呼 : '.$order['client_name'].'<br/>';
    echo '客戶電郵 : '.$order['client_email'].'<br/>';
    echo '想預訂 : '.$goods['name'].' X '.$order['quantity'].'件 <br/>';
    echo '下單時間 : '.$order['order_time'].'<br/>';
    echo '</p></div>';
}


?>
    

<?php include_once('footer.php');?>