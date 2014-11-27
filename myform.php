<?php
$yourname = htmlspecialchars($_POST['yourname']);
$email    = htmlspecialchars($_POST['email']);
$likeit   = htmlspecialchars($_POST['likeit']);
$comments = htmlspecialchars($_POST['comments']);
?>

<html>
<body>

Your name is: <?php echo $yourname; ?><br />
Your e-mail: <?php echo $email; ?><br />
<br />

Do you like this website? <?php echo $likeit; ?><br />
<br />

Comments:<br />
<?php echo $comments; ?>

</body>
</html>