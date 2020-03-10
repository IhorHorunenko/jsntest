<?php 
	if(isset($_POST['img'])){
		save_heros();
		
	}
	function save_heros() {
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
		$img = $_POST['img'];
		$id = $_POST['id'];
		if(!empty($nickname)&&!empty($real_name)&&!empty($origin_description)&&!empty($superpowers)&&!empty($catch_phrase)&&!empty($_POST['img'])){
				$pdo->query("UPDATE superhero SET nickname='".$nickname."', real_name='".$real_name."', origin_description='".$origin_description."', superpowers='".$superpowers."', catch_phrase='".$catch_phrase."', images='".$_POST['img']."' WHERE id='".$id."'");
				header('location: https://leaderingold.com/');
		}
	}
?>