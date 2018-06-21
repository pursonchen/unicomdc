<?php
header("content-type:text/html;charset=utf-8");
ini_set("magic_quotes_runtime",0);
require 'phpmailer/class.phpmailer.php';
try {
$mail = new PHPMailer(true);
$mail->IsSMTP();
$mail->CharSet='UTF-8'; //设置邮件的字符编码，这很重要，不然中文乱码
$mail->SMTPAuth = true; //开启认证
$mail->Port = 25;
$mail->Host = "smtp.163.com";
$mail->Username = "new-chen@163.com";
$mail->Password = "newgor888";
//$mail->IsSendmail(); //如果没有sendmail组件就注释掉，否则出现“Could not execute: /var/qmail/bin/sendmail ”的错误提示
$mail->AddReplyTo("new-chen0@163.com","Purson");//回复地址
$mail->From = "new-chen@163.com";
$mail->FromName = "Purson Chen";
$to = "185297167@qq.com";
$mail->AddAddress($to);
    
$current=date("Y年m月d日", time());
$filename = $current.'员工报餐记录';
    
$mail->Subject = $filename;
$mail->Body = "<h1>报餐信息</h1>集团客户支撑中心为您发送的！";
$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; //当邮件不支持html时备用显示，可以省略
$mail->WordWrap = 80; // 设置每行字符串的长度
$mail->AddAttachment('saekv://'.$filename.'.xls'); //可以添加附件
$mail->IsHTML(true);
$mail->Send();
echo '邮件已发送';
} catch (phpmailerException $e) {
echo "邮件发送失败：".$e->errorMessage();
}
?> 