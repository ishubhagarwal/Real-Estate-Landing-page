$(document).ready(function(){
    $("form#myform-mobile").submit(function(event) {
        event.preventDefault();
       
        var name = $("#name-mobile").val();

       
        var email = $("#email-mobile").val(); 
        
       
        var phone = $("#phone-mobile").val();


        $.ajax({
            type: "POST",
            url: "insertdata.php",
            data: {
					user_name: name,
					user_email: email,
					user_phone: phone
				},
            success: function(html){

            		$('#success_para-mobile').html(html);
            		document.getElementById("myform-mobile").reset();
            }
        });
    });

    $("form#myform").submit(function(event) {
        event.preventDefault();
       
        var name = $("#name").val();

       
        var email = $("#email").val(); 
        
       
        var phone = $("#phone").val();
;

        $.ajax({
            type: "POST",
            url: "insertdata.php",
            data: {
					user_name: name,
					user_email: email,
					user_phone: phone
				},
            success: function(html){

            		$('#success_para').html(html);
            		document.getElementById("myform").reset();
            }
        });
    });
});