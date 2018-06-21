<?php
//登录
OB_START();
header('Content-type:text/html;charset=utf-8');


session_start();
$name =  $_SESSION['name'];
$depart = $_SESSION['department'];
$date = date("Y-m-d-", time());
$current = date("Y-m-d-H-i-s", time());              //edit add -i-s         
$before =  $date.'09-03-00';
$after = $date.'06-00-00';


if($current >= $before || $current < $after ){
   
    echo "抱歉，现在已经超出了取消报餐时段！";
    exit();
}

    

include_once ("importCSV/connect.php");

$sqlstr1 = "select 1 from bookinfo where name = '".$name."' and dep = '".$depart."' and date >= '".$date."06-00-00' and date < '".$date."09-03-00' limit 1";

$result1 = mysql_query($sqlstr1) or die(mysql_error());

if($result1)
{//1
    $row1 = mysql_num_rows($result1);
if ($row1)
{//2  
  echo "已定位报餐信息!";

$sqlstr2 = "delete from bookinfo where name='".$name."' and dep = '".$depart."' and date >= '".$date."06-00-00' and date < '".$date."09-03-00'";

$result2 = mysql_query($sqlstr2) or die(mysql_error());
    
if($result2)
  echo "已取消您的报餐信息";   

    else echo "不能取消报餐信息，可能是系统已经禁止今天的报餐了！".mysql_error();
 
    
}//2
    
    else
        echo "您今天没有报餐信息！执行 sql 错误:".mysql_error();


}//1        
else echo "执行 $sql 错误:".mysql_error();
      
mysql_close($link);
?>