	<?php include('layouts/header.php');?>
	<header>
		<?php include('layouts/nav.php'); ?>				
	</header>

	<section  id="oxygen-carousel">
		<?php include('layouts/carousel.php'); ?>
	</section>
	<section class="hidden-sm-up" id="oxygen-carousel">
		<?php include('layouts/form-mobile.php'); ?>
	</section>
	<section id="about-oxygen">
		<?php include('layouts/about-oxygen.php'); ?>
	</section>
	<section id="services">
		<?php include('layouts/services.php'); ?>
	</section>
	<section  id="gallery">
		<?php include('layouts/gallery.php'); ?>
	</section>
	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	

	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

	<script type="text/javascript">
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
            		if(html === "success"){
            			
            			location.href = "thankyou.php?username=" + name + "&useremail=" + email + "&userphone=" + phone;
            		}else{
            			$('#success_para').html(html);
            			document.getElementById("myform").reset();
            		}	
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
            		if(html === "success"){
            			
            			location.href = "thankyou.php?username=" + name + "&useremail=" + email + "&userphone=" + phone;
            		}else{
            			$('#success_para').html(html);
            			document.getElementById("myform").reset();
            		}	

            		
            }
        });
    });
});
	</script>

</body>
</html>
