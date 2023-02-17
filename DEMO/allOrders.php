<?php include('header.php');
if(!isStaff()){
    header("Location: / ");
}
?>

<h1>收到的訂單</h1>
<h2>你的登入EMAIL是:<?php echo $_SESSION['email'];?></h2>

<?php

$orderData = file_get_contents('data.csv');
$orders = str_getcsv($orderData,"\r\n");

foreach($orders as $order)
{
    $singleOrder = explode(",",$order);
    
    echo '<div class="order"><p>';
    echo '客戶稱呼 : '.$singleOrder[1].'<br/>';
    echo '客戶電郵 : '.$singleOrder[2].'<br/>';
    echo '想預訂 : '.$goods[$singleOrder[0]-1]['name'].' X '.$singleOrder[3].'件 <br/>';
    echo '下單時間 : '.$singleOrder[4].'<br/>';
    echo '</p></div>';
}
?>
    

<?php include('footer.php');?>