	$('.btn-back').click(function(){
		let idSelector  = $(this).attr('id'); 
		let idWarrants = idSelector;
		let id = [idWarrants];

		if (idSelector == 'home') {
			$.ajax({
			url: 'tarifs_groups.php',
			success: function(data) {$('.content').html(data);}	
			});   	
		} else {
			$.ajax({
		  		type: "POST",
		  		url:  'tarifs_warrants.php',
		  		data: {idWarAndArg:JSON.stringify(id)},
		  		success: function(data) {
		  		$('.content').html(data);
		  		}
	  		}) 
		}; 
	});

