<?php
//登录
OB_START();
header('Content-type:text/html;charset=utf-8');
//防注入
function post_check($post) 
{ 

if (!get_magic_quotes_gpc()) // 判断magic_quotes_gpc是否为打开 
{ 
$post = addslashes($post); // 进行magic_quotes_gpc没有打开的情况对提交数据的过滤 
} 
$post = str_replace("_", "＼_", $post); // 把 '_'过滤掉 
$post = str_replace("%", "＼%", $post); // 把' % '过滤掉 
$post = nl2br($post); // 回车转换 
$post= htmlspecialchars($post); // html标记转换 
return $post; 
} 




//注销登录
if($_GET['action'] == "logout"){
    unset($_SESSION['name']);
    unset($_SESSION['department']);
    unset($_SESSION['position']);
    echo '<br />';
    echo '<br />';
    echo '<h1 style="font-size=:24px;line-height:24px;color:#333;text-align:center;" >注销登录成功！点击此处 <a href="login.html">登录</a></h1>';
    exit;
}

if($_POST['mobile'] == 'admin' && $_POST['password'] == 'admin')
{
    session_start();
    $_SESSION['admin'] = 'admin';
    echo '<br />';
    echo '<br />';
    echo '<h1 style="font-size=:36px;line-height:36px;color:#333;text-align:center;" >系统管理员，欢迎你！进入 <a href="controller.php">报餐宝后台</a><br /></h1>';
    echo '<br />';
    echo '<br />';
    echo '<br />';
    echo '<h1 style="font-size=:24px;line-height:24px;color:#333;text-align:center;" >或点击此处 <a href="login.php?action=logout">注销</a> 登录！<br /></h1>';
    exit;
}

if(!isset($_POST['submit'])){
    exit('非法访问!');
}
$mobile = post_check($_POST['mobile']);

$password = $_POST['password'];

//包含数据库连接文件
include_once ("importCSV/connect.php");
//检测用户名及密码是否正确

$sqlstr = "select name,department,position from userinfo where mobile='".$mobile."' and password='".$password."' limit 1";

$result = mysql_query($sqlstr) or die(mysql_error());


if($sqlrows = mysql_fetch_array($result)){
    //登录成功
   session_start();
    $_SESSION['name'] = $sqlrows['name'];
    $_SESSION['department'] = $sqlrows['department'];
    $_SESSION['position'] = $sqlrows['position'];
    echo '<br />';
    echo '<br />';
    echo '<h1 style="font-size=:36px;line-height:36px;color:#333;text-align:center;" >',$_SESSION['name'],' 欢迎你！进入 <a href="index.php">报餐宝</a><br /></h1>';
    echo '<br />';
    echo '<br />';
    echo '<br />';
    echo '<h1 style="font-size=:24px;line-height:24px;color:#333;text-align:center;" >或点击此处 <a href="login.php?action=logout">注销</a> 登录！<br /></h1>';

    
    
    
    exit;
} else {
    exit('<h1 style="font-size=:24px;line-height:24px;color:#333;text-align:center;" >登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> 重试</h1>');
}








?>