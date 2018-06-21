<?php
include('Classes/PHPExcel.php');
header('Content-type:text/html;charset=utf-8');
 //这些数据假设是从M('xxx')->select()里面出来的

$objReader = PHPExcel_IOFactory::createReader ( 'Excel5' );
$objPHPExcel = $objReader->load ("booklist3.xls" );
$date = date("Y年m月d日", time());

for($i = 0; $i < 3; $i++)                 //先初始化三个表格标题
{
$objPHPExcel->setActiveSheetIndex($i);    
//获取当前活动的表
$objActSheet = $objPHPExcel->getActiveSheet ();
$objActSheet->setTitle ($date. '员工报餐记录' );
$objActSheet->setCellValue ( 'A1', $date. '员工报餐记录' );
$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);  

}



include_once ("importCSV/connect.php");

//没有送餐需求的

$current=date("Y-m-d-", time()); 
$sqlstr = "select dep,name,lunch,dinner from bookinfo where date >='".$current."06' and date < '".$current."09' and lunchpack='' and dinnerpack=''";

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
     $objActSheet->setCellValue ( 'B'.$write_numA,  $sqlrows["dep"]);   
     $objActSheet->setCellValue ( 'C'.$write_numA,  $sqlrows["name"]); 
     $objActSheet->setCellValue ( 'D'.$write_numA,  $sqlrows["lunch"]); 
     $objActSheet->setCellValue ( 'F'.$write_numA,  $sqlrows["dinner"]); 
          
     
     }
    else
     {
     $write_numA = $write_num - 26;
     $objActSheet->setCellValue ( 'J'.$write_numA,  $sqlrows["dep"]); 
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
     $objActSheet->setCellValue ( 'B'.$write_numA,  $sqlrows["dep"]);    
     $objActSheet->setCellValue ( 'C'.$write_numA,  $sqlrows["name"]); 
     $objActSheet->setCellValue ( 'D'.$write_numA,  $sqlrows["lunch"]); 
     $objActSheet->setCellValue ( 'F'.$write_numA,  $sqlrows["dinner"]); 
          
     
        }
        else
        {
        $write_numA = $write_num - 86;
     $objActSheet->setCellValue ( 'J'.$write_numA,  $sqlrows["dep"]); 
     $objActSheet->setCellValue ( 'K'.$write_numA,  $sqlrows["name"]); 
     $objActSheet->setCellValue ( 'L'.$write_numA,  $sqlrows["lunch"]); 
     $objActSheet->setCellValue ( 'M'.$write_numA,  $sqlrows["lunchpack"]); 
     $objActSheet->setCellValue ( 'N'.$write_numA,  $sqlrows["dinner"]); 
     $objActSheet->setCellValue ( 'O'.$write_numA,  $sqlrows["dinnerpack"]); 
        
     }
    }
    else if($write_num >=120 && $write_num < 180)
    {
     $objPHPExcel->setActiveSheetIndex(2);  
     $objActSheet = $objPHPExcel->getActiveSheet ();
     if($write_num < 150)
     {    
     $write_numA = $write_num - 116;
     $objActSheet->setCellValue ( 'B'.$write_numA,  $sqlrows["dep"]);    
     $objActSheet->setCellValue ( 'C'.$write_numA,  $sqlrows["name"]); 
     $objActSheet->setCellValue ( 'D'.$write_numA,  $sqlrows["lunch"]); 
     $objActSheet->setCellValue ( 'F'.$write_numA,  $sqlrows["dinner"]); 
          
     
     }
    else
     {
     $write_numA = $write_num - 146;
     $objActSheet->setCellValue ( 'J'.$write_numA,  $sqlrows["dep"]); 
     $objActSheet->setCellValue ( 'K'.$write_numA,  $sqlrows["name"]); 
     $objActSheet->setCellValue ( 'L'.$write_numA,  $sqlrows["lunch"]); 
     $objActSheet->setCellValue ( 'N'.$write_numA,  $sqlrows["dinner"]); 
        
     }
     else if($write_num >=180 && $write_num < 240)
    {
     $objPHPExcel->setActiveSheetIndex(3);  
     $objActSheet = $objPHPExcel->getActiveSheet ();
     if($write_num < 210)
     {    
     $write_numA = $write_num - 176;
     $objActSheet->setCellValue ( 'B'.$write_numA,  $sqlrows["dep"]);    
     $objActSheet->setCellValue ( 'C'.$write_numA,  $sqlrows["name"]); 
     $objActSheet->setCellValue ( 'D'.$write_numA,  $sqlrows["lunch"]); 
     $objActSheet->setCellValue ( 'F'.$write_numA,  $sqlrows["dinner"]); 
          
     
     }
    else
     {
     $write_numA = $write_num - 206;
     $objActSheet->setCellValue ( 'J'.$write_numA,  $sqlrows["dep"]); 
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

$sqlstr2 = "select dep,name,lunch,lunchpack,dinner,dinnerpack from bookinfo where date >='".$current."06' and date < '".$current."09' and (lunchpack!='' or dinnerpack!='')";

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
     $objActSheet->setCellValue ( 'B'.$write_numA,  $sqlrows2["dep"]);   
     $objActSheet->setCellValue ( 'C'.$write_numA,  $sqlrows2["name"]); 
     $objActSheet->setCellValue ( 'D'.$write_numA,  $sqlrows2["lunch"]); 
     $objActSheet->setCellValue ( 'E'.$write_numA,  $sqlrows2["lunchpack"]); 
     $objActSheet->setCellValue ( 'F'.$write_numA,  $sqlrows2["dinner"]); 
     $objActSheet->setCellValue ( 'G'.$write_numA,  $sqlrows2["dinnerpack"]); 
          
     
     }
    else
     {
     $write_numA = $write_num - 26;
     $objActSheet->setCellValue ( 'J'.$write_numA,  $sqlrows2["dep"]); 
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
     $objActSheet->setCellValue ( 'B'.$write_numA,  $sqlrows2["dep"]);    
     $objActSheet->setCellValue ( 'C'.$write_numA,  $sqlrows2["name"]); 
     $objActSheet->setCellValue ( 'D'.$write_numA,  $sqlrows2["lunch"]); 
     $objActSheet->setCellValue ( 'E'.$write_numA,  $sqlrows2["lunchpack"]); 
     $objActSheet->setCellValue ( 'F'.$write_numA,  $sqlrows2["dinner"]); 
     $objActSheet->setCellValue ( 'G'.$write_numA,  $sqlrows2["dinnerpack"]);
          
     
        }
        else
        {
        $write_numA = $write_num - 86;
     $objActSheet->setCellValue ( 'J'.$write_numA,  $sqlrows2["dep"]); 
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
     $objActSheet->setCellValue ( 'B'.$write_numA,  $sqlrows2["dep"]);    
     $objActSheet->setCellValue ( 'C'.$write_numA,  $sqlrows2["name"]); 
     $objActSheet->setCellValue ( 'D'.$write_numA,  $sqlrows2["lunch"]); 
     $objActSheet->setCellValue ( 'E'.$write_numA,  $sqlrows2["lunchpack"]); 
     $objActSheet->setCellValue ( 'F'.$write_numA,  $sqlrows2["dinner"]); 
     $objActSheet->setCellValue ( 'G'.$write_numA,  $sqlrows2["dinnerpack"]);
          
     
     }
    else
     {
     $write_numA = $write_num - 146;
     $objActSheet->setCellValue ( 'J'.$write_numA,  $sqlrows2["dep"]); 
     $objActSheet->setCellValue ( 'K'.$write_numA,  $sqlrows2["name"]); 
     $objActSheet->setCellValue ( 'L'.$write_numA,  $sqlrows2["lunch"]); 
     $objActSheet->setCellValue ( 'M'.$write_numA,  $sqlrows2["lunchpack"]); 
     $objActSheet->setCellValue ( 'N'.$write_numA,  $sqlrows2["dinner"]); 
     $objActSheet->setCellValue ( 'O'.$write_numA,  $sqlrows2["dinnerpack"]); 
        
     }
      else if($write_num >=180 && $write_num < 240)
    {
     $objPHPExcel->setActiveSheetIndex(3);  
     $objActSheet = $objPHPExcel->getActiveSheet ();
     if($write_num < 210)
     {    
     $write_numA = $write_num - 176;
     $objActSheet->setCellValue ( 'B'.$write_numA,  $sqlrows2["dep"]);    
     $objActSheet->setCellValue ( 'C'.$write_numA,  $sqlrows2["name"]); 
     $objActSheet->setCellValue ( 'D'.$write_numA,  $sqlrows2["lunch"]); 
     $objActSheet->setCellValue ( 'E'.$write_numA,  $sqlrows2["lunchpack"]);    
     $objActSheet->setCellValue ( 'F'.$write_numA,  $sqlrows2["dinner"]); 
     $objActSheet->setCellValue ( 'G'.$write_numA,  $sqlrows2["dinnerpack"]);     
     
     }
    else
     {
     $write_numA = $write_num - 206;
     $objActSheet->setCellValue ( 'J'.$write_numA,  $sqlrows2["dep"]); 
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




$sqlstr1 = "select dep,name,wlunch,wlunchcount,lcomments,wdinner,wdinnercount,dcomments from workmealinfo where date >='".$current."06' and date < '".$current."09'";

$result1 = mysql_query($sqlstr1) or die(mysql_error());

    $write_num1 = 0;  //遍历计数器
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
     $objActSheet->setCellValue ( 'B'.$write_numB,  $sqlrows1["dep"]);   
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

 echo '报餐信息写入Excel成功！'.'  员工报餐共：'.$write_num.'份，工作餐共：'.$write_num1.'份';
//另存为

 header('Content-Type: application/vnd.ms-excel');  
 header('Content-Disposition: attachment;filename="' .$filename. '.xls"');  
 header('Cache-Control: max-age=0');  
  
 $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
 $objWriter->save('php://output');  
 ?>
 