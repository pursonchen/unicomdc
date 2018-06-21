<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>导入和导出数据为CSV文件</title>
<link rel="stylesheet" type="text/css" href="../css/main.css" />
<style type="text/css">
.demo{width:400px; height:100px; margin:100px auto}
.demo p{line-height:32px}
.btn{width:80px; height:26px; line-height:26px; background:url(btn_bg.gif) repeat-x; border:1px solid #ddd; cursor:pointer}
</style>
</head>

<body>
<div id="header">
   <div id="logo"><h1><a href="#" title="#"> </a></h1></div>
</div>

<div id="main">
  <h2 class="top_title"><a href="http://www.helloweba.com/view-blog-171.html"> </a></h2>
  <div class="demo">
      <form id="addform" action="do.php?action=import" method="post" enctype="multipart/form-data">
         <p>请选择要导入的CSV文件：<br/><input type="file" name="file"> <input type="submit" class="btn" value="导入CSV">
         <input type="button" class="btn" id="exportCSV" value="导出CSV" onClick="window.location.href='do.php?action=export'"></p>
      </form>
  </div>
</div>
<div id="footer">
    <p><a href="http://www.helloweba.com"></a></p>
</div>
<p id="stat"><script type="text/javascript" src="http://js.tongji.linezing.com/1870888/tongji.js"></script></p>
</body>
</html>