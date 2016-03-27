<html>
<body>

<div style="background-color:blue;width:30%;height:500px;margin-left:30%;margin-top:7%" align="center">
  <img src="lock1.png">
<form action=""   method="post" style="">
<p >ID <input style="margin-left:64px" type="text" name="id">
</p>
<p>Password <input style="margin-left:20px" type="password" name="password"> </p>

<input style="margin-left:90px;background-color:black;color:white;width:120px" type="submit" name="submit" value="Log In" >
<input style="margin-left:86px;background-color:black;color:white;width:120px" type="submit" name="register" value="Sign Up" >

</form>
</div>
</body>
</html>
<?php
session_start();
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
// $sql="insert into rec (id,Password) values(2,345)";
$sql="select * from u_id where username='".$_POST['id']."' and password='".$_POST['password']."'";

if($conn->query($sql))
{
			$result = $conn->query($sql);
  	if ($result->num_rows > 0) {
      $_SESSION["id"]=$_POST['id'];
                  	header("Location:welcome.php");
                                }
else
{
  echo "
  <div style='width:230px;height:110px;position:relative;margin-top:-150px;margin-left:520px'>
  <ul style='padding-top:20px'>
       <li style='display:inline'>   <img   style='height:50px' src='index1.png'>  </li>
       <li  style='display:inline;color:red;font-size:30px'>Error</li>
</ul>
<p  style='color:red;font-size:12px;text-align:center'>Incorrect username or Password</p>
</div>
";
}

}


$conn->close();
}
elseif (isset($_POST['register'])) 
    {
     header("Location:registration.php"); 
    }
?>

