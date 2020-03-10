<?php 
	$img = explode(',', $res[0]['images']);
	$res = $res[0];
?>
<div>
	<div class="container">
		<div style="display: flex; justify-content: center;">
			<?php 
			$count_img = 0;
				foreach($img as $src){
					$count_img ++;
					?>
					<img width="auto" style="max-width: 300px;" height="250px" src="<?=$src?>">
					<?php
					if($count_img>=4){
						?>
						</div>
						<div style="display: flex; justify-content: center;">
						<?php
						$count_img = 0;
					}
				}
			?>
		</div>
		<div>
			<a href="/"><i class="fas fa-caret-left"></i> Назад</a>
			<h3>nickname</h3>
			<h4><?=$res['nickname']?></h4>
			<h3>real_name</h3>
			<p><?=$res['real_name']?></p>
			<h3>origin_description</h3>
			<p><?=$res['origin_description']?></p>
			<h3>superpowers</h3>
			<p><?=$res['superpowers']?></p>
			<h3>catch_phrase</h3>
			<p><?=$res['catch_phrase']?></p>
		</div>
	</div>
</div>