<?php
//登录
OB_START();
header('Content-type:text/html;charset=utf-8');

session_start();
$name =  $_SESSION['name'];
$depart = $_SESSION['department'];
   

include_once ("importCSV/connect.php");

$opwd = isset($_POST['opass'])? mysql_escape_string($_POST['opass']) : '';

 if($_POST['npass'] == '' ||  $_POST['npassr'] == '')
 {
   echo '新密码或确认密码不能为空！';
     exit();
 }

//旧密码匹配
if($opwd != '')
{//1
 $sqlstr ="select 1 from userinfo where name = '".$name."' and password = '".$opwd."' limit 1";

$result = mysql_query($sqlstr) or die(mysql_error());
    
if($result)
{//2
  $row = mysql_num_rows($result);
  if ($row)
      {
      echo "旧密码匹配成功！";
      
      //新密码匹配录入
  if($_POST['npass'] == $_POST['npassr'])
  {//3
   
$newpwd = isset($_POST['npass'])? mysql_escape_string($_POST['npass']) : '';
   
$sqlstr1 = "update userinfo set password = '".$newpwd."'where name='".$name."' and department='".$depart."' limit 1";

$result1 = mysql_query($sqlstr1) or die(mysql_error());

if($result1)
  echo "修改密码成功！";      
      
   else echo "修改密码失败！执行 $sql 错误:".mysql_error();
      
  }//3
else
{
    echo '新密码两次输入不一致，请重新输入！';
    exit();
}
      
       
  
  }//2
  else 
      {
      echo "旧密码错误，请重新输入！";
      exit();
}
    }
    
}//1
else
{
  echo '旧密码不能为空！';
  exit();
}

mysql_close($link);
?>