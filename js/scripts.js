	$('#reg').submit(function(){
			$.ajax({
				url: "regpost.php",
				type: "POST",
				dataType: "html",
				data: $("#reg").serialize(),
        
			success: function(response) {
				$('#my_message').html(response);
				setTimeout(function() {window.location.reload();}, 3000);
			},
	    	error: function(response) {
	            $('#my_message').html('Ошибка. Данные не отправлены.');
				}
			});
			return false;
	});

	$('#auth').submit(function(){
			$.ajax({
				url: "authpost.php",
				type: "POST",
				dataType: "html",
				data: $("#auth").serialize(),
        
			success: function(response) {
				$('#auth').hide('slow');
				$('#my_message').html(response);
			},
			
	    	error: function(response) {
	            $('#my_message').html('Ошибка. Данные не отправлены.');
				}
			});
			return false;
	});
		
	function reLoadDoc(){ 
        setTimeout(function() {window.location.reload();}, 2000);
    }		