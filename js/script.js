$alert = '';
$standart_body = 0;
$height_forms=0;
$(document).ready(function(){
	$height_forms = $('.forms').height()+21-(($('.forms').height()+21)*2);
	$('.forms').css("margin-top",$height_forms);
	$height_body = $(document).height();
	$standart_body = $height_body;
	$('body').css("height", $height_body);
	$('.alert').hide();
	$('.menu_heros_info').hide();
});
setInterval(function(){
	if($('.a_button').attr('class')=='a_button'){
		$height_forms = $('.forms').height()+21-(($('.forms').height()+21)*2);;
		$('.forms').css("margin-top",$height_forms);
		// $(window).scrollTop(0);
		$('body').css("height", $standart_body);
	}
	$('.heros_info').hover(function(){
		$(this).children('.menu_heros_info').show();
	}, function(){
		$(this).children('.menu_heros_info').hide();
	});
},100);
$('body').click(function(){
	if($('.a_button').attr('class')=='a_button active'){
		$height_forms = $('.forms').height()+21-(($('.forms').height()+21)*2);
		$('.a_button').attr('class', 'a_button');
		$('.forms').animate({
			marginTop: $height_forms
		},500);
		$('.forms').css("margin-bottom",-4);
		$('.a_button').show();
	} else {
		$('.a_button').attr('class', 'a_button active');
	}
}).on('click','.a_button', function(e){
	e.stopPropagation();
	e.preventDefault();
	if($('.a_button').attr('class')!=='a_button active'){
		$('.a_button').attr('class', 'a_button active');
		$('.forms').animate({
			marginTop: 0,
		},500);
		$('.forms').css("margin-bottom",-4);
		$('.a_button').hide();
	} else {
		$height_forms = $('.forms').height()+21-(($('.forms').height()+21)*2);
		$('.a_button').attr('class', 'a_button');
		$('.forms').animate({
			marginTop: $height_forms
		},500);
		$('.forms').css("margin-bottom",-4);
	}
}).on('click','.forms', function(e){
	e.stopPropagation();
}).on('click','.del_img', function(e){
	e.stopPropagation();
});
$count_img = 0;
$('#upload').change(function(){
	$file_data = $('#upload').prop('files')[0];
	$form_data = new FormData();
	$form_data.append('file', $file_data);
	$.ajax({
    	url: 'function/save_img.php',
		dataType: 'text',
		cache: false,
		contentType: false,
		processData: false,
		data: $form_data,
		type: 'post',
		success: function(data){
			$('#upload_img').append('<div class="block_heros"><img class="img_heros" src="'+data+'" style="max-width:80%; height:auto;"><a href="#" class="del_img"><i class="fas fa-times-circle"></i></a></div>');
		}
	});
})
$img = [];
$(window).hover(function(){
	$height_body = $(document).height();
	$('body').css("height", $height_body);
	$count_img = $('.block_heros').length;
	$('.del_img').click(function(e){
		e.preventDefault();
		$(this).parent('.block_heros').remove();
		$('.a_button').attr('class', 'a_button del');
	});
	
});
$('input[name="add_heros"]').click(function(e){
	e.preventDefault();
	$nickname = $('input[name="nickname"]').val();
	$real_name = $('input[name="real_name"]').val();
	$origin_description = $('textarea[name="origin_description"]').val();
	$superpowers = $('input[name="superpowers"]').val();
	$catch_phrase = $('input[name="catch_phrase"]').val();
	$('.img_heros').each(function(){
		if($img.length==0){
			$img += $(this).attr('src');
		} else {
			$img += ','+$(this).attr('src');
		}
	})
	$.ajax({
		url: 'function/add_db_heros.php',
		type: 'post',
		data: ({
			img: $img,
			nickname: $nickname,
			real_name: $real_name,
			origin_description: $origin_description,
			superpowers: $superpowers,
			catch_phrase: $catch_phrase
		}),
		success: function(data){
			if(data.length!=0){
				$('.alert').show();
				$('.alert').html('<p class="alert alert-success">Успешно добавлено!</p>');
				setTimeout(function(){
					$('input[name="nickname"]').val('');
					$('input[name="real_name"]').val('');
					$('textarea[name="origin_description"]').val('');
					$('input[name="superpowers"]').val('');
					$('input[name="catch_phrase"]').val('');
					location.reload();
				},1000)
			} else {
				$('.alert').show();
				$('.alert').html('<p class="alert alert-danger">Ошибка!</p>');
				$img = '';
			}
		}
	});
});
$('input[name="save_heros"]').click(function(e){
	e.preventDefault();
	$id = $('input[name="id"]').val();
	$nickname = $('input[name="nickname"]').val();
	$real_name = $('input[name="real_name"]').val();
	$origin_description = $('textarea[name="origin_description"]').val();
	$superpowers = $('input[name="superpowers"]').val();
	$catch_phrase = $('input[name="catch_phrase"]').val();
	$('.img_heros').each(function(){
		if($img.length==0){
			$img += $(this).attr('src');
		} else {
			$img += ','+$(this).attr('src');
		}
	})
	$.ajax({
		url: 'function/save_db_heros.php',
		type: 'post',
		data: ({
			img: $img,
			nickname: $nickname,
			real_name: $real_name,
			origin_description: $origin_description,
			superpowers: $superpowers,
			catch_phrase: $catch_phrase,
			id: $id
		}),
		success: function(data){
			if(data.length!=0){
				$('.alert').show();
				$('.alert').html('<p class="alert alert-success">Измененно!</p>');
				setTimeout(function(){
					$('input[name="nickname"]').val('');
					$('input[name="real_name"]').val('');
					$('textarea[name="origin_description"]').val('');
					$('input[name="superpowers"]').val('');
					$('input[name="catch_phrase"]').val('');
					$(location).attr('href', 'https://leaderingold.com/');
				},1000)
			} else {
				$('.alert').show();
				$('.alert').html('<p class="alert alert-danger">Ошибка!</p>');
				$img = '';
			}
		}
	});
});
$('.heros_info').hover(function(){
	$(this).children('.menu_heros_info').show();
}, function(){
	$(this).children('.menu_heros_info').hide();
});