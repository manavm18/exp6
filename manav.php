<!DOCTYPE HTML>  

<html> 

<head> 

<style> 

.error { 

color: #FF0000; 

} 

form,label{ 

text-align: center; 

font-size: larger; 

padding: 20px; 

} 

</style> 

</head> 

<body>  

 

<?php 

$nameErr = $emailErr = $passErr = ""; 

$First = $Last = $email = $country = $password = ""; 

 

if ($_SERVER["REQUEST_METHOD"] == "POST") { 

if (empty($_POST["First"])) { 

$nameErr = "Name is required"; 

} else { 

$First = test_input($_POST["First"]); 

if (!preg_match("/^[a-zA-Z-' ]*$/",$First)) { 

$nameErr = "Only letters and white space allowed"; 

} 

} 

if (empty($_POST["Last"])) { 

$nameErr = "Name is required"; 

} else { 

$Last = test_input($_POST["Last"]); 

if (!preg_match("/^[a-zA-Z-' ]*$/",$Last)) { 

$nameErr = "Only letters and white space allowed"; 

} 

} 

 

if (empty($_POST["email"])) { 

$emailErr = "Email is required"; 

} else { 

$email = test_input($_POST["email"]); 

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 

$emailErr = "Invalid email format"; 

} 

} 

 

if (empty($_POST["password"])) { 

$passErr = "Password is required"; 

}  

else{ 

$password = $_POST["password"]; 

if(!preg_match("#.*^(?=.{6,18})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password)){ 

$passErr = "It should have 6-18 characters, one uppercase, one number, one lowercase and one special character"; 

} 

} 

} 

 

function test_input($data) { 

$data = trim($data); 

$data = stripslashes($data); 

$data = htmlspecialchars($data); 

return $data; 

} 

?> 

 

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

<h2>PHP Form Validation Example</h2> 

<p><span class="error">* required field</span></p> 

 

<label for="First">First Name</label> 

<input type="text" name="First" value="<?php echo $First;?>"> 

<span class="error">* <?php echo $nameErr;?></span><br><br> 

 

<label for="Last">Last Name</label> 

<input type="text" name="Last" value="<?php echo $Last;?>"> 

<span class="error">* <?php echo $nameErr;?></span><br><br> 

 

<label for="country" hspace="10">Select Your Country</label> 

<select name="country"> 

<option value="India">India</option> 

<option value="Australia">Australia</option> 

<option value="US">US</option> 

<option value="Brazil">Brazil</option> 

</select><br><br> 

 

<label for="email">Email ID</label> 

<input type="text" name="email" value="<?php echo $email;?>"> 

<span class="error">* <?php echo $emailErr;?></span><br><br> 

 

<label for="password">Password</label> 

<input type="password" name="password" value="<?php echo $password;?>"> 

<span class="error">* <?php echo $passErr;?></span><br><br> 

 

<input type="submit" name="submit" value="Submit">  

</form> 

 

<?php 

echo "<h2>Your Name is $First $Last</h2><br>"; 

echo "<h2>Your Country is $country</h2><br>"; 

echo "<h2>Your Email address is $email</h2><br>"; 

?> 

 

</body> 

</html> 