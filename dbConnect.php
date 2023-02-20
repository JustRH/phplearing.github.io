<?php
$dbConnection = mysqli_connect("localhost","root","","php_goods");

if(mysqli_connect_errno())
{
    echo "Failed to connect to MySQL:" .mysqli_connect_error();
    exit();
}

/*echo "OK";*/
mysqli_set_charset($dbConnection, "utf8");
?>