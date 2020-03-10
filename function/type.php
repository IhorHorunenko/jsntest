<?php 

	if(isset($_GET['type'])){
		$f = $_GET['type'];
		$f();
	}
	function dell(){
		include 'libs/db_connect.php';
		$id = $_GET['id'];
		$pdo->query("DELETE FROM superhero WHERE id='".$_GET['id']."'");
		header("Location: /");
		exit;
	}
	function read(){
		include 'libs/db_connect.php';
		$id = $_GET['id'];
		$result = $pdo->query("SELECT * FROM superhero WHERE id='".$_GET['id']."'");
		$res = $result->fetchAll(PDO::FETCH_ASSOC);
		require_once 'model/viewRead.php';
	}
	function edit(){
		include 'libs/db_connect.php';
		$id = $_GET['id'];
		$result = $pdo->query("SELECT * FROM superhero WHERE id='".$_GET['id']."'");
		$res = $result->fetchAll(PDO::FETCH_ASSOC);
		require_once 'model/viewEdit.php';
	}
?>