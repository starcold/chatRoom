<?php
if(isset($_POST["submit"]) && $_POST["submit"] == "马上注册"){
	$name = $_POST["username"]; //获取表单数据
	$nick = $_POST["nickname"];
	$psw = $_POST["password"]; 
	$email = $_POST["email"];
	$gender=$_POST["rb_Sex"];
	$age=$_POST["age"];
	switch ($_POST["area"]) {
		case '华东':
			$area = 1;
			break;
		case '华南':
			$area = 2;
			break;
		case '华北':
			$area = 3;
			break;
		case '华中':
			$area = 4;
			break;
		case '东北':
			$area = 5;
			break;
		case '西南':
			$area = 6;
			break;
		case '西北':
			$area = 7;
			break;
		
		
		default:
			break;
	}
    $link = mysqli_connect("127.0.0.1", "root", "123456", "crdb"); //连接数据库
    if($link){
    	//echo "连接成功";
		 mysqli_query($link,"set names utf8");
		 $pwd = md5($psw);//md5加密
		 $sql = "INSERT INTO `crdb`.`usertb`(`user_id`,`pwd`,`email`,`nick`,`gender`,`age`,`area`,`vip`)VALUES('$name','$pwd','$email','$nick','$gender','$age','$area',0);"; 
		 $result = mysqli_query($link,$sql);
		 if($result){
		 	mysqli_close($link);
		 	echo "<script>window.location = 'return.html'</script>";
		 }
		 else 
		{ 
			echo "<script>alert('注册失败！'); history.go(-1);</script>";
		} 
    }
} 
?>