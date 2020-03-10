<?php 
	$res = $res[0];
?>
<div id="edit" class="container">
	<form enctype="multipart/form-data" action="home?type=add_heros" method="POST" style="text-align: center;">
		<table style="margin: 0 auto">
			<tr>
				<td>
					<input type="file" id="upload" class="inputfile" accept=".jpg, .jpeg, .png" name="addImg" hidden="hidden" />
					<label for="upload"><img src="../images/ico_download.png" width="50px" height="50px"><br>Загрузить изображение</label>
					<br>
					<span>Раcширение: .jpg .jpeg .png</span>
				</td>
			</tr>
			<tr>
				<td>
					<div id="upload_img" style="display: block;">
						<?php 
						$images = explode(',', $res['images']);
							foreach($images as $src) {
								?>
								<div class="block_heros"><img class="img_heros" src="<?=$src?>" style="max-width:80%; height:auto;"><a href="#" class="del_img"><i class="fas fa-times-circle"></i></a></div>
								<?php
							}
						?>
					</div>
				</td>
			</tr>
		</table>
		<div style="text-align: left;">
			<a href="/"><i class="fas fa-caret-left"></i> Назад</a>
			<input type="text" name="id" hidden="" value="<?=$_GET['id']?>">
			<h3>nickname</h3>
			<input class="mb-2 col-12" type="text" name="nickname" placeholder="Nickname" value="<?=$res['nickname']?>">
			<h3>real_name</h3>
			<input class="mb-2 col-12" type="text" name="real_name" placeholder="Real name" value="<?=$res['real_name']?>">
			<h3>origin_description</h3>
			<textarea class="mb-2 col-12" name="origin_description" placeholder="Origin description"><?=$res['origin_description']?></textarea>
			<h3>superpowers</h3>
			<input class="mb-2 col-12" type="text" name="superpowers" placeholder="Superpowers" value="<?=$res['superpowers']?>">
			<h3>catch_phrase</h3>
			<input class="mb-2 col-12" type="text" name="catch_phrase" placeholder="Catch phrase" value="<?=$res['catch_phrase']?>">
			<div class="alert"></div>
			</div>
		<input class="btn btn-light" type="submit" name="save_heros" value="Сохранить">
	</form>
</div>