<?php include('header.php');?>


<h1>周邊預訂</h1>
<h2><?php echo date('n');?>月優惠</h2>

<div class = "flex-grid">
<?php

    foreach($goods as $key =>$good)
    {
        echo'
        <div class ="col">
        <img src="/images/' . $good['image'] . '"height="200" width="200"/>
        <p>
        名字: '. $good['name'] .' <br>
        價格: $' . $good['price'].'<br>
        <a href="/order.php?goods_id='.$good['goods_id'].'"
        class="buyBtn">預訂'.$good['name'].'</a><br>
        </div>';
        
    }

    ?>
</div>
<?php include('footer.php');?>