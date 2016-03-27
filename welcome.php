<html>
<div style="color:blue;width:100%;height:50px;background-color:;font-size:24px;text-align:center">
<b>
	<?php
	session_start();
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
$sql="select * from record where id='".$_SESSION['id']."' ";
$result = $conn->query($sql);

	if($_SESSION['id'])
	{
 echo 'Welcome';
 ?>

	<form action="" method="post">

<li style="text-align:right;list-style:none;margin-top:-30px">

		
<button type="submit" value="Log Out" name="d" style="height:30px;width:90px;color:white;background-color:blue;font-size:15px"><b>Log Out</b></button> 
</li>
<div>
		<ul style="text-align:right">
			<li style="display:inline">	<button type="submit" name="insert" value="Insert" style="height:30px;width:70px;color:white;background-color:blue;font-size:15px"><b>Insert</b></button>  </li>
			<li style="display:inline">	<button type="submit" name="update" value="Update" style="height:30px;width:70px;color:white;background-color:blue;font-size:15px"><b>Update</b></button>  </li>
			<li style="display:inline">	<button type="submit" name="delete" value="Delete" style="height:30px;width:70px;color:white;background-color:blue;font-size:15px"><b>Delete</b></button>  </li>
		
		</ul>
</div>
</form>
<?php 
	$sql="select * from record";
	//$sql="select * from product";
					
	///
	  	if ($conn->query($sql))
  	 {
  	 	$result = $conn->query($sql);
					while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
						
						echo '<div style="text-align:left;font-size:18px">
						<tr>
				
                                <td>'.$row['id'].'</td>
<td class="action"><a href=""> <img src="'.$row['pic'].'" style="width:180px;height:100px"></img></a> <li style="text-align:center;list-style:none">"'.$row['description'].'"</li></td>
                   <td style="text-align:right"><a href="delete.php">Update </a> </td> 
                   <td style="text-align:right"><a href="update.php">Delete </a> </td>    

                        </tr>

                              </div>';
						
					}
    }
else
{
	echo "error";
}

}
if(isset($_POST['d']))
{
	session_destroy();
	header("Location:index.php");
}
if(isset($_POST['insert']))
{
	header("Location:add.php");

}
if(isset($_POST['update']))
{
	header("Location:delete.php");

}
if(isset($_POST['delete']))
{
	header("Location:update.php");

}
elseif(!$_SESSION['id'])
{
	echo "you must log in first";
}
$conn->close();
 ?>
</b>
</div>

</html>
