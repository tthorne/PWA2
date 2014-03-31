/*  
	Your Project Title
	Author: You
*/

(function($){

	/* ======================= Login ======================= */

	$('#signinButton').click(function(){
		var user = $('#user').val();
		var pass = $('#pass').val();
		console.log("This notifies you if the password is working");
		$.ajax({
			url:'xhr/login.php',
			type: 'post',
			dataType: 'json',
			data: {
				username: user,
				password: pass
			},
			success:function(response){
				console.log("Test User");
				if(response.error){
					alert(response.error);
				}else{
					window.location.assign('dashboard.php')
				};
			}
		});
	});
		
	
	/* ======================= Register ======================= */	
	$('#signUp').on('click', function(){
		var firstname= $('#first').val(),
			lastname= $('#last').val(),
			username= $('#userName').val(),
			email= $('#email').val(),
			stable= $('#stable').val(),
			city= $('#city').val(),
			state= $('#state').val(),
			phone= $('#phone').val(),
			zipcode= $('#zipcode').val(),
			password = $('#password').val();
			console.log(firstname+' '+lastname+' '+username+' '+email+' '+password);

		$.ajax({
			url:'xhr/register.php', 
			type: 'post',
			dataType: 'json',
			data: {
				firstname: firstname,
				lastname: lastname,
				username: username,
				email: email,
				password: password,
				stable: stable,
				phone: phone,
				city: city,
				state: state,
				zipcode: zipcode	
			},

			success: function(response){
				if (response.error){
					alert(response.error);	
				}else{
					window.location.assign('index.html');
				}	
			}	
		});
	});

/* ======================= View Project ======================= */
	
			
	
/* ======================= New Boarder ======================= */	
	$('#boarder').on('click', function(e) {
		e.preventDefault();
		var projName = $('#projName').val(),
		projDesc = $('#projDesc').val(), 
		projDue = $('#projDue').val(), 
		projStart = $('#projStart').val(),
		status = $('#status').val();

		$.ajax({
			url: "xhr/new_boarder.php",
			type: "post",
			dataType: "json",
			data: {
				projectName: projName,
				projectDescription: projDesc,
				dueDate: projDue,
				startDate: projStart,
				status: status
			},
			success: function(response) {
				console.log('Testing for success');

				if(response.error) {
					alert(response.error);
				} else {
					window.location.assign("boarders.php");
				};
			}
		});
	});
	
	/* ======================= New Feed Records ======================= */	
		$('#feed').on('click', function(e) {
			e.preventDefault();
			var projName = $('#projName').val(), 
			quantity = $('#quantity').val(), 
			status = $('#status').val();

			$.ajax({
				url: "xhr/new_feed.php",
				type: "post",
				dataType: "json",
				data: {
					projectName: projName,
					quantity: quantity,
					status: status
				},
				success: function(response) {
					console.log('Testing for success');

					if(response.error) {
						alert(response.error);
					} else {
						window.location.assign("feed.php");
					};
				}
			});
		});
		
		/* ======================= Training Session ======================= */	
			$('#training').on('click', function(e) {
				e.preventDefault();
				var last = $('#last').val(), 
				next = $('#next').val(), 
				session = $('#session').val(), 
				workon = $('#workon').val(), 
				horseid = $('#horseid').val();

				$.ajax({
					url: "xhr/new_trainingsession.php",
					type: "post",
					dataType: "json",
					data: {
						last: last,
						next: next,
						session: session,
						workon: workon,
						horseid: horseid
					},
					success: function(response) {
						console.log('Testing for success');

						if(response.error) {
							alert(response.error);
						} else {
							window.location.assign("training.php");
						};
					}
				});
			});


	
 // ************** Add Horse ****************
		
		
	$('#addhorse').on('click', function(e) {
		e.preventDefault();
		var name = $('#name').val(),
		yob = $('#yob').val(),
		breed = $('#breed').val(), 
		gender = $('#gender').val(),
		owner = $('#owner').val();
				
		$.ajax({
			url: "xhr/new_horse.php",
			type: "post",
			dataType: "json",
			data: {
				name: name,
				yob: yob,
				gender: gender,
				breed: breed,
				owner: owner
			},
			success: function(response) {
				console.log('Testing for success');

				if(response.error) {
					alert(response.error);
				} else {
					window.location.assign("view_boarder.php?id=$owner");
				};
			}
		});
	});
	
     // ---------- Delete Buttons ----------------
                        $('.deletebtn').each(function(i){
                            $(this).attr('id', projectList[i].id);
                        }).on('click', function(){
                            var idd = Number($(this).attr('id'));
                            $.ajax({
                                url: 'xhr/delete_project.php',
                                data: {
                                    projectID: idd
                                },
                                type: 'post',
                                dataType: 'json',
                                success: function(response){
                                    if(response.error){
                                        console.log(response.error)
                                    }else{
                                        window.location.assign('projects.html');
                                    }
                                }
                            });
                        }); // ------- end delete buttons ------
						
/* ======================= Logout ======================= */
	
	$('#logOut').click(function(e){
		e.preventDefault;
		$.get('xhr/logout.php', function(){
			window.location.assign('index.html')
		})
	});
	
})(jQuery) 
	