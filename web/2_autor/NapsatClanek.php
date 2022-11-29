<?php 
$conn = mysqli_connect('localhost','slaby06','Tis*445577','slaby06');
 
if(!$conn)
{
	die(mysqli_error());
}
 
if(isset($_POST['submit']))
{
	$textareaValue = trim($_POST['content']);
	
	$sql = "insert into textarea_value (textarea_content) values ('".$textareaValue."')";
	$rs = mysqli_query($conn, $sql);
	$affectedRows = mysqli_affected_rows($conn);
	
	if($affectedRows == 1)
	{
		$successMsg = "Úspěšně odesláno";
	}
}
?>
 
<!DOCTYPE html>
<html>
<head>
<title>Odeslat článek</title>
<style>
body{
	font-family: sans-serif;
    text-align: center;
    background-color: #90E0EF;
}
 
label{
	font-weight:400;
	margin:10px 0px;
	display:block;
	color:#ee0000;
}
 
textarea{
	font-size: large;
}
 
input[type=submit]{
	background-color: green;
    border: none;
    color: white;
    padding: 25px 42px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    margin: 4px 2px;
	cursor: pointer;
}
 
input[type=submit]:hover{
	background:#ff5858;
	border:1px solid #ff5858;
	cursor:pointer;
}
 
.success-msg{
	background:#15a869;
	border:1px solid #15a869;
	color:#ffffff;
	width:400px;
   	margin-right:auto;
   	margin-left:auto;
	margin-top: 10px;
	font-size: 30px;
}
div {
	position: center;
	margin-top: 200px;
}

#hranka {
    border-radius: 25px;
    border: 4px solid #0077B6;
    padding: 20px;
    width: 1100px;
    height: 500px
}

#hranka1{
	border-radius: 35px;
}

#hranka2{
	border-radius: 80px;
}
</style>
 
</head>
<body>
	
	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
		
		<div>
		<?php 
		if(isset($successMsg))
		{
			echo "<div class='success-msg'>";
			print_r($successMsg);
			echo "</div>";
		}
	?>
			<h1>Sepsání článku pro časopis T-BAG Science</h1>
			<textarea rows="22" id="hranka" cols="90" name="content" required></textarea>
		</div>
		
		<input type="submit" name="submit" value="Odeslat" id="hranka2" onclick="return confirm('Jste si jisti, že checete článek opravdu odeslat?')">
		
	</form>
</body>
</html>