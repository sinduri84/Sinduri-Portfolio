var request;
// Sign up request using Ajax
$("#signupform").submit(function(event){
event.preventDefault();
if (request) {
  request.abort();
}
var $form = $(this);
var $inputs = $form.find("input, select, button, textarea");
var datatopost = $form.serialize();
$inputs.prop("disabled", true);

request = $.ajax({
  url: "actions/signup_a.php",
  type: "POST",
  data: datatopost
});

request.done(function(response, textStatus, jqXHR){
  if(response) {
    $("#signupmessage").html(response);
  }
});

request.fail(function(jqXHR, textStatus, errorThrown){
  $("#signupmessage").html("The following error occurred: "+ textStatus, errorThrown);
});


request.always(function () {
  $inputs.prop("disabled", false);
});

});

//Login using Ajax

$("#loginform").submit(function(event){ 

event.preventDefault();

if (request) {
	request.abort();
}

var $form = $(this);

var $inputs = $form.find("input, select, button, textarea");

var datatopost = $form.serialize();

$inputs.prop("disabled", true);

console.log(datatopost);

request = $.ajax({
	url: "actions/login_a.php",
	type: "POST",
	data: datatopost
});

request.done(function(response, textStatus, jqXHR){
	if (response) {
		window.location = "travel_blog.php";
	} else {
		$('#loginmessage').html(response);
	}
});

request.fail(function(jqXHR, textStatus, errorThrown){
	$("#loginmessage").html("The following error occurred: "+ textStatus, errorThrown);
});

request.always(function () {
	$inputs.prop("disabled", false);
});



});

// Search function
$('#search').keyup(function(e) {
    e.preventDefault();

    var search = $('#search').val();
    
    if (request) {
       request.abort();
    }    
    request = $.ajax({
        url: "actions/travel_blog_a.php",
        method: "POST",
        data: { search: search }
    });

    request.done(function(response, textStatus, jqXHR){
        if(response) {
            $("#results").html(response);
        }
    }); 

    request.fail(function(jqXHR, textStatus, errorThrown){
            $("#results").html("The following error occurred: "+ textStatus, errorThrown);
    });  
});

$('#search').ready(function() {


    var search = $('#search').val();
    // var category = $('#category').val();
    
    if (request) {
       request.abort();
    }    
    request = $.ajax({
        url: "actions/travel_blog_a.php",
        method: "POST",
        data: { search: search }
    });

    request.done(function(response, textStatus, jqXHR){
        if(response) {
            $("#results").html(response);
        }
    }); 

    request.fail(function(jqXHR, textStatus, errorThrown){
            $("#results").html("The following error occurred: "+ textStatus, errorThrown);
    });  
});