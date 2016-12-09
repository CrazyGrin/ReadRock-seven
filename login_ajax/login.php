<?php 
if (!empty($_POST)) {
	if (isset($_POST['username']) && $_POST['username'] != '' &&
        isset($_POST['password']) && $_POST['password'] != ''){
		$pdo = new PDO("mysql:host=localhost;dbname=login_info","admin","admin");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$username = addslashes($_POST['username']);
    	$addpsd = "woshizuibangde";
    	$password = md5(md5($_POST['password']).$addpsd);

		$req = $pdo->query("select * from user where username='{$username}'");
		$data = $req->fetch(PDO::FETCH_ASSOC);

		if ($data['password']==$password) {
			echo "登录成功";
		}
		else{
			echo "用户名或密码错误";
		};
	}
	else{
		echo "请填写账号密码";
	};
};
 ?>