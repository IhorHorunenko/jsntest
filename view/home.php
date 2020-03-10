	<script>
	</script>
	<?php 
		if(!isset($_GET['type'])){
	?>
	<div id="form_addHeros">
		<div class="forms">
			<form enctype="multipart/form-data" action="home?type=add_heros" method="POST">
				<table>
					<tr>
						<td height="200px">
							<input type="file" id="upload" class="inputfile" accept=".jpg, .jpeg, .png" name="addImg" hidden="hidden" />
							<label for="upload"><img src="../images/ico_download.png" width="50px" height="50px"><br>Загрузить изображение</label>
							<br>
							<span>Раcширение: .jpg .jpeg .png</span>
						</td>
					</tr>
					<tr>
						<td>
							<div id="upload_img" style="display: block;">
								
							</div>
						</td>
					</tr>
				</table>
				<input class="mb-2 col-12" type="text" name="nickname" placeholder="Nickname">
				<input class="mb-2 col-12" type="text" name="real_name" placeholder="Real name">
				<textarea class="mb-2 col-12" name="origin_description" placeholder="Origin description"></textarea>
				<input class="mb-2 col-12" type="text" name="superpowers" placeholder="Superpowers">
				<input class="mb-2 col-12" type="text" name="catch_phrase" placeholder="Catch phrase">
				<div class="alert"></div>
				<input class="btn btn-light" type="submit" name="add_heros" value="Добавить">
			</form>
		</div>
		<button class="a_button">Добавить<br><i class="fas fa-sort-down"></i></button>
	</div>
	
	<?php
	}
		if(isset($_GET['type'])){
			require_once 'function/type.php';
		} else {
			require_once 'model/viewHeros.php'; 
		}
	?>