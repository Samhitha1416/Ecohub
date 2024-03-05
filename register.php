<?php
$con = new mysqli("localhost", "root","", "ecohub");
if (!$con) {
    die(mysqli_error($con));
}

if(isset($_POST['register']))
{
$account=$_POST['account'];
$type=$_POST['type'];
$name=$_POST['name'];
$address=$_POST['address'];
$website=$_POST['website'];
$email=$_POST['email'];
$pass=$_POST['pass'];
}


$sql="insert into `login` (account, type, name, address,website,email,password) values('$account','$type','$name','$address','$website','$email','$pass');";
$result=mysqli_query($con,$sql);
echo
      ' 
      <script> 
      alert("Account Created")
      </script>
      ';


?>