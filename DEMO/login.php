<?php include('header.php');?>

<form action = "functions.php?op=checkLogin" method="post">
    <label for = "email">EMAIL:</label>
    <input type="email" id="email" name="email" require><br>

    <label for = "email">密碼:</label>
    <input type = "password" id="password" name="password" min="1" max = "5">

    <br>
    <input type="submit" value="登入">
</form>

<?php include('footer.php');?>