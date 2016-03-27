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
$conn2=new mysqli($servername,$username,$password,$dbname);

////

$file_get = $_FILES['foto']['name'];
$temp = $_FILES['foto']['tmp_name'];

$file_to_saved = "zee".$file_get; //Documents folder, should exist in       your host in there you're going to save the file just uploaded
move_uploaded_file($temp, $file_to_saved);

//echo $file_to_saved;

//$insert_img = mysql_query("INSERT INTO record (pic) values  ()");
//if ($insert_img) {
//echo "Img inserted successfully";
//}
//else{
// echo "There is something wrong with this code. Eff!";
//}

////
if($conn->connect_error || $conn2->connect_error )
{
	die("coonection failed:".$conn->connect_error);
}

else
{
$sql="insert into record (id,pic,description) values(null,'".$file_to_saved."','".$_POST['description']."') ";
//$sql2="insert into logging (username,records) values('".$_SESSION['id']."','".$sql."' ) ";

//echo $sql;
//$sql="insert into logging (username,records) values('".$_SESSION['id']."',$sql)";
						
 
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


	<div align="center" style="background-color:blue;color:black;height:500px;width:505px;margin-left:340px;margin-top:100px">

	<form action="" method="post" style="padding-top:30px" enctype="multipart/form-data">

<b style="font-size:24px">Image</b><br><br><br>	<input  type="file" name="foto" style="color:blue"><br> </input>
	<br>
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