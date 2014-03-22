$(document).ready(function(){
	$('#register').on('click', function(){
		var firstname = $('#firstname').val();
		var lastname = $('#lastname').val();
		var stable = $('#stable').val();
		var city = $('#city').val();
		var state = $('#state').val();
		var zipcode = $('#zipcode').val();
		var username = $('#username').val();
		var email = $('#email').val();
		var password = $('#password').val();
		
	$.ajax({
		url: 'xhr/register.php',
		type: 'post',
		dataType: 'json',
		data: {
			firstname: firstname,
			lastname: lastname,
			stable: stable,
			city: city,
			state: state,
			zipcode: zipcode,
			username: username,
			email: email,
			password: password
		},
		
		success:function(response){
			if(response.error){
				alert(response.error);
			}else{
				window.location.assign('index.html');
			}
		}
	});
}); //end register
}); // end ready function