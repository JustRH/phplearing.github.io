<?php
$op ='none';
if(isset($_GET['op'])) 
{
    $op = $_GET['op'];
}

if($op=='createOrder')
{
    createOrder();
}
if($op=='checkLogin')
{
    checkLogin($_POST['email'],$_POST['password']);
}
if($op=='logout')
{
    logout();
}

function isStaff()
{
    return isset($_SESSION['email']);
}
function logout()
{
    session_start();
    session_destroy();
    header("Location: /");
}
function checkLogin($email,$password)
{
    $staffEmail = "123@123.com";
    $staffPassword = "123";

    if($email == $staffEmail && $password ==$staffPassword)
    {
        session_start();
        $_SESSION['email'] = $_POST['email'];
        header("Location:/allOrders.php");
    }
    else
    {
        header("Location:/login.php");
    }
}

function createOrder()
{

    $myfile = fopen("data.csv","a") or die("未能OPEN");
    $data = $_POST['goods_id'].','.$_POST['name'].','.$_POST['email'].
    ','.$_POST['quantity'].','.date('Y-m-d H:i:s')."\r\n";
    fwrite($myfile,$data);
    fclose($myfile);
    header("Location:/order-completed.php");
}
?>