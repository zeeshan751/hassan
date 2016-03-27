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
if($conn->connect_error)
{
	die("coonection failed:".$conn->connect_error);
}
else
{
$sql="delete from record where id= '".$_POST['dl']."' ";

//echo $sql;
						
 
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


	<div align="center" style="background-color:blue;color:black;height:200px;width:505px;margin-left:340px;margin-top:100px">

	<form action="" method="post" style="padding-top:30px">

<b style="font-size:24px">ID</b><br>	<input type="text" name="dl"> </input>
	<br>
<br>
	<br><br>
	<input type="submit" name="submit" style="color:blue" value="Go">
	</form>

	</div>

</body>