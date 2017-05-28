// JavaScript Document
$(document).ready(function()
{
	// Seller add service code start
    $('#addpackagecustomForm').on('submit', function(e)
    {
    e.preventDefault();
    $("#addpackageoutput").html('<img src="images/ajax-loader.gif" alt="Please Wait"/> <span>Saving...Please Wait</span>');
	$(this).ajaxSubmit({
	target: '#addpackageoutput',
	success:  afterSuccessaddservice //call function after success
	});
    });
	// Seller add service code end
	// Customer login code start
	$("#send").click(function() {
	$("#loginmessage").html('Authenticating... Please wait.');
		var action = $("#slick-login").attr('action');
		var form_data = {
			username: $("#username").val(),
			password: $("#password").val(),
			usertype: $("#usertype").val(),
			returnpage: $("#returnpage").val(),
			is_ajax: 1
		};
		$.ajax({
			type: "POST",
			url: action,
			data: form_data,
			success: function(response)
			{
				if(response == 'success')
					 {
						window.location.href=document.getElementById("returnpage").value;	
					}
				else
					$("#loginmessage").html("Invalid username or password!");	
			}
		});
		return false;
	});
	//Customer login code end
	//Customer signup code start
	$('#customForm').on('submit', function(e)
    {
        e.preventDefault();
        $("#signupmessage").html('<img src="images/ajax-loader.gif" alt="Please Wait"/> <span>Saving...Please Wait</span>');
		$(this).ajaxSubmit({
 		target: '#signupmessage',
        success:  afterSuccess //call function after success
        });
    });
	//Customer signup code end
	// Seller signup code start
	 $('#businesscustomForm').on('submit', function(e)
	{
        e.preventDefault();
        $("#businessmessage").html('<img src="images/ajax-loader.gif" alt="Please Wait"/> <span>Saving...Please Wait</span>');
        $(this).ajaxSubmit({
        target: '#businessmessage',
        success:  businessafterSuccess //call function after success
        });
    });
	 // Seller signup code end
	 // Seller login code start
	$("#Sellersend").click(function() {
	$("#Sellerloginmessage").html('Authenticating... Please wait.');
		var action = $("#Sellerslick-login").attr('action');
		var form_data = {
			username: $("#Sellerusername").val(),
			password: $("#Sellerpassword").val(),
			usertype: $("#Sellerusertype").val(),
			is_ajax: 1
		};
		$.ajax({
			type: "POST",
			url: action,
			data: form_data,
			success: function(response)
			{
				if(response == 'success')
					 {
						window.location.href='Sellerhome.php';
						}
				else
					$("#Sellerloginmessage").html("Invalid username or password!");	
			}
		});
		return false;
	});
	//seller login code end
		


});

 

function afterSuccessaddservice(value)
{
if(value == "Saved!")
{
//$("#addpackagecustomForm").resetForm();
document.getElementById("addpackagecustomForm").reset();

//$("#addpackagecustomForm").trigger('reset'); //jquery
//document.getElementById("#addpackagecustomForm").reset(); //native JS
//$("#addpackagecustomForm").get().reset();
//document.location.reload();
}
}
//function for signup code success start
function afterSuccess(value)
{
if(value == "Thanks for registering with us. Please check your email inbox or spambox to activate your account with us!")
{
//$('#customForm').resetForm();
document.getElementById("customForm").reset();
}
}
//function for signup code success end
function businessafterSuccess(value)
{
if(value == "Thanks for registering with us. Please check your email inbox or spambox to activate your account with us!")
{
//$('#businesscustomForm').resetForm();
document.getElementById("businesscustomForm").reset();
}
}

