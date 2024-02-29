<?php
 
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
//required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$con = new mysqli("localhost", "root","", "ecohub");
if (!$con) {
    die(mysqli_error($con));
}
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $device=$_POST['device'];
    $quantity=$_POST['quantity'];
}

$sql="insert into `org_buy` (name,email,device,quantity) values('$name','$email','$device','$quantity')";
$result=mysqli_query($con,$sql);
 
//Create an instance; passing `true` enables exceptions
if (isset($_POST["submit"])) {
 
  $mail = new PHPMailer(true);
 
    //Server settings
    $mail->isSMTP();                              //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;             //Enable SMTP authentication
    $mail->Username   = 'guntisamhitha16@gmail.com';   //SMTP write your email
    $mail->Password   = 'iipronlcbgltxfgk
    ';      //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
    $mail->Port       = 465;                                    
 
    //Recipients
    $mail->setFrom( $_POST["email"], $_POST["name"]); // Sender Email and name
    $mail->addAddress($_POST["email"]);     //Add a recipient email  
    $mail->addReplyTo($_POST["email"], $_POST["name"]); // reply to sender email
 
    //Content
    $mail->isHTML(true);               //Set email format to HTML
    $mail->Subject = 'Successful E-Waste Collection and Recycling';   // email subject headings
    $mail->Body    = "

    We are pleased to inform you that the e-waste has been successfully collected and responsibly dismantled. Our team followed strict environmental guidelines for a sustainable recycling and disposal process.".`"<br>"`."Thank you for choosing us.";


    
     
    //email message
      
    // Success sent message alert
    $mail->send();
    echo
    " 
    <script> 
     alert('Message was sent successfully!');
     document.location.href = 'org_buy.html';
    </script>
    ";
}