<?php
header("Content-Type:text/html;charset=utf8");
//include_once ("importCSV/connect.php");

//$sqlstr = "INSERT INTO bookinfo(dep,name,lunch,lunchpack,dinner,dinnerpack,date) VALUES('集团客户事业部','测试2','√','','√','','2015-10-11-08')";

//for($i=0; $i < 200; $i++)
//mysql_query($sqlstr) or die(mysql_error());

//$sqlstr2 = "select @@IDENTITY";
//       $result2 = mysql_query($sqlstr2) or die(mysql_error());        
//        $row = mysql_fetch_array($result2);
//echo '序号'.$row[0];
//$sqlstr1 = "INSERT INTO workmealinfo(dep,name,wlunch,wlunchcount,lcomments,wdinner,wdinnercount,dcomments,date) VALUES('测试','测试','√','12','接待新兴分公司','√','10','接待新兴分公司','2015-10-07-08')";

//for($j=0; $j < 29; $j++)
//mysql_query($sqlstr1) or die(mysql_error());

$date = date("Y-m-d-", time());
$current = date("Y-m-d-H-i-s", time());
$before =  $date.'09';
$after = date("Y-m-d-",strtotime("-1 day")).'21';

echo '昨天21点：'.$after.'  今天9点：'.$before.'  现在是：'.$current;

 include_once ("Classes/getIPinfo.php");    
$ipadd = getIP();
$ipadd .= $_SERVER['HTTP_USER_AGENT'];  

echo $ipadd;

?>