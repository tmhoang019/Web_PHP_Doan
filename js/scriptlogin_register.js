// JQUERY
$(function() {
	
	var images = ['../logo/background.jpg', '../logo/background_bundau.jpg', '../logo/background1.jpg','../logo/about-image.jpg'];

   $('#container').append('<style>#container, .acceptContainer:before, #logoContainer:before {background: url(' + images[Math.floor(Math.random() * images.length)] + ') center fixed }');
	setTimeout(function() {
		$('.logoContainer').transition({scale: 1}, 700, 'ease');
		setTimeout(function() {
			$('.logoContainer .logo').addClass('loadIn');
			setTimeout(function() {
				$('.logoContainer .text').addClass('loadIn');
				setTimeout(function() {
					$('.acceptContainer').transition({height: '531.5px'});
					setTimeout(function() {
						$('.acceptContainer').addClass('loadIn');
						setTimeout(function() {
							$('.formDiv, form h1').addClass('loadIn');
						}, 500)
					}, 500)
				}, 500)
			}, 500)
		}, 1000)
	}, 10)
});

$(".acceptBtn").on('click', function(){
	var flag = true;
	var username = $("#userinput").val();
	var password = $("#passwordinput").val();
	if( username =="")
	{
		$("#username-error").css("display","block");
		flag = false;
	}
	else
	{
		$("#username-error").css("display","none");
		flag = true;
	}
	if( password=="")
	{
		$("#password-error").css("display","block");
		flag = false;
	}
	else
	{
		flag = true;
		$("#password-error").css("display","none");
	}
	if(flag)
	{
		$.ajax({
			url: '../user/process.php',
			method: "POST",
			data: {
				login: 1,
				username: username,
				password: password
			},
			success: function (response){
				var returnval = parseInt(response)
				if(returnval==0){
					$("#error-msg").css("display","block");
					$("#error-msg").css("color","rgb(60, 179, 113)");
					$("#error-msg").html("Đăng nhập thành công chuyển hướng.....")
					setTimeout(
						function() 
						{
							window.location = "../index.php"
						}, 2000);
				}
				else{
					$("#error-msg").css("display","block");
					$("#error-msg").css("color","red");
					$("#error-msg").html("Tài khoản mật khẩu sai hoặc đã bị khóa!!")
				}

			},
			dataType: 'text'


		})
	}
});