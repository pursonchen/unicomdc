<?php

/**
 * @
 * @Description:
 * @Copyright (C) 2011 helloweba.com,All Rights Reserved.
 * -----------------------------------------------------------------------------
 * @author: Liurenfei (lrfbeyond@163.com)
 * @Create: 2012-5-1
 * @Modify: Purson
*/
include_once ("connect.php");

$action = $_GET['action'];
if ($action == 'import') { //导入CSV
	$filename = $_FILES['file']['tmp_name'];
	if (empty ($filename)) {
		echo '请选择要导入的CSV文件！';
		exit;
	}
	$handle = fopen($filename, 'r');
	$result = input_csv($handle); //解析csv
	$len_result = count($result);
	if($len_result==0){
		echo '没有任何数据！';
		exit;
	}
	for ($i = 1; $i < $len_result; $i++) { //循环获取各字段值
		$name = iconv('gb2312', 'utf-8', $result[$i][0]); //中文转码
		$sex = iconv('gb2312', 'utf-8', $result[$i][1]);
		$company = iconv('gb2312', 'utf-8', $result[$i][2]);
		$department = iconv('gb2312', 'utf-8', $result[$i][3]);
		$position = iconv('gb2312', 'utf-8', $result[$i][4]);
		$mobile = $result[$i][5];
		$email =  $result[$i][6];
    $password = "123456";
		$data_values .= "('$name','$sex','$company','$department','$position','$mobile','$email','$password'),";
	}
	$data_values = substr($data_values,0,-1); //去掉最后一个逗号
	fclose($handle); //关闭指针
	$query = mysql_query("insert into userinfo (name,sex,company,department,position,mobile,email,password) values $data_values");//批量插入数据表中
	if($query){
		echo '导入成功！';
	}else{
		echo '导入失败！';
	}
} elseif ($action=='export') { //导出CSV
    $result = mysql_query("select * from userinfo");
    $str = "姓名,性别,年龄,公司,部门,职位,手机,邮箱\n";
    $str = iconv('utf-8','gb2312',$str);
    while($row=mysql_fetch_array($result)){
        $name = iconv('utf-8','gb2312',$row['name']);
        $sex = iconv('utf-8','gb2312',$row['sex']);
    	  $company = iconv('utf-8','gb2312',$row['company']);
    	  $depart = iconv('utf-8','gb2312',$row['department']);
    	  $position = iconv('utf-8','gb2312',$row['position']);
    	  $mobile = $row['mobile'];
    	  $email = $row['email'];
    	
    	$str .= $name.",".$sex.",".$company.",".$depart.",".$position.",".$mobile.",".$email."\n";
    }
    $filename = date('Ymd').'联通云浮市分公司用餐人信息'.'.csv';
    export_csv($filename,$str);
}
function input_csv($handle) {
	$out = array ();
	$n = 0;
	while ($data = fgetcsv($handle, 10000)) {
		$num = count($data);
		for ($i = 0; $i < $num; $i++) {
			$out[$n][$i] = $data[$i];
		}
		$n++;
	}
	return $out;
}

function export_csv($filename,$data) {
    header("Content-type:text/csv");
    header("Content-Disposition:attachment;filename=".$filename);
    header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
    header('Expires:0');
    header('Pragma:public');
    echo $data;
}
?>
