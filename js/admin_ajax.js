var request;

$("#insertblog").submit(function(event){
	event.preventDefault();

    if (request) {
       request.abort();
   }

   var $form = $(this);

   var $inputs = $form.find("input, select, button, textarea");

   var datatopost = $form.serialize();

   $inputs.prop("disabled", true);

	request = $.ajax({
		url: "actions/blog_insert_a.php",
		type: "POST",
		data: datatopost
    });
	
    request.done(function(response, textStatus, jqXHR){
		if(response) {
			$("#insertmessage").html(response);
			$("#insertblog")[0].reset();
		}
	});
	
    request.fail(function(jqXHR, textStatus, errorThrown){
			$("#insertmessage").html("The following error occurred: "+ textStatus, errorThrown);
	});
	

    request.always(function () {
       $inputs.prop("disabled", false);
   });

});