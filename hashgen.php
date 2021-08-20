<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>hashgen</title>
	<style>
	body {
		font-family: Verdana, sans-serif;
		max-width: 50rem;
		padding: 2rem;
		margin: auto;
		font-size: 1rem !important;
	}
	code, pre {
		font-family: monospace;
		background-color: #E6E6E6;
	}
	</style>
	<noscript>
		<style>
		yes-script {
			display: none !important;
		}
		</style>
	</noscript>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
	<meta name="robots" content="noindex,nofollow">
</head>
<body>

<h3>Hash Generator</h3>
<h4>@aaviator42</h4>
<?php
if(!isset($_POST["password"])){
	formPrint();
} else {
	$hashedPassword = password_hash($_POST["password"], PASSWORD_BCRYPT);
	?>
<br>Your password is:
<br>
<textarea disabled rows=2 style="width: 24em" id="passwordtext">
<?php echo htmlspecialchars($_POST["password"]); ?></textarea>
<br>
<br>Your hashed password is:
<br>
<textarea disabled rows=2 style="width: 24em" id="hashtext">
<?php echo trim($hashedPassword); ?></textarea>

<br>
<yes-script><button onclick="copyHash()">Copy hash</button></yes-script>
<br>
<br>Hashed with <code>PASSWORD_BCRYPT</code>.
<br>
<br>Click <a href="">here</a> to hash another password.


<script>
 function copyHash() {
  var copyText = document.getElementById("hashtext");
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */
  navigator.clipboard.writeText(copyText.value.trim());
  alert("Hash copied to clipboard!");
} 
</script>
	<?php
}
function formPrint(){
	?>
<br>Please enter the password that you would like to hash using PHP's <code>password_hash()</code> with <code>PASSWORD_BCRYPT</code>:
<br><br>
  <form action="#" method="post">
	Password: <input type="password" name="password" required> 
  <input type="submit" value="Hash!" />
</form>
<?php
}
?>


<br><br>
<hr><small><b><a href="https://github.com/aaviator42/hashgen">Help/Source</a></b></small>
</body>
</html>
