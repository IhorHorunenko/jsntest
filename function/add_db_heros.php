<?php 
	if(isset($_POST['img'])){
		add_heros();
		
	}
	// if(isset($_GET['type'])){
	// 	$f = $_GET['type'];
	// 	$f();
	// }
	function add_heros() {
		$server = 'localhost';
		$name = 'backster';
		$pass = '19972507b';

		$dsn = 'mysql: host='.$server.'; dbname=leaderingold; charset=utf8;';
		$pdo = new PDO($dsn, $name, $pass);
		$nickname = $_POST['nickname'];
		$real_name = $_POST['real_name'];
		$origin_description = $_POST['origin_description'];
		$superpowers = $_POST['superpowers'];
		$catch_phrase = $_POST['catch_phrase'];
		if(!empty($nickname)&&!empty($real_name)&&!empty($origin_description)&&!empty($superpowers)&&!empty($catch_phrase)&&!empty($_POST['img'])){
				$pdo->query("INSERT superhero(nickname, real_name, origin_description, superpowers, catch_phrase, images) VALUES('".$nickname."', '".$real_name."', '".$origin_description."', '".$superpowers."', '".$catch_phrase."', '".$_POST['img']."')");
				echo "Добавлено";
		}
	}
?>