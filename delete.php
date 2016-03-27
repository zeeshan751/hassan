<?php
session_start();
//echo $_SESSION['id'];
 if (isset($_POST['submit']))
{
$servername="localhost";
$username="root";
$password="";
$dbname="mango";
$conn=new mysqli($servername,$username,$password,$dbname);
$file_get = $_FILES['foto']['name'];
$temp = $_FILES['foto']['tmp_name'];

$file_to_saved = "C:/wamp/www/zee".$file_get; //Documents folder, should exist in       your host in there you're going to save the file just uploaded
move_uploaded_file($temp, $file_to_saved);

if($conn->connect_error)
{
	die("coonection failed:".$conn->connect_error);
}
else
{
$sql="update record SET description= '".$_POST['description']."' where id='".$_POST['ud']."' ";
						
 
  	if ($conn->query($sql))
  	 {
                   	header("Location:welcome.php");
     }
else
{
	echo "error";
}


}
$conn->close();
}
?>



<html>
<body>


	<div align="center" style="background-color:blue;color:black;height:540px;width:505px;margin-left:340px;margin-top:80px">

	<form action="" method="post" style="padding-top:30px">
<b style="font-size:24px">ID</b><br>	<input type="text" name="ud"> </input>
	<br>
<b style="font-size:24px">Image</b><br>	<input  type="file" name="foto" style="color:blue"><br> </input>
	<br>
	<br>
<br><br>
	<b style="font-size:24px">Description</b><br>	<textarea  type="text" name="description" style="height:150px;width:500px"> </textarea>
	<br>
	<br><br>
	<input type="submit" name="submit" style="color:blue" value="Go">
	</form>

	</div>

</body>