<?php
	include 'encrypt.php';
?>

<html>
<head></head>
<body>
	<?php
	$encrypt = new Cipher($_POST["password"]);
		if(!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['text'])){

			$encryptedtext = $encrypt->encrypt($_POST["text"]);
			$decryptedtext = $encrypt->decrypt($encryptedtext);

			$file = $_POST['name'];
			file_put_contents($file, $encryptedtext);
		} elseif(!empty($_POST['name']) && !empty($_POST['password'])){
			if(file_exists($_POST['name'])){
				$file = file_get_contents($_POST['name']);
				$file = str_replace('"', '', $file);
				echo "DIT IS JE GEHEIM: " . $encrypt->decrypt(str_replace('"', '', $file));
			}
		}
	?>
	<form method="POST">
		<input required type="text" id="name" name="name" placeholder="name"/>
		<input required type="text" id="password" name="password" placeholder="password"/>
		<input type="text" id="text" name="text" placeholder="text"/>
		<button type="submit">Send</button>
	</form>
	</form>
</body>
</html>