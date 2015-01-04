<?php
session_start();
session_destroy();
?>
<html>
<head>
<title>Welcome to ForinChina</title>
<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>

 <!--div header-->
 <div id="header">
  <?php include "includes/head.php" ?>
 </div>

 <!--div slide-->
 <div id="indexImg">
 sdf
 </div>
 
<!--div login-->
 <div id="loginBlk">
  <div id="login">
   <form onsubmit="return checkForm();" name="loginForm" id="loginForm" action="personalPage.php">
   <div class="logInput"><label id="loginTitle">login</label></div>
   <div class="logInput"><label>username:</label><input class="loginp" type="text" name="userName" id="userName"></div>
   <div class="logInput"><label>password:</label><input class="loginp" type="password" name="passWord" id="passWord"></div>
   <div class="logInput"><label>verifycd:</label><input class="loginp" type="text" name="verifyCode" id="verifyCode"></div>   
   <div class="logInput"><img src="includes/captcha.php" align="absbottom" onclick="this.src='includes/captcha.php?'"></img></div>
   <div class="logInput"><Label id="errPan"></Label></div>
   <div class="logInput"><input type="submit" name="submit" value="submit"></div>
   </form>
  </div>
 </div>
</body>
</html>

<!--javascript-->
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
 function checkForm(){
  $(document).ready(function(){
      $.post("chkLogForm.php",
      {userName:encodeURI($("#userName").val()),
       passWord:encodeURI($("#passWord").val()),
       verifyCode:encodeURI($("#verifyCode").val())
      },
      function(data){
        $("#errPan").empty().html(data);
      })
   })
   return false;
 }
</script>

