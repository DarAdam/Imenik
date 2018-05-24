
$(document).ready(function(){

	// --------------- EDIT BUTTON ------------------------

	$("#buttonOn, .edit").click(function(e){
		if ($(this).hasClass("edit")) {
			var text_arr = [];
			$.each($(this).parents('tr').find('td'), function(key, td){
				text_arr.push($(td).text());
			});
			$.each($('.form-wrapper').find('input').not('input[type="submit"]'), function(key, value){
				$(value).val(text_arr[key]);
				//console.log(text_arr[key]);
			});
			$('input[type="submit"]').val('Izmeni');
			$('input[type="hidden"]').remove();
			$('form').prepend('<input type="hidden" name="hidden" value="' + text_arr[0] + '"></input>');

			
		}
		$("#inputDataPage, .form-wrapper").fadeIn('fast');
	});

	// ----------------------- EDIT BUTTON, FADE OUT, CLEAR CONTENT ---------------------

	$("#buttonOff, #inputDataPage").click(function(){
		$("#inputDataPage, .form-wrapper").fadeOut('fast');
		setTimeout(function(){ 
			$('input[type="submit"]').delay(100).val('Unesi');
			$('input[type="hidden"]').remove();
			$.each($('.form-wrapper').find('input').not('input[type="submit"]'), function(key, value){
					$(value).val('');
			});

		}, 500);
	});

	// -----------------------------   FILTER -----------------------------------------

	$("#filter").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#table tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

})