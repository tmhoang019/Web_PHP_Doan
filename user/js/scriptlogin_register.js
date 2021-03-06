// JQUERY
$(function() {
	
	var images = ['../img/background.jpg', '../img/background_bundau.jpg', '../img/background1.jpg','../img/about-image.jpg'];

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
$("#loginform #userinput").keyup(function(){
	if($('#userinput').val() == "")
		$("#username-error").css("display","block");
	else
		$("#username-error").css("display","none");
})
$("#loginform #passwordinput").keyup(function(){
	if($('#passwordinput').val() == "")
		$("#password-error").css("display","block");
	else
		$("#password-error").css("display","none");
})
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
					$("#error-msg").html("????ng nh???p th??nh c??ng chuy???n h?????ng.....")
					setTimeout(
						function() 
						{
							window.location = "../index.php"
						}, 2000);
				}
				else{
					$("#error-msg").css("display","block");
					$("#error-msg").css("color","red");
					$("#error-msg").html("T??i kho???n m???t kh???u sai ho???c ???? b??? kh??a!!")
				}
			},
			dataType: 'text'
		})
	}
});


$("#reg-form #usernamereg").keyup(function(){
	if($('#usernamereg').val() == ""){
		$("#error-username").css("display","block");
		$("#error-username").css("color","red");
	}
	else
		$("#error-username").css("display","none");
})
$("#reg-form #passwordreg").keyup(function(){
	if($('#passwordreg').val() == ""){
		$("#error-password").css("display","block");
		$("#error-password").css("color","red");
		$('#error-password').html("Kh??ng b??? tr???ng");
	}
	else
		$("#error-password").css("display","none");
})
$("#reg-form #repasswordreg").keyup(function(){
	if($('#repasswordreg').val() == ""){
		$("#error-repassword").css("display","block");
		$("#error-repassword").css("color","red");
		$('#error-repassword').html("Kh??ng b??? tr???ng");
	}
	else
		$("#error-repassword").css("display","none");
})
$("#reg-form #fistnamereg").keyup(function(){
	if($('#fistnamereg').val() == ""){
		$("#error-fistname").css("display","block");
		$("#error-fistname").css("color","red");
	}
	else
		$("#error-fistname").css("display","none");
})
$("#reg-form #lastnamereg").keyup(function(){
	if($('#lastnamereg').val() == ""){
		$("#error-lastname").css("display","block");
		$("#error-lastname").css("color","red");
	}
	else
		$("#error-lastname").css("display","none");
})
$("#reg-form #addressreg").keyup(function(){
	if($('#addressreg').val() == ""){
		$("#error-address").css("display","block");
		$("#error-address").css("color","red");
	}
	else
		$("#error-address").css("display","none");
})
$("#reg-form #phonenumberreg").keyup(function(){
	if($('#phonenumberreg').val() == ""){
		$("#error-phonenumber").css("display","block");
		$("#error-phonenumber").css("color","red");
	}
	else
		$("#error-phonenumber").css("display","none");
})
$("#reg-form #birthdayreg").keyup(function(){
	if($('#birthdayreg').val() == ""){
		$("#error-birthday").css("display","block");
		$("#error-birthday").css("color","red");
	
	}
	else
		$("#error-birthday").css("display","none");
})
$(".regButton").on('click', function(){
	var flag = true;
	var usernamereg = $("#usernamereg").val();
	var passwordreg = $("#passwordreg").val();
	var repasswordreg = $("#repasswordreg").val();
	var fistnamereg = $("#fistnamereg").val();
	var lastnamereg = $("#lastnamereg").val();
	var genderreg   = $('input[name=radiogroup1]:checked', '#myform').val()
	var addressreg = $("#addressreg").val();
	var phonenumberreg = $("#phonenumberreg").val();
	var birthdayreg = $("#birthdayreg").val();
	if( usernamereg =="")
	{
		$("#error-username").css("display","block");
		$("#error-username").css("color","red");
		flag = false;
	}
	else
	{
		$("#error-username").css("display","none");
		flag = true;
	}
	if( passwordreg=="")
	{
		$("#error-password").css("display","block");
		$("#error-password").css("color","red");
		$("#error-password").html("Kh??ng b??? tr???ng!");
		flag = false;
	}
	else
	{
		flag = true;
		$("#error-password").css("display","none");
	}
	if( repasswordreg== "")
	{
		$("#error-repassword").css("display","block");
		$("#error-repassword").css("color","red");
		$("#error-repassword").html("Kh??ng b??? tr???ng!");
		flag = false;
	}
	else{
		$("#error-repassword").css("display","none");
		flag = true;
	}
	if( fistnamereg== "")
	{
		$("#error-fistname").css("display","block");
		$("#error-fistname").css("color","red");
		$("#error-fistname").html("Kh??ng b??? tr???ng!");
		flag = false;
	}
	else{
		$("#error-fistname").css("display","none");
		flag = true;
	}
	if( lastnamereg== "")
	{
		$("#error-lastname").css("display","block");
		$("#error-lastname").css("color","red");
		$("#error-lastname").html("Kh??ng b??? tr???ng!");
		flag = false;
	}
	else{
		$("#error-lastname").css("display","none");
		flag = true;
	}
	if( addressreg== "")
	{
		$("#error-address").css("display","block");
		$("#error-address").css("color","red");
		$("#error-address").html("Kh??ng b??? tr???ng!");
		flag = false;
	}
	else{
		$("#error-address").css("display","none");
		flag = true;
	}
	if( phonenumberreg== "")
	{
		$("#error-phonenumber").css("display","block");
		$("#error-phonenumber").css("color","red");
		$("#error-phonenumber").html("Kh??ng b??? tr???ng!");
		flag = false;
	}
	else{
		$("#error-phonenumber").css("display","none");
		flag = true;
	}
	if( birthdayreg== "")
	{
		$("#error-birthday").css("display","block");
		$("#error-birthday").css("color","red");
		$("#error-birthday").html("Kh??ng b??? tr???ng!");
		flag = false;
	}
	else{
		$("#error-birthday").css("display","none");
		flag = true;
	}
	if(flag)
	{
		$.ajax({
			url: '../user/registerprocess.php',
			method: "POST",
			data: {
				login: 1,
				username: usernamereg,
				password: passwordreg,
				repassword: repasswordreg,
        		fistname: fistnamereg,
				lastname: lastnamereg,
				gender: genderreg,
				address: addressreg,
				phonenumber: phonenumberreg,
				birthday: birthdayreg
			},
			success: function (response){
				if(response=="allgood"){
					$("#reg-msg").css("display","block");
					$("#reg-msg").css("color","rgb(60, 179, 113)");
					$("#reg-msg").html("????ng k?? th??nh c??ng chuy???n h?????ng.....")
					setTimeout(
						function() 
						{
							window.location = "../index.php"
						}, 2000);
				}
				else{
					if(response =="usernametaken"){
					$("#error-username").css("display","block");
					$("#error-username").css("color","red");
					$("#error-username").html("T??i kho???n b???n s??? d???ng ???? t???n t???i!!")	
					}
					if(response =="invaliduser"){
						$("#error-username").css("display","block");
						$("#error-username").css("color","red");
						$("#error-username").html("T??i kho???n kh??ng h???p l???!!")	
					}
					if(response =="passwordnotmatch"){
						$("#error-repassword").css("display","block");
						$("#error-repassword").css("color","red");
						$("#error-repassword").html("M???t kh???u nh???p l???i kh??ng tr??ng nhau!!")	
					}
					if(response =="passwordlenght"){
						$("#error-password").css("display","block");
						$("#error-password").css("color","red");
						$("#error-password").html("M???t kh???u qu?? d??i ho???c qu?? ng???n!!")	
					}
					if(response =="repasswordlenght"){
						$("#error-repassword").css("display","block");
						$("#error-repassword").css("color","red");
						$("#error-repassword").html("M???t kh???u qu?? d??i ho???c qu?? ng???n!!")	
					}
					if(response =="invalidphonenumber"){
						$("#error-phonenumber").css("display","block");
						$("#error-phonenumber").css("color","red");
						$("#error-phonenumber").html("S??? ??i???n tho???i kh??ng h???p l???!!")	
					}
					if(response =="invalidday"){
						$("#error-birthday").css("display","block");
						$("#error-birthday").css("color","red");
						$("#error-birthday").html("Ng??y sinh kh??ng h???p l???!!")	
					}
					if(response =="notgood"){
						$("#reg-msg").css("display","block");
						$("#reg-msg").css("color","red");
						$("#reg-msg").html("Sai query r???i")
					}
				}
			},
			dataType: 'text'
		})
	}
});
