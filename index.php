<?php
OB_START();
session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['name'])){
    header("Location:login.html");
    exit();
}
?>   
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="image/xia.ico"/>
<link rel="bookmark" href="image/xia.ico"/>
<meta charset="UTF-8">
<title>报餐宝</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://ququplay.github.io/jquery-mobile-flat-ui-theme/css/jquery.mobile.flatui.css">
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
<script language="php">
 session_start();   
 if($_SESSION['position'] != "秘书")
     echo '<script> $(document).ready(function() { $("#workMeal").hide();$("#cworkMeal").hide();});</script>';
  
 if($_SESSION['department'] == "罗定市分公司")
     echo '<script> $(document).ready(function() { $("#weekList").hide();});</script>';
 </script>
<script>
   
   
   


  

         
       
         

        $(document).ready(function() {
        
        
            var confirmStr = '';
           $("#booking").click(function () {
                     $("#reconfirm").html(""); confirmStr = ''                        
                     if ($("#lunch").attr("checked") == "checked") 
                   confirmStr = "√" + $("#lunch").next().text();  
                     if ($("#lunchpack").attr("checked") == "checked") 
                   confirmStr =confirmStr + "√" + $("#lunchpack").next().text();  
                     if ($("#lunchget").attr("checked") == "checked") 
                   confirmStr =confirmStr + "√" +$("#lunchget").next().text(); 
                     if ($("#dinner").attr("checked") == "checked") 
                   confirmStr =confirmStr + "√" + $("#dinner").next().text();                   
                     if ($("#dinnerpack").attr("checked") == "checked") 
                   confirmStr =confirmStr + "√" + $("#dinnerpack").next().text();
                     if ($("#dinnerget").attr("checked") == "checked") 
                   confirmStr =confirmStr + "√" + $("#dinnerget").next().text(); 
               
               $("#reconfirm").html(confirmStr);
            });     
         
         $("#lunchpack").change(function ()
            {
              if ($(this).attr("checked") == "checked") 

              $("#t1").html('<font size="2px" style="text-align:center" color="#cf3f3f">送餐选项为营业厅或机房同事设置，请不要随便勾选!</font>').show(300).delay(3000).hide(300); 
                
            });
            
          $("#dinnerpack").change(function ()
          {
               if ($(this).attr("checked") == "checked") 
              $("#t1").html('<font size="2px" style="text-align:center" color="#cf3f3f">送餐选项为营业厅或机房同事设置，请不要随便勾选!</font>').show(300).delay(3000).hide(300);
          });   
              
             $("#dinnerget").change(function ()
          {
               if ($(this).attr("checked") == "checked") 
              $("#t2").html('<font size="2px" style="text-align:center" color="#cf3f3f">打包选项勾选后，饭堂会在吃饭时间为您打包好饭菜!</font>').show(300).delay(3000).hide(300);
          });   
               
         
           $("#lunchget").change(function ()
          {
               if ($(this).attr("checked") == "checked") 
              $("#t2").html('<font size="2px" style="text-align:center" color="#cf3f3f">打包选项勾选后，饭堂会在吃饭时间为您打包好饭菜!</font>').show(300).delay(3000).hide(300);
          });   
            
              
                     
         function workMealcancelOnSuccess(data, status)
        {
            data = $.trim(data);
            $("#urworkmealinfo").text(data);
            
        }
  
        function workMealcancelOnError(data, status)
        {
            // handle an error
        }         
            
            $("#cancelworkmealsubmit").click(function(){
  
                var formData = $("#cancelworkmealAjaxForm").serialize();
  
                $.ajax({
                    type: "POST",
                    url: "cancelWorkMeal.php",
                    cache: false,
                    data: formData,
                    success: workMealcancelOnSuccess,
                    error: workMealcancelOnError
                });
  
                return false;
            });    
            
            
        
            
            
        function workMealOnSuccess(data, status)
        {
            data = $.trim(data);
            $("#workMealNotification").text(data);
            
        }
  
        function workMealOnError(data, status)
        {
            // handle an error
        }         
            
            $("#workmealsubmit").click(function(){
  
                var formData = $("#workMealAjaxForm").serialize();
  
                $.ajax({
                    type: "POST",
                    url: "workMeal.php",
                    cache: false,
                    data: formData,
                    success: workMealOnSuccess,
                    error: workMealOnError
                });
  
                return false;
            });    
            
            
 
        function onSuccess(data, status)
        {
            data = $.trim(data);
            $("#notification").text(data);
            
            $.mobile.changePage("#pageone",
            { transition: "flip" });
        }
  
        function onError(data, status)
        {
            // handle an error
        }         
            
            $("#submit").click(function(){
  
                var formData = $("#callAjaxForm").serialize();
  
                $.ajax({
                    type: "POST",
                    url: "post.php",
                    cache: false,
                    data: formData,
                    success: onSuccess,
                    error: onError
                });
  
                return false;
            });
            
        function modifyOnSuccess(data, status)
        {
            data = $.trim(data);
            $("#modifyNotification").text(data);

        }
  
        function modifyOnError(data, status)
        {
            // handle an error
        }        
  
            
             $("#modifysubmit").click(function(){
  
                var formData = $("#modifyAjaxForm").serialize();
  
                $.ajax({
                    type: "POST",
                    url: "modifyPwd.php",
                    cache: false,
                    data: formData,
                    success: modifyOnSuccess,
                    error: modifyOnError
                });
  
                return false;
            });
            
              function cancelOnSuccess(data, status)
        {
            data = $.trim(data);
            $("#urbookinfo").text(data);

        }
  
        function cancelOnError(data, status)
        {
            // handle an error
        }        
  
            
             $("#cancelsubmit").click(function(){
  
                var formData = $("#cancelAjaxForm").serialize();
  
                $.ajax({
                    type: "POST",
                    url: "cancel.php",
                    cache: false,
                    data: formData,
                    success: cancelOnSuccess,
                    error: cancelOnError
                });
  
                return false;
            });
        });
    </script>
    
     
</head>
<body>

<div data-role="page" id="pageone">
<div data-role="header">

 <h1>报餐宝</h1>
<a href="#rightpanel1" data-role="button" data-icon="bars" class="ui-btn-right">更多</a>
</div>

<div data-role="content" data-theme="c">

    <script language="php">
    

    $name = $_SESSION['name'];
    $department = $_SESSION['department'];

        echo '<h3 color="\#cf3f3f"\>  '.$department.'</h3><h2>☺'.$name.'</h2>';
   
</script>
    
<form method="post" action="post.php" id="callAjaxForm">

   
<div class="ui-grid-b" id="generalinfo">
<legend>请选择报餐信息：</legend>
<div class="ui-block-a">

<fieldset data-role="controlgroup">
<input type="checkbox" name="dingcan[]" id="lunch" value="1">
<label for="lunch">午餐</label>
<input type="checkbox" name="dingcan[]" id="dinner" value="3">
<label for="dinner">晚餐</label>
</fieldset>

</div>
 <div class="ui-block-b">

<fieldset data-role="controlgroup">
<input type="checkbox" name="dingcan[]" id="lunchpack" value="2">
<label for="lunchpack">送餐</label>
<input type="checkbox" name="dingcan[]" id="dinnerpack" value="4">
<label for="dinnerpack">送餐</label>    
</fieldset>


</div>
<div class="ui-block-c">

<fieldset data-role="controlgroup">

<input type="checkbox" name="dingcan[]" id="lunchget" value="5">
<label for="lunchget">打包</label>
<input type="checkbox" name="dingcan[]" id="dinnerget" value="6">
<label for="dinnerget">打包</label>
</fieldset>
</div>
</div>
    
<font size="5px" style="text-align:center" id="notification" color="#cf3f3f"></font>    
</form>
    
</div>

 <div role="main" class="ui-content">
    <a id="booking" href="#dialogPage" data-role="button" data-rel="dialog" data-transition="flip" data-theme="b">提交</a>
     


          <p id="t1"></p>
          <p id="t2"></p>
     
     <p><font size="2px" style="text-align:center" color="#cf3f3f"></font></p>
  </div>    


<!-- rightpanel1  -->
	<div data-role="panel" id="rightpanel1" data-position="right" data-display="reveal" data-theme="b">

        <h3>更多功能：</h3>
        <div data-role="controlgroup" data-type="vertical">
  <a href="#popupLogout" data-rel="popup" data-position-to="window" data-role="button" data-shadow="false" data-inline="true" data-icon="minus" data-theme="a" data-transition="pop">注销登录</a>
  <a href="#popupModifyPwd" data-rel="popup" data-position-to="window" data-role="button" data-shadow="false" data-inline="true" data-icon="gear" data-theme="a" data-transition="pop">修改密码</a>
  <a href="#popupCancel" data-rel="popup" data-position-to="window" data-role="button" data-shadow="false" data-inline="true" data-icon="delete" data-theme="a" data-transition="pop">取消报餐</a>
  <a id="workMeal" href="#popupWorkMeal" data-rel="popup" data-position-to="window" data-role="button" data-shadow="false" data-inline="true" data-icon="star" data-theme="a" data-transition="pop">报工作餐</a>
  <a id="cworkMeal" href="#popupCancelworkmeal" data-rel="popup" data-position-to="window" data-role="button" data-shadow="false" data-inline="true" data-icon="delete" data-theme="a" data-transition="pop">取消工餐</a>          
  <a href="#popupTellMe" data-rel="popup" data-position-to="window" data-role="button" data-shadow="false" data-inline="true" data-icon="forward" data-theme="a" data-transition="pop">意见反馈</a>
  <a id="weekList" href="#popupList" data-rel="popup" data-position-to="window" data-role="button" data-shadow="false" data-inline="true" data-icon="grid" data-theme="a" data-transition="pop">本周菜单</a>
  <a href="#popupHelp" data-rel="popup" data-position-to="window" data-role="button" data-shadow="false" data-inline="true" data-icon="plus" data-theme="a" data-transition="pop">添至桌面</a>         
  <a href="#popupAbout" data-rel="popup" data-position-to="window" data-role="button" data-shadow="false" data-inline="true" data-icon="info" data-theme="a" data-transition="pop">关于软件</a>
            
  </div>    

	</div><!-- /rightpanel1 -->
   
<!-- /注销 -->
    <div data-role="popup" id="popupMenu1" data-theme="a">
					<div data-role="popup" id="popupLogout" data-theme="a" class="ui-corner-all">
						<form>
							<div style="padding:10px 20px;">
                                <h3><font color="#ffffff">确定要注销您的登录信息吗？</font></h3>
                                <p></p>
					    	  <a href="#" data-role="button" data-inline="true" data-rel="back" data-shadow="false" data-theme="c">关闭</a> 
                                <a href="login.php?action=logout" data-role="button" data-shadow="false" data-inline="true" data-icon="minus" data-theme="b" data-ajax="false">我要注销</a>
							
                            </div>
						</form>
					</div>
				</div> 
<!-- /注销 --> 
<!-- /取消 -->
    <div data-role="popup" id="popupMenu2" data-theme="a">
					<div data-role="popup" id="popupCancel" data-theme="a" class="ui-corner-all">
						<form id="cancelAjaxForm">
							<div style="padding:10px 20px;">
                                <h3><font color="#ffffff">每天早上9：00前才能取消当天报餐</font></h3>
                                <p><font id="urbookinfo" color="#ffffff">这里显示你的报餐信息</font></p>
					    	  <button type="submit" id="cancelsubmit" data-theme="b" data-icon="check">取消报餐</button>
                                <a href="#" data-role="button" data-rel="back" data-theme="c">关闭</a> 
							</div>
						</form>
					</div>
				</div> 
<!-- /取消 -->
     <!-- /反馈 -->
    <div data-role="popup" id="popupMenu3" data-theme="a">
					<div data-role="popup" id="popupTellMe" data-theme="a" class="ui-corner-all">
						<form>
							<div style="padding:10px 20px;">
                                <h3><font color="#ffffff">请点我↓</font></h3>
	 				          <p><a href="mailto:gd-chenpx8@chinaunicom.cn">我要向作者吐槽！</a></p>
                                <a href="#" data-role="button" data-rel="back" data-theme="c">关闭</a> 
                              <p></p>
                             
							</div>
						</form>
					</div>
				</div> 
<!-- /反馈 -->
   <!-- /菜单 -->
    <div data-role="popup" id="popupMenu4" data-theme="a">
					<div data-role="popup" id="popupList" data-theme="a" class="ui-corner-all">
						<form>
							<div style="padding:10px 20px;">
                                <h3><font color="#ffffff"></font></h3>
                                <!--<p><font color="#ffffff">这里将会显示菜单</font></p>-->
                            <img src="image/list.jpg" alt="10月份第四周菜单" style="vertical-align:middle;" height="70%" width="100%"/>
                                  
                                <a href="#" data-role="button" data-rel="back" data-theme="c">关闭</a> 
                              <p></p>
                             
							</div>
						</form>
					</div>
				</div> 
<!-- /菜单 -->
 <!-- /关于 -->
    <div data-role="popup" id="popupMenu5" data-theme="a">
					<div data-role="popup" id="popupAbout" data-theme="a" class="ui-corner-all">
						<form>
							<div style="padding:10px 20px;">
                                <h3><font color="#ffffff">关于</font></h3>
                                <p><font color="#ffffff">云浮联通报餐宝V1.0</font></p>
                                <p><font color="#ffffff">云浮联通集团客户事业部 All Rights Reserved</font></p>
                                <p><font color="#ffffff"> ©2016 Powered By Purson</font></p>
                                <img src="/image/logo1.png" style="vertical-align:middle;" height="30%" width="95%" />
							</div>
						</form>
					</div>
				</div> 
<!-- /关于 -->
<!-- /修改密码 -->
    <div data-role="popup" id="popupMenu6" data-theme="a">
					<div data-role="popup" id="popupModifyPwd" data-theme="a" class="ui-corner-all">
						<form id="modifyAjaxForm">
							<div style="padding:10px 20px;">
                                <h3><font id="modifyNotification" color="#ffffff"></font></h3>
					          <label for="un" class="ui-hidden-accessible">原密码:</label>
					          <input type="text" name="opass" id="op" value="" placeholder="原密码..." data-theme="a" />

					          <label for="pw" class="ui-hidden-accessible">新密码:</label>
					          <input type="password" name="npass" id="npw" value="" placeholder="新密码..." data-theme="a" />
                                
                              <label for="pw" class="ui-hidden-accessible">新密码确认:</label>
					          <input type="password" name="npassr" id="npwr" value="" placeholder="重新输入新密码..." data-theme="a" />

					    	  <button type="submit" name="modifysubmit" id="modifysubmit" data-theme="b" data-icon="check">确认修改</button>
                             <a href="#" data-role="button" data-rel="back" data-theme="c">关闭</a> 
							</div>
						</form>
					</div>
				</div> 
<!-- /修改密码 -->
 <!-- /订工作餐 -->
    <div data-role="popup" id="popupMenu7" data-theme="a">
					<div data-role="popup" id="popupWorkMeal" data-theme="a" class="ui-corner-all">
						<form id="workMealAjaxForm">
							<div style="padding:10px 20px;">
                                <h3><font id="workMealNotification" color="#ffffff"></font></h3>
					          
                               <div class="ui-grid-a" id="workmealinfo">

                                   <legend><font color="#ffffff">请选择报餐信息：</font></legend>
                                   <div class="ui-block-a">
                                   <fieldset data-role="controlgroup">
                                       <label for="wlunch">午餐</label>
                                   <input type="checkbox" name="dingcan[]" id="wlunch" value="1" data-shadow="false">
                                   <input type="text" name="lunchcount" id="lunchcount" placeholder="午餐工作餐数量..." maxlength="2" data-theme="a" onkeyup="this.value=this.value.replace(/\D/g,'')"  onafterpaste="this.value=this.value.replace(/\D/g,'')"/>
                                   <input type="text" name="lunchcomments" id="lunchcomments" value="" placeholder="午餐订餐说明" data-theme="a" />
                                   </fieldset>
                                   </div>
                                   <div class="ui-block-b">
                                   <fieldset data-role="controlgroup">
                                       <label for="wdinner">晚餐</label>
                                   <input type="checkbox" name="dingcan[]" id="wdinner" value="2"  data-shadow="false">
                                   <input type="text" name="dinnercount" id="dinnercount" placeholder="晚餐工作餐数量..." maxlength="2" data-theme="a" onkeyup="this.value=this.value.replace(/\D/g,'')"  onafterpaste="this.value=this.value.replace(/\D/g,'')"/>
					               <input type="text" name="dinnercomments" id="dinnercomments" value="" placeholder="晚餐订餐说明" data-theme="a" />
                                  </fieldset>
                                  </div>                                   
                                  </div>                                                                                                 
					    	  <button type="submit" name="workmealsubmit" id="workmealsubmit" data-theme="b" data-icon="check">订餐</button>
                             <a href="#" data-role="button" data-rel="back" data-theme="c">关闭</a> 
							</div>
						</form>
					</div>
				</div> 
<!-- /订工作餐 -->
 <!-- /取消工作餐 -->
    <div data-role="popup" id="popupMenu8" data-theme="a">
					<div data-role="popup" id="popupCancelworkmeal" data-theme="a" class="ui-corner-all">
						<form id="cancelworkmealAjaxForm">
							<div style="padding:10px 20px;">
                                <h3><font color="#ffffff">每天早上9：00前才能取消当天工作餐</font></h3>
                                <p><font id="urworkmealinfo" color="#ffffff"></font></p>
					    	  <button type="submit" id="cancelworkmealsubmit" data-theme="b" data-icon="check">取消工作餐</button>
                                <a href="#" data-role="button" data-rel="back" data-theme="c">关闭</a> 
							</div>
						</form>
					</div>
				</div> 
<!-- /取消工作餐 -->
<!-- /帮助 -->
    <div data-role="popup" id="popupMenu9" data-theme="a">
					<div data-role="popup" id="popupHelp" data-theme="a" class="ui-corner-all">
						<form>
							<div style="padding:10px 20px;">
                                <h3><font color="#ffffff">操作指引↓</font></h3>
                                <p><a href="introduce.htm" target="_blank">将快捷方式添加到手机桌面</a></p>
                               <a href="#" data-role="button" data-rel="back" data-theme="c">关闭</a>                                 
							</div>
						</form>
					</div>
				</div> 
<!-- /帮助 -->
 
    
    
    
    
<div data-role="footer">
    <h3>云浮联通集团客户事业部 All Rights Reserved</h3>
</div>
    </div>
<div data-role="page" id="dialogPage">
		<div data-role="header" data-theme="g">
            <h1>报餐信息确认</h1>
		</div>
		<div data-role="content" data-theme="c">
			<div id="reconfirm"></div>
			<a href="#" id="submit" data-role="button" data-rel="back" data-theme="b">提交</a>     
			<a href="#" data-role="button" data-rel="back" data-theme="c">取消</a>    
		</div>
</div>


    
    </body>
</html>
