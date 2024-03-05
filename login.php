<html>
    <body>
<?php

$email = $_POST["email"];
$pass = $_POST["pass"];

if($email && $pass )
{

$connect = mysqli_connect("localhost","root","") or die("No database server");
mysqli_select_db($connect,"ecohub") or die("No database");
$query = "select * from login where email = '".$email."' and password = '".$pass."';";
$result = mysqli_query($connect,$query);
$account="select account from login where email='".$email."' and password='".$pass."';";
$acc=mysqli_query($connect,$account);
$fetch=mysqli_fetch_row($acc);
if($result && $fetch[0]=="Organizations")
{
    echo
      " 
      <script> 
       document.location.href = 'org_dash.php';
      </script>
      ";
}
else if($result && $fetch[0]== "Facilities"){
    echo
      " 
      <script> 
       document.location.href = 'fac_dash.php';
      </script>
      ";
}
else{
    echo
      " 
      <script> 
       document.location.href = 'pcb_dash.php';
      </script>
      ";
}
}
?>
    </body>
</html>