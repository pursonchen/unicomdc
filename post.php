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

  echo "抱歉，每天早上6点到9点才能报餐！";
exit();
}

include_once ("importCSV/connect.php");



$dep =  mysql_escape_string($sdepart); //echo $dep;
$name =  mysql_escape_string($sname); //echo $name;

    $dcArray = $_POST['dingcan'];

    if($name==''){
        echo '请输入您的姓名。';
    }
    else if(count($dcArray) == 0)
    {
        echo '请选择您的点餐信息。';
    }
    else if(count($dcArray) == 1){
        
        if($dcArray[0] == '2' || $dcArray[0] == '4'  || $dcArray[0] == '5'|| $dcArray[0] == '6')
        {
            echo '午餐或者晚餐未选，不能选送餐或者打包！';       
            exit();
        }
        if($dcArray[0] == '1' )
        {
        $lunch = mysql_escape_string('√');
             
         
        }
        if($dcArray[0] == '3' )  
        {
        $dinner = mysql_escape_string('√');        
        
        }
    }
     else if(count($dcArray) == 2){

             if($dcArray[0] == '1' && $dcArray[1] == '4' )
        {
          echo '晚餐未勾选,不能送餐！';
          exit();
         }         
            if($dcArray[0] == '1' && $dcArray[1] == '6' )
        {
          echo '晚餐未勾选,不能打包自取！';
          exit();
         }
         if($dcArray[0] == '2' && $dcArray[1] == '4' )
        {
          echo '午、晚餐未勾选,不能送餐！';
          exit();
         }
          if($dcArray[0] == '2' && $dcArray[1] == '5' )
        {
          echo '午餐未勾选,不能送餐或者打包自取！';
          exit();
         }
           if($dcArray[0] == '2' && $dcArray[1] == '6' )
        {
          echo '午餐、晚餐未勾选,不能送餐或者打包自取！';
          exit();
         }
          if($dcArray[0] == '3' && $dcArray[1] == '2' )
        {
          echo '午餐未勾选,不能送餐！';
          exit();
         }
          if($dcArray[0] == '3' && $dcArray[1] == '5' )
        {
          echo '午餐未勾选,不能打包自取！';
          exit();
         }
          if($dcArray[0] == '4' && $dcArray[1] == '5')
        {
          echo '午、晚餐未勾选,不能送餐或者打包自取！';
          exit();
         }
          if($dcArray[0] == '4' && $dcArray[1] == '6')
        {
          echo '晚餐未勾选,不能送餐或者打包自取！';
          exit();
         }
          if($dcArray[0] == '5' && $dcArray[1] == '6')
        {
          echo '午、晚餐未勾选,不能打包自取！';
          exit();
         }
         if($dcArray[0] == '1' && $dcArray[1] == '2')
         {
         $lunch = mysql_escape_string('√');
         $lunchpack = mysql_escape_string('√');
             
         }
           if($dcArray[0] == '1' && $dcArray[1] == '5')
         {
         $lunch = mysql_escape_string('√');
         $lunchpack = mysql_escape_string('打包');
             
         }
         if($dcArray[0] == '3' && $dcArray[1] == '6')
         {
         $dinner = mysql_escape_string('√');
         $dinnerpack = mysql_escape_string('打包');
                     
         }
         else if($dcArray[0] == '1' && $dcArray[1] == '3')
         {
         $lunch = mysql_escape_string('√');
         $dinner = mysql_escape_string('√');  
                       
         }
         if($dcArray[0] == '3' && $dcArray[1] == '4')
         {
          $dinner = mysql_escape_string('√');
         $dinnerpack = mysql_escape_string('√');                              
         }
    }
     else if(count($dcArray) == 3){
       if($dcArray[0] == '2')
       {
         echo '午餐未勾选,不能送餐！';
        exit();
       }
          else if($dcArray[0] == '4')
       {
         echo '午、晚餐未勾选,不能送餐或者打包自取！';
        exit();
       }
          else if($dcArray[0] == '1' && $dcArray[1] == '2' && $dcArray[2] == '4')
       {
        echo '晚餐未勾选,不能送餐！';
        exit();   
       }
         else if($dcArray[0] == '1' && $dcArray[1] == '2' && $dcArray[2] == '5')
       {
        echo '午餐不能同时选择送餐和打包自取！';
        exit();   
       }
         else if($dcArray[0] == '1' && $dcArray[1] == '2' && $dcArray[2] == '6')
       {
        echo '晚餐未勾选，不能打包自取！';
        exit();   
       }
       else if($dcArray[0] == '1' && $dcArray[1] == '4' && $dcArray[2] == '5')
       {
        echo '晚餐未勾选，不能送餐！';
        exit();   
       }
       else if($dcArray[0] == '1' && $dcArray[1] == '4' && $dcArray[2] == '6')
       {
        echo '晚餐未勾选，不能送餐或者打包自取！';
        exit();   
       }
         else if($dcArray[0] == '1' && $dcArray[1] == '5' && $dcArray[2] == '6')
       {
        echo '晚餐未勾选，不能打包自取！';
        exit();   
       } 
         else if($dcArray[0] == '3' && $dcArray[1] == '4' && $dcArray[2] == '5')
       {
        echo '午餐未勾选，不能打包自取！';
        exit();   
       }
          else if($dcArray[0] == '3' && $dcArray[1] == '4' && $dcArray[2] == '6')
       {
        echo '晚餐不能同时选择送餐和打包自取！';
        exit();   
       }
          else if($dcArray[0] == '3' && $dcArray[1] == '2' && $dcArray[2] == '5')
       {
        echo '午餐未勾选，不能送餐和打包自取！';
        exit();   
       }
          else if($dcArray[0] == '3' && $dcArray[1] == '2' && $dcArray[2] == '6')
       {
        echo '午餐未勾选，不能送餐！';
        exit();   
       }

         if($dcArray[0] == '1' && $dcArray[1] == '3' && $dcArray[2] == '2')
        {
            
        $lunch = mysql_escape_string('√');
        $lunchpack = mysql_escape_string('√');
        $dinner = mysql_escape_string('√');
                  
  
        }
         else if($dcArray[0] == '1' && $dcArray[1] == '3' && $dcArray[2] == '4')
        {
             
        $lunch = mysql_escape_string('√');
        $dinner = mysql_escape_string('√');
        $dinnerpack = mysql_escape_string('√');
     
         }
          else if($dcArray[0] == '1' && $dcArray[1] == '3' && $dcArray[2] == '5')
        {
             
        $lunch = mysql_escape_string('√');
        $dinner = mysql_escape_string('√');
        $lunchpack = mysql_escape_string('打包');           
         }
           else if($dcArray[0] == '1' && $dcArray[1] == '3' && $dcArray[2] == '6')
        {
             
        $lunch = mysql_escape_string('√');
        $dinner = mysql_escape_string('√');
        $dinnerpack = mysql_escape_string('打包');           
         }
       
    }
else if(count($dcArray) == 4)
{
   if($dcArray[0] == '2')
       {
         echo '午餐未勾选,不能送餐或打包！';
        exit();
       }
   else if($dcArray[0] == '1' && $dcArray[1] == '2' && $dcArray[2] == '5' && $dcArray[3] == '6')
  {
      echo '午餐不能同时选择送餐和打包自取！';
      exit();   
  } 
   else if($dcArray[0] == '1' && $dcArray[1] == '4' && $dcArray[2] == '5' && $dcArray[3] == '6')
  {
      echo '晚餐未勾选，不能同时选择送餐和打包自取！';
      exit();   
  }
  else if($dcArray[0] == '1' && $dcArray[1] == '3' && $dcArray[2] == '2' && $dcArray[3] == '5')
  {
      echo '午餐不能同时选择送餐和打包自取！';
      exit();   
  }
   else  if($dcArray[0] == '1' && $dcArray[1] == '3' && $dcArray[2] == '4' && $dcArray[3] == '6')
  {
      echo '晚餐不能同时选择送餐和打包自取！';
      exit();   
  }
     else  if($dcArray[0] == '3' && $dcArray[1] == '2' && $dcArray[2] == '5' && $dcArray[3] == '6')
  {
      echo '午餐未勾选，不能同时选择送餐和打包自取！';
      exit();   
  }
      else  if($dcArray[0] == '3' && $dcArray[1] == '4' && $dcArray[2] == '5' && $dcArray[3] == '6')
  {
      echo '晚餐不能同时选择送餐和打包自取！';
      exit();   
  }
    
   if($dcArray[0] == '1' && $dcArray[1] == '3' && $dcArray[2] == '2' && $dcArray[3] == '4')
  {
    $lunch = mysql_escape_string('√');
    $dinner = mysql_escape_string('√');
    $lunchpack = mysql_escape_string('√');
    $dinnerpack = mysql_escape_string('√');
  }
   if($dcArray[0] == '1' && $dcArray[1] == '3' && $dcArray[2] == '2' && $dcArray[3] == '6')
  {
    $lunch = mysql_escape_string('√');
    $dinner = mysql_escape_string('√');
    $lunchpack = mysql_escape_string('√');
    $dinnerpack = mysql_escape_string('打包');
  }   
     else if($dcArray[0] == '1' && $dcArray[1] == '3' && $dcArray[2] == '4' && $dcArray[3] == '5')
  {
    $lunch = mysql_escape_string('√');
    $dinner = mysql_escape_string('√');
    $lunchpack = mysql_escape_string('打包');
    $dinnerpack = mysql_escape_string('√');
  }
  else if($dcArray[0] == '1' && $dcArray[1] == '3' && $dcArray[2] == '5' && $dcArray[3] == '6')
  {
    $lunch = mysql_escape_string('√');
    $dinner = mysql_escape_string('√');
    $lunchpack = mysql_escape_string('打包');
    $dinnerpack = mysql_escape_string('打包');
  }
             
}
else
{
   echo '午、晚餐不能同时选择送餐或者打包自取，请重新选择报餐选项！';
        exit();
}
  

//echo $lunch.'+'.$lunchpack.'+'.$dinner.'+'.$dinnerpack.'+'.$current;
 if($lunch != '' || $dinner != '')
 {
  $sqlstr1 = "select * from bookinfo where name = '".$name."' and date < '".$before."' and date >= '".$after."'limit 1";
    
      $res = mysql_query($sqlstr1) or die(mysql_error());   

       if(mysql_num_rows($res))
       echo "您今天已经报餐了，请不要重复报餐！";
  
     else{
 include_once ("Classes/getIPinfo.php");       
 $ipadd = getIP();
         //$ipadd .= $_SERVER['HTTP_USER_AGENT']; 
 $sqlstr = "insert into bookinfo (dep,name,lunch,lunchpack,dinner,dinnerpack,date,ipadd) values('".$dep."','".$name."','".$lunch."','".$lunchpack."','".$dinner."','".$dinnerpack."','".$current."','".$ipadd."')";
    
 mysql_query($sqlstr) or die(mysql_error());
     //echo 'Select db '.$dbname.' successfully';
         
         //  $sqlstr2 = "select @@IDENTITY";
         //  $result2 = mysql_query($sqlstr2) or die(mysql_error());        
         //  $row = mysql_fetch_array($result2);
         //  $kv = new SaeKV();
         //   $YestdBC = $kv->get('YestodayBookCount');  //获取昨天总订餐数
         //    $index = $row[0] - $YestdBC;
         
         //echo '报餐成功！您的报餐序号为：'.$index.'号 （因需要送餐的会自动排到最后，序号仅供参考）';  
         echo '报餐成功！';
     }
 }

 
mysql_close($link);
?>