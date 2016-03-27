<?php
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
$sql="insert into u_id (username,password) values('".$_POST['id']."','".$_POST['password']."') ";
echo $sql;
						
 
  	if ($conn->query($sql))
  	 {
  	 	
                   	header("Location:log.php");
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
<body >
<div  style="background-color:blue;width:550px;text-align:center;margin-left:400px;margin-top:200px">
<form action="" method="post">
	<br><br>
	<h1 style="color:white">REGISTRATION</h1>
	<br>
<p style="font-size:25px">ID: <input style="width:300px;height:30px;font-size:20px;margin-left:100px" type="text" name="id">
</p>
<p style="font-size:25px">Password: <input style="width:300px;height:30px;font-size:20px;margin-left:28px" type="password" name="password">
</p>
<p style="font-size:25px">E-mail: <input style="width:300px;height:30px;font-size:20px;margin-left:56px" type="text" name="email">
</p>
<p style="font-size:25px">Contact: <input style="width:300px;height:30px;font-size:20px;margin-left:48px" type="text" name="contact">
</p>


<input type="submit" value="submit" name="submit" style="color:blue;font-size:18px">

</form>
</div>

</body>
</html>