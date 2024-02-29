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
if(isset($_POST['buy'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $device=$_POST['device'];
    $quantity=$_POST['quantity'];
}

for ($i = 0; $i < count($device); $i++) {
    $sql="insert into `org_buy` (name, email, device, quantity,status) values('$name','$email','$device[$i]','$quantity[$i]','active')";
    $result=mysqli_query($con,$sql);
}

// Mail content
$message = nl2br("Hello ".$name.",\r\n\r\n I am pleased to inform you that our recent collection of items was a great success, thanks for your cooperation.
We are grateful for your support in making a positive difference through our website.
We sincerely appreciate your trust in our services. If you have any questions or concerns regarding your order, please feel free to reach out to us. 
We are here to assist you in any way possible.
\r\nThank you for choosing us. We look forward to serving you again in the future.\r\n\r\nBest regards");

// Sending mail

//Create an instance; passing `true` enables exceptions
if (isset($_POST["buy"])) {
 
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
      $mail->Subject = 'Successful E-Waste Collection';   // email subject headings
      $mail->Body    = $message;
       
      //email message
        
      // Success sent message alert
      $mail->send();
      echo
      " 
      <script> 
       document.location.href = 'org_buy.html';
      </script>
      ";
  }

?>
