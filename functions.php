<?php
include_once('dbConnect.php');
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
    header("Location:/DEMO/");
}
function checkLogin($email,$password)
{
    global $dbConnection;
    $staffQ = mysqli_query($dbConnection, "SELECT * FROM `staff` WHERE `email` = '".$email."'");
  
    $staff = mysqli_fetch_assoc($staffQ);

    /* $staffEmail = "123@123.com";
    $staffPassword = "123";*/

    if($email == $staff['email'] && $password == $staff['password'])
    {
        session_start();
        $_SESSION['email'] = $_POST['email'];
        header("Location:/DEMO/allOrders.php");
    }
    else
    {
        header("Location:/DEMO/login.php");
    }
}

function createOrder()
{

   /* $myfile = fopen("data.csv","a") or die("未能OPEN");
    $data = $_POST['goods_id'].','.$_POST['name'].','.$_POST['email'].
    ','.$_POST['quantity'].','.date('Y-m-d H:i:s')."\r\n";
    fwrite($myfile,$data);
    fclose($myfile);
    header("Location:/DEMO/order-completed.php");*/

    global $dbConnection;
    $sql = "INSERT INTO `php_goods`.`order`(
        `client_name`,
        `client_email`,
        `quantity`,
        `order_time`,
        `goods_id`)
        VALUES(
            '{$_POST['name']}',
            '{$_POST['email']}',
            '{$_POST['quantity']}',
            '".date('Y-m-d H:i:s')."',
            {$_POST['goods_id']})";


  if(mysqli_query($dbConnection,$sql))
   {
    header("Location:/DEMO/order-completed.php");
   }
   else
   {
    echo "FAIL";
   }     
}
?>