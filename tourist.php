<?php
if(isset($_POST["submit"]) && $_POST["submit"] == "发送"){
	$message = $_POST["message"];
	$ipAddress =$_POST["ipAddress"];
	if($message == ""){
		echo "<script>alert('输入不能为空！');</script>"; 
	}
	else 
	{ 
		$link = mysqli_connect("127.0.0.1", "root", "123456", "crdb"); //连接数据库
		mysqli_query($link,"set names utf8");
		$sqlin = "INSERT INTO `crdb`.`public_mes`(`sender`,`sendtime`,`message`)VALUES('$ipAddress',now(),'$message');";
		$result = mysqli_query($link,$sqlin);
		if($result){
			mysqli_close($link);
		}
	}
}
?>
<html>
<head>
	<meta http-equiv="refresh" content="5">
	<title>游客</title>
	<style type="text/css">
	a{
		text-decoration:none;
		color: #808080;
		padding-left: 8px;
		padding-right: 8px;  	
	}
	html body{
		min-height: 100%;
		min-width: 100%
		padding: 100px;
		border: none;
		align-self: center;
		background-image: url("images/touristbg.jpg");
		overflow: hidden;
	}
	.main{
		width: 600px;
		height: 640px;
		margin: auto;
		margin-top:100px;
	}
	.main form{
		margin-top: 20px;
	}
	.message{
		width: 600px;
		height: 600px;
		border: 1px solid black;
		background: rgba(0,0,0,0.1);
		overflow: auto;
	}
	.w512{
		width: 512px;
	}
	.w80{
		width: 80px;
	}
	.h40{
		height: 40px;
	}
	.btn{
		background: #396AFF;
		color: white;
	}
	.bdn{
		border: none;
	}
	.nbg{
		background: rgba(0,0,0,0);
	}
	#footer{
		position: absolute;
		bottom: 0px;
		margin-top: -24px;          				/*使footer上浮24px*/
		margin-left: -16px;
		height: 24px;
		width: 100%;
		font-size: 12px;
		text-align: right;
		color: #808080;
		padding-bottom: 15px;
	}
</style>
</head>
<body>
	<object classid="CLSID:76A64158-CB41-11D1-8B02-00600806D9B6" id="locator" style="display:none;visibility:hidden"></object>
	<object classid="CLSID:75718C9A-F029-11d1-A1AC-00C04FB6C223" id="foo" style="display:none;visibility:hidden"></object>
	<div class="main" id="main">
		<div class="message" id="content">
			<?php
			$link = mysqli_connect("127.0.0.1", "root", "123456", "crdb"); //连接数据库
			mysqli_query($link,"set names utf8");
			$sql = "select sender,sendtime,message from public_mes;";
			$result = mysqli_query($link,$sql); 
			while($row = mysqli_fetch_array($result)){
				echo $row[0];
				echo "&nbsp&nbsp&nbsp&nbsp";
				echo $row[1];
				echo "<br/>";
				echo $row[2];
				echo "<br/><br/>";
			}
			mysqli_close($link);
			?>
		</div>
		<form name="myform" method="POST">
			您好，尊敬的游客<input class="bdn nbg" type="text" name="ipAddress">
			<BR>欢迎来到MINchatRoom！
			<input class="w512 h40" type="text" id="message" name="message" maxlength="200">
			<input class="w80 btn bdn h40" type="submit" ons="add()" name="submit"value="发送">
		</form>
	</div>
	<div id="footer">
		|<a href="login.html">返 回 登 陆</a>|<a href="register.html">注 册 新 用 户</a>|<a href="aboutme.html">关 于 我 们</a>|<a href="">意 见 反 馈</a>
	</div>
</body>
</html>
<script type="text/javascript">
	function add() {
		var div = document.getElementById('content');
		div.scrollTop = div.scrollHeight; 
	}
	window.onload = add();
</script>
<script language="javascript">
	var sIPAddr="";
	var service = locator.ConnectServer();
	service.Security_.ImpersonationLevel=3;
	service.InstancesOfAsync(foo, 'Win32_NetworkAdapterConfiguration');
</script>
<script FOR="foo" EVENT="OnObjectReady(objObject,objAsyncContext)" LANGUAGE="JScript">
	if(objObject.IPEnabled != null && objObject.IPEnabled != "undefined" && objObject.IPEnabled == true){
		if(objObject.IPEnabled && objObject.IPAddress(0) !=null && objObject.IPAddress(0) != "undefined")
			sIPAddr = objObject.IPAddress(0);
	}
</script>
<script FOR="foo" EVENT="OnCompleted(hResult,pErrorObject, pAsyncContext)" LANGUAGE="JScript">
	myform.ipAddress.value=sIPAddr;
</script>