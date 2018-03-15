<?php 
if(isset($_POST["submit"]) && $_POST["submit"] == "登陆") 
{ 
    $name = $_POST["username"]; //获取表单数据
    $psw = $_POST["password"]; 
    if($name == "" || $psw == "") //判断是否为空
    { 
        echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>"; 
    } 
    else 
    { 
        $link = mysqli_connect("127.0.0.1", "root", "123456", "crdb"); //连接数据库
        mysqli_query($link,"set names utf8"); 
        $pwd = md5($psw);
        $sql = "select user_id,pwd from usertb where user_id = '$name' and pwd  = '$pwd'"; 
        $result = mysqli_query($link,$sql); 
        $num = mysqli_num_rows($result); 
        if($num) 
        { 
                $row = mysqli_fetch_array($result);  //将数据以索引方式储存在数组中 
                header("Location:chat.jsp?id=+'$row[0]'");
                mysqli_close($link); 
        } 
       else 
        { 
            echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>"; 
        }
    }  
} 
else 
{ 
    echo "<script>alert('提交未成功！'); history.go(-1);</script>"; 
} 

?>