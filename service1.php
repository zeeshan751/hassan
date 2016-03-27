<?php
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
//	if(isset($_REQUEST['name']) && isset($_REQUEST['type']) && isset($_REQUEST['description']) )
	if(isset($_REQUEST['id']))
	{
//$sql="insert into service VALUES (null,'".$_REQUEST['name']."','".$_REQUEST['type']."','".$_REQUEST['description']."')" ;
$sql="select * from  service where id='".$_REQUEST['id']."' ";

 
  	if ($conn->query($sql))
  	 {
  	 	$result=$conn->query($sql);
  	 	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
					$data[]=$row;

					  }

  	 	$status = array('status' => 'ok','data' => $data);
                 
     }
else
{
	$status = array('status' => 'error');
              
              }

}

}
echo  json_encode($status);
$conn->close();
?>