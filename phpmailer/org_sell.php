<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
//required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$con = new mysqli("localhost", "root", "", "ecohub");
if (!$con) {
    die(mysqli_error($con));
}

if (isset($_POST['sell'])) {
    $material = $_POST['material'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $facility = $_POST['facility'];
}

for ($i = 0; $i < count($quantity); $i++) {
    $sql = "insert into `org_sell` (material,quantity,price,facility) values('$material[$i]','$quantity[$i]','$price[$i]','$facility[$i]')";
    $result = mysqli_query($con, $sql);
}

// Sending mail

$email_query="select distinct email from `org_buy` where status='active';";

$result = mysqli_query($con, $email_query);
$emails = array();
$email_count = 0;

while ($row = mysqli_fetch_row($result)) {
    array_push($emails, $row[0]);
    $email_count++;
}


$message = nl2br("Dear Customer,\r\n\r\n We are pleased to inform you that our team has successfully dismantled the electronic waste, in accordance with our commitment to environmentally responsible practices.
The components have been carefully separated for recycling, minimizing the environmental impact and promoting sustainability. We take pride in contributing to the reduction of electronic waste and the responsible management of resources.
\r\nThank you for choosing us. We look forward to serving you again in the future.\r\n\r\nBest regards\r\nEcoHub");
/*if ($acc->num_rows > 0) {
    // Fetch the specific row
    $row = $acc->fetch_assoc();

    // Now $row contains the data of the specific row
    print_r($row);
} else {
    echo "No matching records found";
}*/


for ($i = 0; $i < $email_count; $i++) {

    //Create an instance; passing `true` enables exceptions
    if (isset($_POST['sell'])) {
    
        $mail = new PHPMailer(true);
    
        //Server settings
        $mail->isSMTP();                              //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;             //Enable SMTP authentication
        $mail->Username   = 'guntisamhitha16@gmail.com';   //SMTP write your email
        $mail->Password   = 'iipronlcbgltxfgk';      //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
        $mail->Port       = 465;                                    
    
        //Recipients
        $mail->setFrom($emails[$i]); // Sender 
        $mail->addAddress($emails[$i]);     //Add a recipient email  
        $mail->addReplyTo($emails[$i]); // reply to sender email
    
        //Content
        $mail->isHTML(true);               //Set email format to HTML
        $mail->Subject = 'Successful E-Waste Dismantled and Dispatched for Recycling';   // email subject headings
        $mail->Body    = $message;
        
        //email message
            
        // Success sent message alert
        $mail->send();
    }
}

$up="update `org_buy` set status='completed' where status='active';";

echo " 
    <script> 
    document.location.href = 'org_sell.html';
    </script>
"

?>