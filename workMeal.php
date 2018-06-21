<?php
OB_START();
header("Content-Type:text/html;charset=utf8");




session_start();
$sname =  $_SESSION['name'];
$sdepart = $_SESSION['department'];
$date = date("Y-m-d-", time());
$current = date("Y-m-d-H-i-s", time());              //edit add -i-s         
$before =  $date.'09-03-00';
$after = $date.'06-00-00';

if($current < $after || $current >= $before){

    echo "抱歉，每天早上6点到9点才能报工作餐！";
    exit();
}

include_once ("importCSV/connect.php");


$dep =  mysql_escape_string($sdepart); //echo $dep;
$name =  mysql_escape_string($sname); //echo $name;
$lunchcount = $_POST['lunchcount'] ? mysql_escape_string($_POST['lunchcount']):'';
$lunchcomments = $_POST['lunchcomments'] ? mysql_escape_string($_POST['lunchcomments']):'';
$dinnercount = $_POST['dinnercount'] ? mysql_escape_string($_POST['dinnercount']):'';
$dinnercomments = $_POST['dinnercomments'] ? mysql_escape_string($_POST['dinnercomments']):'';


    $dcArray = $_POST['dingcan'];

    if($name==''){
        echo '请输入您的姓名。';
    }
    else if(count($dcArray) == 0)
    {
        echo '请选择您的点餐信息。';
    }
    else if(count($dcArray) == 1){
        
        if($dcArray[0] == '1' )
        {
        $lunch = mysql_escape_string('√');    
        
        }
        if($dcArray[0] == '2' )  
        {
        $dinner = mysql_escape_string('√');        
        
        }
    }
     else if(count($dcArray) == 2){

         
         if($dcArray[0] == '1' && $dcArray[1] == '2')
         {
         $lunch = mysql_escape_string('√');
         $dinner = mysql_escape_string('√');
              
         }        
    }
  

//echo $lunch.'+'.$lunchpack.'+'.$dinner.'+'.$dinnerpack.'+'.$current;
 if($lunch != '' || $dinner != '')
 {
  $sqlstr1 = "select * from workmealinfo where name = '".$name."' and date < '".$before."' and date >= '".$after."'limit 1";
    
 $res = mysql_query($sqlstr1) or die(mysql_error());   
    

     if(mysql_num_rows($res))
      echo "您今天已报工作餐了，请不要重复报餐！";
  
     else{
 include_once ("Classes/getIPinfo.php");       
 $ipadd = getIP();
         //$ipadd .= $_SERVER['HTTP_USER_AGENT']; 
 $sqlstr = "insert into workmealinfo (dep,name,wlunch,wlunchcount,lcomments,wdinner,wdinnercount,dcomments,date,ipadd) values('".$dep."','".$name."','".$lunch."','".$lunchcount."','".$lunchcomments."','".$dinner."','".$dinnercount."','".$dinnercomments."','".$current."','".$ipadd."')";
    
 mysql_query($sqlstr) or die(mysql_error());
     //echo 'Select db '.$dbname.' successfully';
         echo '工作餐报餐成功！';  
     }
 }

 
mysql_close($link);
?>