<?php
include('Classes/PHPExcel.php');
header('Content-type:text/html;charset=utf-8');
 //这些数据假设是从M('xxx')->select()里面出来的

$objReader = PHPExcel_IOFactory::createReader ( 'Excel5' );
$objPHPExcel = $objReader->load ("booklist3.xls" );
$date = date("Y年m月d日", time());






for($i = 0; $i < 4; $i++)                 //先初始化四个表格标题
{
$objPHPExcel->setActiveSheetIndex($i);    
//获取当前活动的表
$objActSheet = $objPHPExcel->getActiveSheet ();
$objActSheet->setTitle ($date. '员工报餐记录' );
$objActSheet->setCellValue ( 'B1', $date. '员工报餐记录' );
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setSize(16);
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
$objPHPExcel->getActiveSheet()->getStyle('B1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);  

}


include_once ("importCSV/connect.php");

//没有送餐需求的

$current=date("Y-m-d-", time()); 
$sqlstr = "select shortdep.short,name,lunch,dinner from bookinfo,shortdep where shortdep.department = bookinfo.dep and date >='".$current."06-00-00' and date < '".$current."09-03-00' and lunchpack='' and dinnerpack='' and shortdep.short != '罗定' order by short";

$result = mysql_query($sqlstr) or die(mysql_error());
//开始遍历sql结果并写入excel
$write_num = 0;

if( mysql_num_rows($result))
{
  //遍历计数器

while($sqlrows=mysql_fetch_array($result))
{
    if($write_num < 60)
  {  
     $objPHPExcel->setActiveSheetIndex(0);  
     $objActSheet = $objPHPExcel->getActiveSheet ();
     if($write_num < 30)
     {    
     $write_numA = $write_num + 4;
     $objActSheet->setCellValue ( 'B'.$write_numA,  $sqlrows["short"]);   
     $objActSheet->setCellValue ( 'C'.$write_numA,  $sqlrows["name"]); 
     $objActSheet->setCellValue ( 'D'.$write_numA,  $sqlrows["lunch"]); 
     $objActSheet->setCellValue ( 'F'.$write_numA,  $sqlrows["dinner"]); 
          
     
     }
    else
     {
     $write_numA = $write_num - 26;
     $objActSheet->setCellValue ( 'J'.$write_numA,  $sqlrows["short"]); 
     $objActSheet->setCellValue ( 'K'.$write_numA,  $sqlrows["name"]); 
     $objActSheet->setCellValue ( 'L'.$write_numA,  $sqlrows["lunch"]); 
     $objActSheet->setCellValue ( 'N'.$write_numA,  $sqlrows["dinner"]); 
        
     }
   }
    else if ($write_num >=60 && $write_num <120)
    {
          
         $objPHPExcel->setActiveSheetIndex(1);  
         $objActSheet = $objPHPExcel->getActiveSheet ();
         if($write_num < 90)
        {    
         $write_numA = $write_num - 56;
     $objActSheet->setCellValue ( 'B'.$write_numA,  $sqlrows["short"]);    
     $objActSheet->setCellValue ( 'C'.$write_numA,  $sqlrows["name"]); 
     $objActSheet->setCellValue ( 'D'.$write_numA,  $sqlrows["lunch"]); 
     $objActSheet->setCellValue ( 'F'.$write_numA,  $sqlrows["dinner"]); 
          
     
        }
        else
        {
        $write_numA = $write_num - 86;
     $objActSheet->setCellValue ( 'J'.$write_numA,  $sqlrows["short"]); 
     $objActSheet->setCellValue ( 'K'.$write_numA,  $sqlrows["name"]); 
     $objActSheet->setCellValue ( 'L'.$write_numA,  $sqlrows["lunch"]); 
     $objActSheet->setCellValue ( 'N'.$write_numA,  $sqlrows["dinner"]); 
        
     }
    }
    else if($write_num >=120 && $write_num < 180)
    {
     $objPHPExcel->setActiveSheetIndex(2);  
     $objActSheet = $objPHPExcel->getActiveSheet ();
     if($write_num < 150)
     {    
     $write_numA = $write_num - 116;
     $objActSheet->setCellValue ( 'B'.$write_numA,  $sqlrows["short"]);    
     $objActSheet->setCellValue ( 'C'.$write_numA,  $sqlrows["name"]); 
     $objActSheet->setCellValue ( 'D'.$write_numA,  $sqlrows["lunch"]); 
     $objActSheet->setCellValue ( 'F'.$write_numA,  $sqlrows["dinner"]); 
          
     
     }
    else
     {
     $write_numA = $write_num - 146;
     $objActSheet->setCellValue ( 'J'.$write_numA,  $sqlrows["short"]); 
     $objActSheet->setCellValue ( 'K'.$write_numA,  $sqlrows["name"]); 
     $objActSheet->setCellValue ( 'L'.$write_numA,  $sqlrows["lunch"]); 
     $objActSheet->setCellValue ( 'N'.$write_numA,  $sqlrows["dinner"]); 
        
     }
      }
     else if($write_num >=180 && $write_num < 240)
    {
     $objPHPExcel->setActiveSheetIndex(3);  
     $objActSheet = $objPHPExcel->getActiveSheet ();
     if($write_num < 210)
     {    
     $write_numA = $write_num - 176;
     $objActSheet->setCellValue ( 'B'.$write_numA,  $sqlrows["short"]);    
     $objActSheet->setCellValue ( 'C'.$write_numA,  $sqlrows["name"]); 
     $objActSheet->setCellValue ( 'D'.$write_numA,  $sqlrows["lunch"]); 
     $objActSheet->setCellValue ( 'F'.$write_numA,  $sqlrows["dinner"]); 
          
     
     }
    else
     {
     $write_numA = $write_num - 206;
     $objActSheet->setCellValue ( 'J'.$write_numA,  $sqlrows["short"]); 
     $objActSheet->setCellValue ( 'K'.$write_numA,  $sqlrows["name"]); 
     $objActSheet->setCellValue ( 'L'.$write_numA,  $sqlrows["lunch"]); 
     $objActSheet->setCellValue ( 'N'.$write_numA,  $sqlrows["dinner"]);         
     }
     }
    else
    {
      echo '超出范围，请注意！';
          exit();
    }
    $write_num++;
}
}
else
    echo '没有报餐信息！';
//工作餐


//有送餐需求的

$sqlstr2 = "select shortdep.short,name,lunch,lunchpack,dinner,dinnerpack from bookinfo,shortdep where shortdep.department = bookinfo.dep and date >='".$current."06-00-00' and date < '".$current."09-03-00' and (lunchpack!='' or dinnerpack!='') and shortdep.short != '罗定'  order by short";

$result2 = mysql_query($sqlstr2) or die(mysql_error());

if( mysql_num_rows($result2))
{
  //遍历计数器

while($sqlrows2=mysql_fetch_array($result2))
{
    if($write_num < 60)
  {  
     $objPHPExcel->setActiveSheetIndex(0);  
     $objActSheet = $objPHPExcel->getActiveSheet ();
     if($write_num < 30)
     {    
     $write_numA = $write_num + 4;
     $objActSheet->setCellValue ( 'B'.$write_numA,  $sqlrows2["short"]);   
     $objActSheet->setCellValue ( 'C'.$write_numA,  $sqlrows2["name"]); 
     $objActSheet->setCellValue ( 'D'.$write_numA,  $sqlrows2["lunch"]); 
     $objActSheet->setCellValue ( 'E'.$write_numA,  $sqlrows2["lunchpack"]); 
     $objActSheet->setCellValue ( 'F'.$write_numA,  $sqlrows2["dinner"]); 
     $objActSheet->setCellValue ( 'G'.$write_numA,  $sqlrows2["dinnerpack"]); 
          
     
     }
    else
     {
     $write_numA = $write_num - 26;
     $objActSheet->setCellValue ( 'J'.$write_numA,  $sqlrows2["short"]); 
     $objActSheet->setCellValue ( 'K'.$write_numA,  $sqlrows2["name"]); 
     $objActSheet->setCellValue ( 'L'.$write_numA,  $sqlrows2["lunch"]); 
     $objActSheet->setCellValue ( 'M'.$write_numA,  $sqlrows2["lunchpack"]); 
     $objActSheet->setCellValue ( 'N'.$write_numA,  $sqlrows2["dinner"]); 
     $objActSheet->setCellValue ( 'O'.$write_numA,  $sqlrows2["dinnerpack"]); 
        
     }
   }
    else if ($write_num >=60 && $write_num <120)
    {
          
         $objPHPExcel->setActiveSheetIndex(1);  
         $objActSheet = $objPHPExcel->getActiveSheet ();
         if($write_num < 90)
        {    
         $write_numA = $write_num - 56;
     $objActSheet->setCellValue ( 'B'.$write_numA,  $sqlrows2["short"]);    
     $objActSheet->setCellValue ( 'C'.$write_numA,  $sqlrows2["name"]); 
     $objActSheet->setCellValue ( 'D'.$write_numA,  $sqlrows2["lunch"]); 
     $objActSheet->setCellValue ( 'E'.$write_numA,  $sqlrows2["lunchpack"]); 
     $objActSheet->setCellValue ( 'F'.$write_numA,  $sqlrows2["dinner"]); 
     $objActSheet->setCellValue ( 'G'.$write_numA,  $sqlrows2["dinnerpack"]);
          
     
        }
        else
        {
        $write_numA = $write_num - 86;
     $objActSheet->setCellValue ( 'J'.$write_numA,  $sqlrows2["short"]); 
     $objActSheet->setCellValue ( 'K'.$write_numA,  $sqlrows2["name"]); 
     $objActSheet->setCellValue ( 'L'.$write_numA,  $sqlrows2["lunch"]); 
     $objActSheet->setCellValue ( 'M'.$write_numA,  $sqlrows2["lunchpack"]); 
     $objActSheet->setCellValue ( 'N'.$write_numA,  $sqlrows2["dinner"]); 
     $objActSheet->setCellValue ( 'O'.$write_numA,  $sqlrows2["dinnerpack"]); 
        
     }
    }
    else if($write_num >=120 && $write_num < 180)
    {
     $objPHPExcel->setActiveSheetIndex(2);  
     $objActSheet = $objPHPExcel->getActiveSheet ();
     if($write_num < 150)
     {    
     $write_numA = $write_num - 116;
     $objActSheet->setCellValue ( 'B'.$write_numA,  $sqlrows2["short"]);    
     $objActSheet->setCellValue ( 'C'.$write_numA,  $sqlrows2["name"]); 
     $objActSheet->setCellValue ( 'D'.$write_numA,  $sqlrows2["lunch"]); 
     $objActSheet->setCellValue ( 'E'.$write_numA,  $sqlrows2["lunchpack"]); 
     $objActSheet->setCellValue ( 'F'.$write_numA,  $sqlrows2["dinner"]); 
     $objActSheet->setCellValue ( 'G'.$write_numA,  $sqlrows2["dinnerpack"]);
          
     
     }
    else
     {
     $write_numA = $write_num - 146;
     $objActSheet->setCellValue ( 'J'.$write_numA,  $sqlrows2["short"]); 
     $objActSheet->setCellValue ( 'K'.$write_numA,  $sqlrows2["name"]); 
     $objActSheet->setCellValue ( 'L'.$write_numA,  $sqlrows2["lunch"]); 
     $objActSheet->setCellValue ( 'M'.$write_numA,  $sqlrows2["lunchpack"]); 
     $objActSheet->setCellValue ( 'N'.$write_numA,  $sqlrows2["dinner"]); 
     $objActSheet->setCellValue ( 'O'.$write_numA,  $sqlrows2["dinnerpack"]); 
        
     }
    }
      else if($write_num >=180 && $write_num < 240)
    {
     $objPHPExcel->setActiveSheetIndex(3);  
     $objActSheet = $objPHPExcel->getActiveSheet ();
     if($write_num < 210)
     {    
     $write_numA = $write_num - 176;
     $objActSheet->setCellValue ( 'B'.$write_numA,  $sqlrows2["short"]);    
     $objActSheet->setCellValue ( 'C'.$write_numA,  $sqlrows2["name"]); 
     $objActSheet->setCellValue ( 'D'.$write_numA,  $sqlrows2["lunch"]); 
     $objActSheet->setCellValue ( 'E'.$write_numA,  $sqlrows2["lunchpack"]);    
     $objActSheet->setCellValue ( 'F'.$write_numA,  $sqlrows2["dinner"]); 
     $objActSheet->setCellValue ( 'G'.$write_numA,  $sqlrows2["dinnerpack"]);     
     
     }
    else
     {
     $write_numA = $write_num - 206;
     $objActSheet->setCellValue ( 'J'.$write_numA,  $sqlrows2["short"]); 
     $objActSheet->setCellValue ( 'K'.$write_numA,  $sqlrows2["name"]); 
     $objActSheet->setCellValue ( 'L'.$write_numA,  $sqlrows2["lunch"]);
     $objActSheet->setCellValue ( 'M'.$write_numA,  $sqlrows2["lunchpack"]);   
     $objActSheet->setCellValue ( 'N'.$write_numA,  $sqlrows2["dinner"]);
     $objActSheet->setCellValue ( 'O'.$write_numA,  $sqlrows2["dinnerpack"]);    
     }
    }
    else
    {
      echo '超出范围，请注意！';
          exit();
    }
    $write_num++;
}
}
else
    echo '有送餐需求的报餐信息不存在！';


$write_num1 = 0;  //遍历计数器

$sqlstr1 = "select shortdep.short,name,wlunch,wlunchcount,lcomments,wdinner,wdinnercount,dcomments from workmealinfo,shortdep where shortdep.department = workmealinfo.dep  and shortdep.short != '罗定'  and date >='".$current."06-00-00' and date < '".$current."09-03-00'";

$result1 = mysql_query($sqlstr1) or die(mysql_error());

if( mysql_num_rows($result1))
{
    $objPHPExcel->setActiveSheetIndex(4);
    $objActSheet = $objPHPExcel->getActiveSheet ();
    $objActSheet->setTitle ($date. '工作餐登记表' );
    $objActSheet->setCellValue ( 'A1', $date. '工作餐登记表' );
    $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
    $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);  
    
    
    while($sqlrows1=mysql_fetch_array($result1))
{
    if($write_num1 < 28)
  {  
     $objPHPExcel->setActiveSheetIndex(4);  
     $objActSheet = $objPHPExcel->getActiveSheet ();
    
     $write_numB = $write_num1 + 3;
     $objActSheet->setCellValue ( 'B'.$write_numB,  $sqlrows1["short"]);   
     $objActSheet->setCellValue ( 'C'.$write_numB,  $sqlrows1["name"]); 
     $objActSheet->setCellValue ( 'D'.$write_numB,  $sqlrows1["wlunch"]); 
     $objActSheet->setCellValue ( 'E'.$write_numB,  $sqlrows1["wlunchcount"]); 
     $objActSheet->setCellValue ( 'F'.$write_numB,  $sqlrows1["lcomments"]); 
     $objActSheet->setCellValue ( 'G'.$write_numB,  $sqlrows1["wdinner"]); 
     $objActSheet->setCellValue ( 'H'.$write_numB,  $sqlrows1["wdinnercount"]); 
     $objActSheet->setCellValue ( 'I'.$write_numB,  $sqlrows1["dcomments"]); 
     
   }
     else 
         
        echo '最多接受28个工作餐报餐信息！请和作者联系！';
   $write_num1++; 
 }
}
else
    echo '没有工作餐信息！';


$objPHPExcel->setActiveSheetIndex(0);  //保存前把活动表单设为第一个表
 //导出

 $filename = $date.'员工报餐记录.xls';
 $objWriter = PHPExcel_IOFactory::createWriter ( $objPHPExcel, 'Excel5' ); //在内存中准备一个excel2003文件
 $objWriter->save ('saekv://'.$filename);
    
echo '报餐信息写入Excel成功！'.'  员工报餐共：'.$write_num.'人，工作餐共：'.$write_num1.'人';

//$kv = new SaeKV();
//$YestdBC = $kv->get('YestodayBookCount');
//$kv->set('YestodayBookCount', $write_num+$YestdBC); //把昨天订餐总人数记录，明天可以减除这个数获得新的index
//echo $YestdBC;



//清空数据表
//$sqlstr3 = "TRUNCATE TABLE bookinfo";

//$result3 = mysql_query($sqlstr3) or die(mysql_error());

//echo 'SQL中的数据已清空！';


//发送邮件

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
$to = "3378973318@qq.com";
$mail->addCC('185297167@qq.com');
$mail->AddAddress($to);
    
$current=date("Y年m月d日", time());
$filename = $current.'员工报餐记录';
    
$mail->Subject = $filename;
$mail->Body = '报餐信息写入Excel成功！'.' 员工报餐共：'.$write_num.'人，工作餐共：'.$write_num1.'人<br \> <h1>报餐信息</h1>由集团客户事业部为您发送的！';
$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; //当邮件不支持html时备用显示，可以省略
$mail->WordWrap = 80; // 设置每行字符串的长度
$mail->AddAttachment('saekv://'.$filename.'.xls'); //可以添加附件
$mail->IsHTML(true);
$mail->Send();
echo '邮件已发送\n';
} catch (phpmailerException $e) {
echo "邮件发送失败：".$e->errorMessage();
}




//生成罗定表格
$objReaderLD = PHPExcel_IOFactory::createReader ( 'Excel5' );
$objPHPExcelLD = $objReaderLD->load ("booklist3.xls" );


$objPHPExcelLD->setActiveSheetIndex(0);    
//获取当前活动的表
$objActSheetLD = $objPHPExcelLD->getActiveSheet ();
$objActSheetLD->setTitle ($date. '罗定员工报餐记录' );
$objActSheetLD->setCellValue ( 'B1', $date. '罗定员工报餐记录' );
$objPHPExcelLD->getActiveSheet()->getStyle('B1')->getFont()->setSize(16);
$objPHPExcelLD->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
$objPHPExcelLD->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
$objPHPExcelLD->getActiveSheet()->getStyle('B1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);  




//LD没有送餐需求的
$current=date("Y-m-d-", time());
$sqlstr3 = "select shortdep.short,name,lunch,dinner from bookinfo,shortdep where shortdep.department = bookinfo.dep and date >='".$current."06-00-00' and date < '".$current."09-03-00' and lunchpack='' and dinnerpack='' and dep = '罗定市分公司'";
$result3 = mysql_query($sqlstr3) or die(mysql_error());
//开始遍历sql结果并写入excel
$write_num = 0;
    
if( mysql_num_rows($result3))
{
  //遍历计数器

while($sqlrows3=mysql_fetch_array($result3))
{
    if($write_num < 60)
  {  
     $objPHPExcelLD->setActiveSheetIndex(0);  
     $objActSheetLD = $objPHPExcelLD->getActiveSheet ();
     if($write_num < 30)
     {    
     $write_numA = $write_num + 4;
     $objActSheetLD->setCellValue ( 'B'.$write_numA,  $sqlrows3["short"]);   
     $objActSheetLD->setCellValue ( 'C'.$write_numA,  $sqlrows3["name"]); 
     $objActSheetLD->setCellValue ( 'D'.$write_numA,  $sqlrows3["lunch"]); 
     $objActSheetLD->setCellValue ( 'F'.$write_numA,  $sqlrows3["dinner"]); 
          
     
     }
    else
     {
     $write_numA = $write_num - 26;
     $objActSheetLD->setCellValue ( 'J'.$write_numA,  $sqlrows3["short"]); 
     $objActSheetLD->setCellValue ( 'K'.$write_numA,  $sqlrows3["name"]); 
     $objActSheetLD->setCellValue ( 'L'.$write_numA,  $sqlrows3["lunch"]); 
     $objActSheetLD->setCellValue ( 'N'.$write_numA,  $sqlrows3["dinner"]); 
        
     }
   }
    else
    {
      echo '超出范围，请注意！';
          exit();
    }
    $write_num++;
}
}
else
    echo '没有报餐信息！';

//LD有送餐需求的

$sqlstr4 = "select shortdep.short,name,lunch,lunchpack,dinner,dinnerpack from bookinfo,shortdep where shortdep.department = bookinfo.dep and date >='".$current."06-00-00' and date < '".$current."09-03-00' and (lunchpack!='' or dinnerpack!='') and dep = '罗定市分公司'";

$result4 = mysql_query($sqlstr4) or die(mysql_error());

if( mysql_num_rows($result4))
{
  //遍历计数器

while($sqlrows4=mysql_fetch_array($result4))
{
    if($write_num < 60)
  {  
     $objPHPExcelLD->setActiveSheetIndex(0);  
     $objActSheetLD = $objPHPExcelLD->getActiveSheet ();
     if($write_num < 30)
     {    
     $write_numA = $write_num + 4;
     $objActSheetLD->setCellValue ( 'B'.$write_numA,  $sqlrows4["short"]);   
     $objActSheetLD->setCellValue ( 'C'.$write_numA,  $sqlrows4["name"]); 
     $objActSheetLD->setCellValue ( 'D'.$write_numA,  $sqlrows4["lunch"]); 
     $objActSheetLD->setCellValue ( 'E'.$write_numA,  $sqlrows4["lunchpack"]); 
     $objActSheetLD->setCellValue ( 'F'.$write_numA,  $sqlrows4["dinner"]); 
     $objActSheetLD->setCellValue ( 'G'.$write_numA,  $sqlrows4["dinnerpack"]); 
          
     
     }
    else
     {
     $write_numA = $write_num - 26;
     $objActSheetLD->setCellValue ( 'J'.$write_numA,  $sqlrows4["short"]); 
     $objActSheetLD->setCellValue ( 'K'.$write_numA,  $sqlrows4["name"]); 
     $objActSheetLD->setCellValue ( 'L'.$write_numA,  $sqlrows4["lunch"]); 
     $objActSheetLD->setCellValue ( 'M'.$write_numA,  $sqlrows4["lunchpack"]); 
     $objActSheetLD->setCellValue ( 'N'.$write_numA,  $sqlrows4["dinner"]); 
     $objActSheetLD->setCellValue ( 'O'.$write_numA,  $sqlrows4["dinnerpack"]); 
        
     }
   }
    
    else
    {
      echo '超出范围，请注意！';
          exit();
    }
    $write_num++;
}
}
else
    echo '有送餐需求的报餐信息不存在！';

//LD工作餐

$write_num1 = 0;  //遍历计数器

$sqlstr5 = "select shortdep.short,name,wlunch,wlunchcount,lcomments,wdinner,wdinnercount,dcomments from workmealinfo,shortdep where shortdep.department = workmealinfo.dep and dep = '罗定市分公司' and date >='".$current."06-00-00' and date < '".$current."09-03-00'";

$result5 = mysql_query($sqlstr5) or die(mysql_error());

if( mysql_num_rows($result5))
{
    $objPHPExcelLD->setActiveSheetIndex(4);
    $objActSheetLD = $objPHPExcelLD->getActiveSheet ();
    $objActSheetLD->setTitle ($date. '罗定工作餐登记表' );
    $objActSheetLD->setCellValue ( 'A1', $date. '罗定工作餐登记表' );
    $objPHPExcelLD->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
    $objPHPExcelLD->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
    $objPHPExcelLD->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $objPHPExcelLD->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);  
    
    
    while($sqlrows5=mysql_fetch_array($result5))
{
    if($write_num1 < 28)
  {  
     $objPHPExcelLD->setActiveSheetIndex(4);  
     $objActSheetLD = $objPHPExcelLD->getActiveSheet ();
    
     $write_numB = $write_num1 + 3;
     $objActSheetLD->setCellValue ( 'B'.$write_numB,  $sqlrows5["short"]);   
     $objActSheetLD->setCellValue ( 'C'.$write_numB,  $sqlrows5["name"]); 
     $objActSheetLD->setCellValue ( 'D'.$write_numB,  $sqlrows5["wlunch"]); 
     $objActSheetLD->setCellValue ( 'E'.$write_numB,  $sqlrows5["wlunchcount"]); 
     $objActSheetLD->setCellValue ( 'F'.$write_numB,  $sqlrows5["lcomments"]); 
     $objActSheetLD->setCellValue ( 'G'.$write_numB,  $sqlrows5["wdinner"]); 
     $objActSheetLD->setCellValue ( 'H'.$write_numB,  $sqlrows5["wdinnercount"]); 
     $objActSheetLD->setCellValue ( 'I'.$write_numB,  $sqlrows5["dcomments"]); 
     
   }
     else 
         
        echo '最多接受28个工作餐报餐信息！请和作者联系！';
   $write_num1++; 
 }
}
else
    echo '没有工作餐信息！';


$objPHPExcelLD->setActiveSheetIndex(0);  //保存前把活动表单设为第一个表
 //导出

 $filenameLD = $date.'罗定员工报餐记录.xls';
 $objWriterLD = PHPExcel_IOFactory::createWriter ( $objPHPExcelLD, 'Excel5' ); //在内存中准备一个excel2003文件
 $objWriterLD->save ('saekv://'.$filenameLD);
    
echo '罗定分公司报餐信息写入Excel成功！'.'  员工报餐共：'.$write_num.'人，工作餐共：'.$write_num1.'人';







//发送罗定公司报餐信息
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
$to = "linjy22@chinaunicom.cn";
$mail->addCC('185297167@qq.com');
$mail->AddAddress($to);
    
$current=date("Y年m月d日", time());
$filename = $current.'罗定员工报餐记录';
    
$mail->Subject = $filenameLD;
$mail->Body = '报餐信息写入Excel成功！'.' 罗定员工报餐共：'.$write_num.'人，工作餐共：'.$write_num1.'人<br \> <h1>报餐信息</h1>由集团客户事业部为您发送的！';
$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; //当邮件不支持html时备用显示，可以省略
$mail->WordWrap = 80; // 设置每行字符串的长度
$mail->AddAttachment('saekv://'.$filenameLD); //可以添加附件
$mail->IsHTML(true);
$mail->Send();
echo '邮件已发送';
} catch (phpmailerException $e) {
echo "邮件发送失败：".$e->errorMessage();
}
mysql_close($link);
 ?>
 