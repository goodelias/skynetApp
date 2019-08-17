	$('.tarif').click(function(e){	
		let idSelector  = $(this).attr('id'); 
		let id = idSelector.split('-');
		let idWarrants = id['0'];
		let idArgument = id['1'];

		if (Boolean(idArgument)) {
			$.ajax({
				type: "POST",
			  	url:  'tarifs_argument.php',
			  	data: {idWarAndArg:JSON.stringify(id)},
			  	success: function(data) {
			  	$('.content').html(data);
			  	}
			})
		} else {
			$.ajax({
		  		type: "POST",
		  		url:  'tarifs_warrants.php',
		  		data: {idWarAndArg:JSON.stringify(id)},
		  		success: function(data) {
		  		$('.content').html(data);
		  		}
	  		}) 
		} 
	})
