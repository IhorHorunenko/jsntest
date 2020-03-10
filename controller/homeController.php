<?php 
class homeController {
	public function index(){
		$title = 'Главная страница';
		Views::render('home', compact('title'));
	}
}
?>