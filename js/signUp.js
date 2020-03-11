(function(jq) {
		
		const signIn = function() {
			
			
			
		};
		
	
		jq("#signup")
		.off("submit")
		.on("submit",function(e) {
			
			const data = $(this).serialize();
			
			e.preventDefault();
		
			jq.ajax({
				type : "POST",
				dataType : "json",
				data : data,
				url : "/Services_On_the_Go/template/generate_code.php",
				error : function(args) {
					document.write(args.responseText);
				},
				beforeSend : function() {
					
					jq(".step1").hide();
					jq(".step2").show();
					
				},
				success: function(response) {
					
					jq(".step1").show();
					jq(".step2").hide(function() {
						
						const input = prompt("Please input code");
						
					});
					
				
				}
			})
			
	
			
		});
		
		
		jq("#user_name").keyup(function() {
			
			var user_name = document.getElementById("user_name").value;
			$.post("user_check.php", {
				user: user_name
			},
			function(data, status){
				
				if(data == '<span style = "color:red">Username already exist</span>'){
					document.getElementById("register").disabled = true;
				}
				else if(data == '<span style = "color:red">Username must be minimun of 5 Characters</span>'){
					document.getElementById("register").disabled = true;
				}
				else{	
					document.getElementById("register").disabled = false;
				}
				document.getElementById("checking").innerHTML = data;
				
				}
			
			);
			
		});
		
		jq("#f_name_check").keyup(function(){
			var valid_name_f = document.getElementById("f_name_check").value;
			$.post("name_client_check.php",
			{
				fname_lname_valid: valid_name_f
			},
			function(data, status){
				if(data == '<span style = "color:red">Invalid Name!</span>'){
					document.getElementById("register").disabled = true;
				}else if(data == '<p style = "color:blue">Invalid Mobile #</p>'){
					document.getElementById("register").disabled = true;
				}else{	
					document.getElementById("register").disabled = false;
				}
				document.getElementById("name_valid_check").innerHTML = data;
				
			}
			
			);
			
		});
		
		jq("#pass_check_con").keyup(function() {
			
			var confirmInput = document.getElementById("pass_check_con").value;
			var phoneInput = document.getElementById("pass_check").value;
			var cons_message = document.getElementById("checking_phone");
			
			
			
			if(phoneInput !== confirmInput)
			{
				document.getElementById("register").disabled = true;
				cons_message.innerHTML = "Invalid";
				return;
			}
			
			cons_message.innerHTML = "";
			document.getElementById("register").disabled = false;
			
		});
		
		jq("#l_name_check").keyup(function(){
			
			var valid_name_l = document.getElementById("l_name_check").value;
			$.post("name_last_check_edit_new.php",
			{
				lname_valid: valid_name_l
			},
			function(data, status){
				if(data == '<span style = "color:red">Invalid Name</span>'){
					document.getElementById("register").disabled = true;
				}else if(data == '<span style = "color:red">Invalid Name</span>'){
					document.getElementById("register").disabled = true;
				}else{	
					document.getElementById("register").disabled = false;
				}
				document.getElementById("name_valid_check").innerHTML = data;
				
			}
			
			);
			
		});
		
	
})(jQuery);

	

