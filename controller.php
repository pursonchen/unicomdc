<?php
OB_START();
session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['admin'])){
    header("Location:login.html");
    exit();
}
?>   
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>报餐小助手后台</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://ququplay.github.io/jquery-mobile-flat-ui-theme/css/jquery.mobile.flatui.css">
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
<script>
   

       
  
        $(document).ready(function() {
        
         function OnSuccess(data, status)
        {
            data = $.trim(data);
            $("#information").text(data);
            
        }
  
        function OnError(data, status)
        {
            // handle an error
        }         
            
            $("#createXls").click(function(){
  
                
  
                $.ajax({
                    type: "POST",
                    url: "createXls.php",
                    cache: false,
                    
                    success: OnSuccess,
                    error: OnError
                });
  
                return false;
            }); 
            
            
            $("#sendXls").click(function(){
  
                
  
                $.ajax({
                    type: "POST",
                    url: "xlsSender.php",
                    cache: false,
                    
                    success: OnSuccess,
                    error: OnError
                });
  
                return false;
            }); 
            
            $("#saveAsXls").click(function(){
  
                
  
                $.ajax({
                    type: "POST",
                    url: "createXls.php",
                    cache: false,
                    
                    success: OnSuccess,
                    error: OnError
                });
  
                return false;
            }); 
    </script>
    </head>
<body>
    <div data-role="page" id="pageone">
<div data-role="header">

 <h1>报餐小助手后台</h1>
</div>
        <div data-role="content" data-theme="c"></div>
        <h2>反馈信息：</h2>
        <p id="information"></p>
    <div class="ui-grid-a">
        <div class="ui-block-a" >
            <button data-role="button"  id="logout" data-theme="b" data-icon="check" href="login.php?action=logout">注销登录</button>
        <button data-role="button"  id="createXls" data-theme="b" data-icon="check">生成报餐表</button>
        
        </div>
        <div class="ui-block-b">
        <button data-role="button"  id="sendXls" data-theme="b" data-icon="check">发送报餐表</button>
        <button data-role="button"  id="saveAsXls" data-theme="b" data-icon="check">导出报餐表</button>
        </div>
       
        </div>

        </div><!-- /rightpanel1 -->
    </body>
</html>

