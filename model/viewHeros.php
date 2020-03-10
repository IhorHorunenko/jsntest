<?php 
	$size = 5;
	if(!isset($_GET['page'])){
		$min = 0;
		$view = 1;
	} else {
		$view = $_GET['page'];
		$min = ($view*5)-5;
	}
	$info_page = $pdo->query("SELECT id, images, nickname FROM superhero");
	$count = $info_page->fetchAll(PDO::FETCH_ASSOC);
	$infoHeros = $pdo->query("SELECT id, images, nickname FROM superhero LIMIT ".$min.", 5");
	$hero = $infoHeros->fetchAll(PDO::FETCH_ASSOC);
	if(empty($hero)){
		?>
		<div class="alert-light col-8" style="margin: 0 auto; text-align: center; top: 100px;" role="alert">
			Список пуст!
		</div>
		<?php
	} else {
		echo "<div class='container'><div class='row'>";
		foreach($hero as $v_heros) {
			?>
				<div class="heros_info col-2">
					<?php 
						$img = explode(',', $v_heros['images']);
					?>
					<img src="<?=$img[0]?>" max-height="200px">
					<h5><?=$v_heros['nickname']?></h5>
					<div class="menu_heros_info">
						<a href="home?type=read&id=<?=$v_heros['id']?>" class="read"><i class="fas fa-globe"></i> перейти</a>
						<a href="home?type=edit&id=<?=$v_heros['id']?>" class="edit"><i class="far fa-edit"></i></a>
						<a href="home?type=dell&id=<?=$v_heros['id']?>" class="dell"><i class="far fa-trash-alt"></i></a>
					</div>
				</div>
			<?php
		}
		echo "</div>";
		if(count($count)>5){
			$page = count($count)/$size;
			?>
			<nav aria-label="Page navigation example" style="display: flex; margin-top: 25px;">
  			<ul class="pagination" style="margin: 0 auto;">
			<?php
			for($i=0;$i<$page;$i++){
				?>
					<li class="page-item"><a class="page-link" href="home?page=<?=($i+1)?>"><?=($i+1)?></a></li>
				<?php
			}
			?>
			</ul>
			</nav>
			<?php
		}
		echo "</div>";
	}
 ?>