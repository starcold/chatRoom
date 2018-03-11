	/*	获取id*/
	function $(id){
		return document.getElementById(id);
	} 

	/*	agree()
		只有点击了我同意的按钮，注册按钮才有效；
		*/
		function agree(){
			if($("accept").checked)
				$("register").disabled=false;
			else
				$("register").disabled='disabled';  
		}

	/*	showprotocol() 
		点击服务协议，显示服务协议；
		*/
		function showprotocol(){
			$("protocol").style.display='block';
		}

	/*	hideprotocol()
		点击我同意后隐藏服务协议；
		*/
		function hideprotocol(){
			$("protocol").style.display='none';
			$("accept").checked = true;
			$("register").disabled=false;
		}

		/*	表单检测*/
	function checkName(){  //验证username
		var check;//由于最终统一验证
		var name = $("username").value;
		var test = /^[A-Za-z0-9]+$/;
		if(name == "" || !test.test(name)){
			check = false;
			$("username").style.border = "1px solid red";
			$("username_error").style.color = "red";
		}
		else{
			check = true;
			$("username").style.border = "1px solid green";
			$("username_error").style.color = "green";
		}
		return check;
	}

	function checknick(){  //验证nickname
		var check;
		var nickname = $("nickname").value;
		if(nickname == ""){
			check = false;
			$("nickname").style.border = "1px solid red";
			$("nickname_error").style.color = "red";
		}
		else{
			check = true;
			$("nickname").style.border = "1px solid green";
			$("nickname_error").style.color = "green";
		}
		return check;
	}

	function checkpwd(){  //验证password
		var check;
		var pwd = $("password").value;
		if(pwd.length<6||pwd.length>20){
			check = false;
			$("password").style.border = "1px solid red";
			$("password_error").style.color = "red";
		}
		else{
			check = true;
			$("password").style.border = "1px solid green";
			$("password_error").style.color = "green";
		}
		return check;
	}

	function checkrepwd(){  //验证repassword
		var check;
		var pwd = $("password").value;
		var repwd =$("repassword").value;
		if(repwd！=pwd){
			check = false;
			$("repassword").style.border = "1px solid red";
			$("repassword_error").style.color = "red";
		}
		else{
			check = true;
			$("repassword").style.border = "1px solid green";
			$("repassword_error").style.color = "green";
		}
		return check;
	}

	function checkemail(){  //验证email
		var check;
		var email = $("email").value;
		var e1 = email.indexOf("@");//包含@
		var e2 = email.indexOf(".");//包含.
		if(email==""||(e1==-1||e2==-1)||e2<e1) {			
			check = false;
			$("email").style.border = "1px solid red";
			$("email_error").style.display = "block";
		}
		else{
			check = true;
			$("email").style.border = "1px solid green";
			$("email_error").style.display = "none";
		}
		return check;
	}

	function checkage(){  //验证age
		var check;
		var age = $("age").value;
		var reg= /^[1-9]\d*$|^0$/;
		if(!reg.test(age)||age==""||age<1||age>100) {			
			check = false;
			$("age").style.border = "1px solid red";
			$("age_error").style.color = "red";
		}
		else{
			check = true;
			$("age").style.border = "1px solid green";
			$("age_error").style.color = "green";$
		}
		return check;
	}

	function checkarea(){	//验证area
		var check;
		var area = $("area").value;
		if(area==""){
			check = false;
			$("area").style.border = "1px solid red";
			$("area_error").style.display = "block";
		}
		else{
			check = true;
			$("area").style.border = "1px solid green";
			$("area_error").style.display = "none";
		}
		return check;
	}


	/*表单最终验证*/
	function checkform(){
		var check = checkName() && checknick() && checkpwd() && checkut() && checkrepwd() && checkemail() && checkage() && checkarea(); 
		if(!check){
			alert("注册信息有误，请核对后重试！");
		}
		return check;
	}