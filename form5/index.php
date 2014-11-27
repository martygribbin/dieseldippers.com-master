<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>HTML5 Form</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/jquery.placeholder.js"></script>
<script src="js/jquery.form.js"></script>
<link rel="stylesheet" href="css/style.css">
<script>
$(function(){
$('#contact').validate({
submitHandler: function(form) {
    $(form).ajaxSubmit({
    url: 'process.php',
    success: function() {
    $('#contact').hide();
    $('#contact-form').append("<p class='thanks'>Thanks! Your request has been sent.</p>")
    }
    });
    }
});         
});
</script>
</head>

<body>

<div id="checkpoint-form">	

<form id="checkpoint" method="post" action="">
<fieldset>	

<label for="name">Name</label>
<input type="text" name="name" placeholder="e.g. Malone Road, Belfast" title="Enter a location" class="required">

<label for="type">Checkpoint Type</label>
<input type="radio" name="type" title="Select checkpoint type" class="required">
<input type="radio" name="type" title="Select checkpoint type"  class="required">



<input type="submit" name="submit" class="button" id="submit" value="Send Message" />

</fieldset>
</form>

</div><!-- /end #contact-form -->

<script src="js/modernizr-min.js"></script>
<script>
if (!Modernizr.input.placeholder){
      $('input[placeholder], textarea[placeholder]').placeholder();
}
</script>
</body>
</html>