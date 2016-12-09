<?php
if (!empty($_POST)) {
	if (isset($_POST['username']) && $_POST['username'] != '' &&
        isset($_POST['password']) && $_POST['password'] != ''){
		$pdo = new PDO("mysql:host=localhost;dbname=login_info","admin","admin");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$username = addslashes($_POST['username']);
    	$addpsd = "woshizuibangde";
    	$password = md5(md5($_POST['password']).$addpsd);

		$req = $pdo->query("select username from user where username='{$username}'");
		$data = $req->fetch(PDO::FETCH_NUM);

		if ($data) {
			echo "用户名已存在";
		}
		else{
			$pdo->exec("insert into user (username,password) values ('{$username}','{$password}')");
			echo "注册成功";
		};
		// for($i = 0;$i < 255;$i++){
		// 	if ($data[$i]!==$username) {
		// 		$pdo->exec("insert into user (username,password) values ('{$username}','{$password}')");
		// 		$req = $pdo->query("select username from user");
		// 		$data = $req->fetch(PDO::FETCH_NUM);
		// 		break;
		// 	}
		// 	else{
		// 		echo "用户名已存在";
		// 		break;
		// 	};
		// };


	}
	else{
		echo "请填写表单";
	};
};
?>