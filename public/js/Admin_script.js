$(document).ready(function() {
	$('[data-toggle="tooltip"]').tooltip();

	$('#ImgPrev').on('click',function(){
		$('#imgPost').click();
	});

	function displayPrevPost(e) {
	    if (e.files && e.files[0]) {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	            $('#ImgPrev').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(e.files[0]);
	    }
	}


	$('#imgPost').change(function() {
		displayPrevPost(this);
	});


	//for profile img display
		$('#pImg').on('click',function(){
			$('#imgProf').click();
		});

		function displayPrevProf(e) {
		    if (e.files && e.files[0]) {
		        var reader = new FileReader();

		        reader.onload = function (e) {
		            $('#pImg').attr('src', e.target.result);
		        }

		        reader.readAsDataURL(e.files[0]);
		    }
		}


		$('#imgProf').change(function() {
			displayPrevProf(this);
		});

});

















